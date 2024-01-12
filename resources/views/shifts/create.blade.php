@extends('layouts.standard')

@section('content')
    <div class="container mx-auto my-8">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <div class="flex flex-col">
                @session('status')
                <div class="bg-green-100 border-t-1 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="font-bold">{{ $value }}</p>
                        </div>
                    </div>
                </div>
                @endsession
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <form action="{{ route('shifts.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
                                <input type="date" name="date" id="date" value="{{ old('date') }}"
                                       class="mt-1 p-2 border rounded-md w-full @error('date') border-red-500 @enderror">
                                @error('date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="worker" class="block text-sm font-medium text-gray-600">Worker</label>
                                <input type="text" name="worker" id="worker" value="{{ old('worker') }}"
                                       class="mt-1 p-2 border rounded-md w-full @error('worker') border-red-500 @enderror">
                                @error('worker')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="company" class="block text-sm font-medium text-gray-600">Company</label>
                                <input type="text" name="company" id="company" value="{{ old('company') }}"
                                       class="mt-1 p-2 border rounded-md w-full @error('company') border-red-500 @enderror">
                                @error('company')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="hours" class="block text-sm font-medium text-gray-600">Hours</label>
                                <input type="number" name="hours" id="hours" value="{{ old('hours') }}"
                                       class="mt-1 p-2 border rounded-md w-full @error('hours') border-red-500 @enderror">
                                @error('hours')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="rate_per_hour" class="block text-sm font-medium text-gray-600">Rate per
                                    Hour</label>
                                <input type="number" step=0.01 name="rate_per_hour" id="rate_per_hour"
                                       value="{{ old('rate_per_hour') }}"
                                       class="mt-1 p-2 border rounded-md w-full @error('rate_per_hour') border-red-500 @enderror">
                                @error('rate_per_hour')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="taxable" class="block text-sm font-medium text-gray-600">Taxable</label>
                                <select name="taxable" id="taxable"
                                        class="mt-1 p-2 border rounded-md w-full @error('taxable') border-red-500 @enderror">
                                    <option value="1" {{ old('taxable') == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('taxable') != 1 ? 'selected' : '' }}>No</option>
                                </select>
                                @error('taxable')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
                                <select name="status" id="status"
                                        class="mt-1 p-2 border rounded-md w-full @error('status') border-red-500 @enderror">
                                    <option value="Processing" {{ old('status') == 'Processing' ? 'selected' : '' }}>
                                        Processing
                                    </option>
                                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="Complete" {{ old('status') == 'Complete' ? 'selected' : '' }}>
                                        Complete
                                    </option>
                                    <option value="Failed" {{ old('status') == 'Failed' ? 'selected' : '' }}>Failed
                                    </option>
                                </select>
                                @error('status')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="shift_type" class="block text-sm font-medium text-gray-600">Shift
                                    Type</label>
                                <select name="shift_type" id="shift_type"
                                        class="mt-1 p-2 border rounded-md w-full @error('shift_type') border-red-500 @enderror">
                                    <option value="Day" {{ old('shift_type') == 'Day' ? 'selected' : '' }}>Day</option>
                                    <option value="Night" {{ old('shift_type') == 'Night' ? 'selected' : '' }}>Night
                                    </option>
                                </select>
                                @error('shift_type')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
