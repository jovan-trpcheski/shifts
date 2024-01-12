@extends('layouts.standard')

@section('content')
    <div class="container mx-auto my-8">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
            <!---===================== STATS CARDS =============================-->
            <div class="flex justify-center py-10 p-14">
                <!---== First Stats Container ====--->
                <div class="container mx-auto pr-4">
                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-9 bg-red-400 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">NAME</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">{{$name}}</p>
                    </div>
                </div>
                <!---== First Stats Container ====--->

                <!---== Second Stats Container ====--->
                <div class="container mx-auto pr-4">
                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-9 bg-red-400 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">AVG RATE PER HOUR</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">{{'£'.number_format($averageRatePerHour, 2, '.', '')}}</p>
                    </div>
                </div>
                <!---== Second Stats Container ====--->

                <!---== Third Stats Container ====--->
                <div class="container mx-auto pr-4">
                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-9 bg-red-400 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">AVG TOTAL PAY</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">{{'£'.number_format($averageTotalPay, 2, '.', '')}}</p>
                    </div>
                </div>
                <!---== Third Stats Container ====--->
            </div>
            <!---===================== STATS CARD ENDS HERE =============================-->
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        @if($shifts->isEmpty())
                            <div
                                class="items-center min-w-md py-2 sm:px-6 lg:px-8 text-red-600 text-3xl text-center">
                                There aren't any completed shifts for this employee.
                            </div>
                        @else
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Date</th>
                                    <th scope="col" class="px-6 py-4">Company</th>
                                    <th scope="col" class="px-6 py-4">Hours</th>
                                    <th scope="col" class="px-6 py-4">Rate per Hour</th>
                                    <th scope="col" class="px-6 py-4">Taxable</th>
                                    <th scope="col" class="px-6 py-4">Shift Type</th>
                                    <th scope="col" class="px-6 py-4">Paid At</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shifts as $shift)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->date }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->company }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->hours }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ '£'.$shift->rate_per_hour }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->taxable?'Yes':'No' }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->shift_type }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $shift->paid_at }}</td>
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
