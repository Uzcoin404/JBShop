@extends('layouts.home')
@section('content')

  <nav class="flex my-6 mt-8" aria-label="Breadcrumb">
    <ol class="flex items-center gap-x-2">
      <li>
        @if (!isset($subcategory))
          <span class="breadcrumb text-2xl font-bold">{{ $category }}</span>
        @else
          <a href="/category/{{ $category }}"
            class="breadcrumb text-2xl font-bold underline flex items-center">{{ $category }}
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2" width="14" height="13" viewBox="0 0 14 13"
              fill="none">
              <path d="M1 1L6.19583 5.76285C6.6282 6.15918 6.6282 6.84082 6.19583 7.23715L1 12" stroke="#333333"
                stroke-width="2" />
              <path d="M7 1L12.1958 5.76285C12.6282 6.15918 12.6282 6.84082 12.1958 7.23715L7 12" stroke="#333333"
                stroke-width="2" />
            </svg>
          </a>
        @endif
      </li>
      <li>
        @if (isset($subcategory))
          <span class="text-2xl font-bold">{{ $subcategory }}</span>
        @endif
      </li>
    </ol>
  </nav>
  @if (!empty($products))
    <div class="grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 xl:gap-x-7 gap-x-4 gap-y-7 mt-16 mb-8">
      @foreach ($products as $product)
        @php
          $photos = json_decode($product->photos);
          // Format the number with two decimal places
          $formattedPrice = number_format($product->price, 2);
          $price = explode('.', $formattedPrice)[0];
          $decimal = explode('.', $formattedPrice)[1];

        @endphp
        <div class="card flex flex-col justify-end h-full">
          <h3 class="xl:text-xl text-lg text-gray-800 font-bold mb-auto">
            {{ $product->title }}
          </h3>
          <a href="{{ route('products.show', $product->id) }}">
            <img src="{{ asset('storage/') . '/' . $photos[0] }}" alt="" class="card__img">
          </a>
          <div class="flex gap-x-1.5">
            <div class="flex-auto">
              <span class="product_price flex justify-center items-center h-14 lg:text-3xl text-2xl">
                <div>
                  €{{ $price }}
                  <sup class="lg:text-lg text-base lg:-top-3.5 -top-2.5 -left-0.5">{{ $decimal }}</sup>
                </div>
              </span>
            </div>
            <a href="{{ route('products.show', $product->id) }}" class="btn !w-auto !h-14 lg:px-3 px-4">Weiter ahsehen</a>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-xl font-medium">There aren't any products in this category</p>
  @endif
  @empty(!$products)
    {{ $products->links() }}
  @endempty
@endsection
