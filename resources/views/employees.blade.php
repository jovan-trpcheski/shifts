@extends('layouts.standard')

@section('content')
    <div class="container mx-auto my-8">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        @if($employees->isEmpty())
                            <div
                                class="items-center min-w-md py-2 sm:px-6 lg:px-8 text-red-600 text-3xl text-center">
                                There aren't any shifts in the system.
                            </div>
                        @else
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Employee Name</th>
                                    <th scope="col" class="px-6 py-4">Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$employee->worker}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <form
                                                action="{{ route('employee.details', ['name' => $employee->worker]) }}"
                                                method="GET">
                                                <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    View
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
