@extends('master')
@section('content')
    <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Create Product</h1>
    <p class="mt-2 text-sm text-slate-600">Fill in the details to add a new product to your catalog.</p>
    <form action="{{ route('products.store') }}" method="POST" class="mt-6 space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-slate-700">Product Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border border-slate-300 bg-white py-2 px-3 shadow-sm focus:outline-none focus:ring-indigo-500" required>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border border-slate-300 bg-white py-2 px-3 shadow-sm focus:outline-none focus:ring-indigo-500"></textarea>
        </div>
        <div>
            <label for="price" class="block text-sm font-medium text-slate-700">Price</label>
            <input type="number" name="price" id="price" step="0.01" class="mt-1 block w-full border border-slate-300 bg-white py-2 px-3 shadow-sm focus:outline-none focus:ring-indigo-500" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Product</button>
        </div>
    </form>
@endsection