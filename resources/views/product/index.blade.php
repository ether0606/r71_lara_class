@extends('master')
@section('pageTitle', 'Product List')
@section('content')
        <header class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600">Inventory</p>
            <div class="mt-2 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Products</h1>
                    <p class="mt-2 text-sm text-slate-600">Browse and manage the products in your catalog.</p>
                </div>
                <span class="inline-flex w-fit items-center rounded-full bg-indigo-50 px-3 py-1 text-sm font-medium text-indigo-700">
                    {{ $products->count() }} {{ \Illuminate\Support\Str::plural('product', $products->count()) }}
                </span>
            </div>
        </header>

        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm" aria-labelledby="product-list-heading">
            <h2 id="product-list-heading" class="sr-only">Product list</h2>
            <a href="{{ route('products.create') }}" class="button">Add Product</a>
            @if ($products->isEmpty())
                <div class="flex flex-col items-center px-6 py-16 text-center">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-indigo-50 text-indigo-600" aria-hidden="true">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 7.5 8.25-4.5 8.25 4.5M3.75 7.5 12 12m-8.25-4.5v9L12 21m0-9 8.25-4.5M12 12v9m8.25-13.5v9L12 21M7.5 5.438l8.25 4.5" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-base font-semibold text-slate-900">No products yet</h3>
                    <p class="mt-1 max-w-sm text-sm text-slate-500">Products will appear here once they have been added to your catalog.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px] divide-y divide-slate-200 text-left">
                        <thead class="bg-slate-50">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">Product</th>
                                <th scope="col" class="px-6 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">Description</th>
                                <th scope="col" class="px-6 py-3.5 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Price</th>
                                <th scope="col" class="px-6 py-3.5 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($products as $product)
                                <tr class="transition-colors hover:bg-slate-50">
                                    <th scope="row" class="whitespace-nowrap px-6 py-4 text-sm font-semibold text-slate-900">
                                        {{ $product->name }}
                                    </th>
                                    <td class="max-w-xl px-6 py-4 text-sm leading-6 text-slate-600">
                                        <p class="line-clamp-2">{{ $product->description }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-semibold tabular-nums text-slate-900">
                                        {{ number_format((float) $product->price, 2) }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                        <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" onSubmit="return confirm('Are you sure you want to delete this product?');" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{-- $products->links() --}}
                    </div>
                </div>
            @endif
        </section>
        <x-modal  title="Title here yay" />
@endsection

@section('footerScripts')
    <script src="kamal.js"></script>
    @parent
@endsection