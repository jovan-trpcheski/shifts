@extends('layouts.standard')

@section('content')
    <div class="container mx-auto my-8">
        <div class="mx-auto bg-white p-6 rounded shadow">
            <div class="flex flex-col">
                @session('status')
                <div class="bg-green-100 border-t-1 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div>
                            <p class="font-bold">{{ $value }}</p>
                        </div>
                    </div>
                </div>
                @endsession

                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="flex justify-between">
                            <form class="max-w-lg" action="{{ route('shifts.index') }}" method="GET">
                                <div class="mb-4">
                                    <label for="total_pay" class="block text-sm font-medium text-gray-600">Total Pay
                                        Above</label>
                                    <input type="number" name="total_pay" id="total_pay" pattern="\d*"
                                           class="mt-1 p-2 border rounded-md w-full">
                                </div>
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Filter
                                </button>
                            </form>
                            <div class="self-end py-2 px-4">
                                <a href="{{ route('shifts.create') }}"
                                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Create Shift
                                </a>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            @if($shifts->isEmpty())
                                <div
                                    class="items-center min-w-md py-2 sm:px-6 lg:px-8 text-red-600 text-3xl text-center">
                                    There aren't any shifts in the system or they don't match your filter!
                                </div>
                            @else
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Date</th>
                                        <th scope="col" class="px-6 py-4">Worker</th>
                                        <th scope="col" class="px-6 py-4">Company</th>
                                        <th scope="col" class="px-6 py-4">Hours</th>
                                        <th scope="col" class="px-6 py-4">Rate per Hour</th>
                                        <th scope="col" class="px-6 py-4">Taxable</th>
                                        <th scope="col" class="px-6 py-4">Status</th>
                                        <th scope="col" class="px-6 py-4">Shift Type</th>
                                        <th scope="col" class="px-6 py-4">Paid At</th>
                                        <th scope="col" class="px-6 py-4">Total Pay</th>
                                        <th scope="col" colspan="2" class="px-3 py-4">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shifts as $shift)
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->date }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->worker }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->company }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->hours }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ '£'.$shift->rate_per_hour }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->taxable?'Yes':'No' }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->status }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->shift_type }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->paid_at }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ '£'.$shift->total_pay }}</td>
                                            <td class="whitespace-nowrap py-4 font-medium">
                                                <a href="{{ route('shifts.edit', $shift) }}"
                                                   class="py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg">Edit</a>
                                            </td>
                                            <td class="whitespace-nowrap py-4 font-medium">
                                                <form action="{{ route('shifts.destroy', $shift) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this shift?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="py-2 leading-none px-3 font-medium text-red-600 hover:text-red-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="border-b dark:border-neutral-500">
                                        <td colspan="12" class="whitespace-nowrap px-6 py-4 font-medium">
                                            {{ $shifts->withQueryString()->links() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
