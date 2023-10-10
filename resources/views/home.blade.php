@extends('layouts.home')
@section('content')
  <div class="grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 xl:gap-x-7 gap-x-4 gap-y-7 mt-16 mb-8">
    @empty(!$products)
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
          <img src="{{ asset('storage/') . '/' . $photos[0] }}" alt="" class="card__img">
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
    @endempty
  </div>
  {{ $products->links() }}
@endsection
