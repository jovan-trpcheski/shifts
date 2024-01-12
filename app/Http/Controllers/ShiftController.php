<?php

namespace App\Http\Controllers;

use App\Imports\ShiftsImport;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use function Laravel\Prompts\error;
use function PHPUnit\Framework\isEmpty;

class ShiftController extends Controller
{
    protected $rules = [
        'date' => 'required|date',
        'worker' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'hours' => 'required|integer|min:1|max:24',
        'rate_per_hour' => 'required|numeric|min:0|max:999',
        'taxable' => 'required|boolean',
        'status' => 'required|string|in:Pending,Processing,Complete,Failed',
        'shift_type' => 'required|string|in:Day,Night',
    ];

    public function index(Request $request)
    {
        //checking for forbidden url changing
        if (isset($request->total_pay)&&!is_numeric($request->total_pay))
        {
            abort(403);
        }

        $minTotalPay = $request->total_pay??0;

        $shifts = Shift::select('*')
            ->selectRaw('rate_per_hour * hours as total_pay')
            ->having('total_pay', '>', $minTotalPay)
            ->orderBy('created_at', 'desc')
            ->paginate(25);
        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        return view('shifts.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->rules);
        $shift = Shift::create($request->all());
        return redirect()->route('shifts.edit', $shift->id);
    }

    public function show(Shift $shift)
    {
        return redirect()->route('shifts.edit',$shift);
    }

    public function edit(Shift $shift)
    {
        return view('shifts.edit', compact('shift'));
    }

    public function update(Request $request, Shift $shift)
    {
        $request->validate($this->rules);

        if ($shift->status != "Complete" && $request->input('status') == "Complete") {
            $request->merge(['paid_at' => Carbon::now()]);
        }

        $shift->update($request->all());
        return redirect()->back()->with('status', 'The shift has been updated!');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->back()->with('status', 'The shift has been deleted!');
    }

    public function importForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv',
        ]);

        Excel::import(new ShiftsImport, request()->file('csv_file'));

        return redirect()->route('shifts.index')->with('status', 'CSV Imported!');
    }

    public function employees()
    {
        $employees = Shift::select('worker')->distinct()->get();

        return view('employees', compact('employees'));
    }

    public function details(Request $request)
    {
        $name = $request->name;

        $check = Shift::where('worker', $name)->get();
        if($check->isEmpty())
        {
            return abort(404);
        }

        $averageRatePerHour = Shift::where('worker', $name)
            ->avg('rate_per_hour');

        $averageTotalPay = Shift::where('worker', $name)
            ->avg(\DB::raw('rate_per_hour * hours'));

        $shifts = Shift::where('worker', $name)
            ->where('status', 'Complete')
            ->latest('date')
            ->take(5)
            ->get();

        return view('employeeDetails',
            compact('shifts','averageRatePerHour','name', 'averageTotalPay'));
    }
}
