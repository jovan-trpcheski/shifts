@extends('layouts.standard')

@section('content')
    <div class="container mx-auto my-8">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            @session('status')
            <div class="bg-green-100 border-t-1 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div>
                        <p class="font-bold">{{ $value }}</p>
                    </div>
                </div>
            </div>
            @endsession
            <h2 class="text-2xl mt-3 font-semibold mb-6">Import CSV</h2>
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="csv_file" class="block text-sm font-medium text-gray-600">Choose CSV File</label>
                    <input type="file" name="csv_file" id="csv_file" class="mt-1 p-2 border rounded w-full">
                    @error('csv_file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Import
                </button>
            </form>
        </div>
    </div>
@endsection
