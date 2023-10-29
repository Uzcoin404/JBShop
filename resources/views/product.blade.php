@php
  $photos = json_decode($product->photos);
  // Format the number with two decimal places
  $formattedPrice = number_format($product->price, 2);
  $price = explode('.', $formattedPrice)[0];
  $decimal = explode('.', $formattedPrice)[1];
  if (isset($product->discount_price)) {
      $formattedDPrice = number_format($product->discount_price, 2);
      $dPrice = explode('.', $formattedDPrice)[0];
      $dDecimal = explode('.', $formattedDPrice)[1];
  }
@endphp
@extends('layouts.home')
@section('content')
  @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
  @endpush
  <div id="productPrintArea" class="flex lg:flex-nowrap flex-wrap xl:gap-x-12 lg:gap-x-6 mt-16">
    <div class="product_section">
      <h1 class="hero_title max-w-none mb-10">
        {{ $product->title }}
      </h1>
      {{-- <section id="main-carousel" class="splide mb-4" style="height: 500px;">
        <div class="splide__track">
          <ul class="splide__list">
            @foreach ($photos as $image)
              <li class="splide__slide">
                <img src="{{ asset('storage/') . '/' . $image }}" alt="">
              </li>
            @endforeach
          </ul>
        </div>
      </section>
      <section id="thumbnail-carousel" class="splide" style="height: 200px;">
        <div class="splide__track">
          <ul class="splide__list">
            @foreach ($photos as $image)
              <li class="splide__slide">
                <img src="{{ asset('storage/') . '/' . $image }}" alt="">
              </li>
            @endforeach
          </ul>
        </div>
      </section> --}}
      <div class="grid grid-cols-3 gap-y-5 gap-x-4">
        @foreach ($photos as $i => $image)
          <img src="{{ asset('storage/') . '/' . $image }}" alt="" data-id="{{ $i }}"
            class="product_image{{ $loop->first ? ' col-span-3' : '' }}" onclick="openImages(this)">
        @endforeach
      </div>
    </div>
    <div id="myModal" class="modal">
      <span class="close" onclick="closeModal()">&times;</span>
      <img src="" alt="" id="modal-image">
      <button class="prev" onclick="prevImage()">&#10094;</button>
      <button class="next" onclick="nextImage()">&#10095;</button>
    </div>
    <div class="product_section">
      <div class="flex flex-wrap gap-3 justify-between lg:mt-0 my-8">
        <div class="flex">
          <span class="product_price 2xl:text-5xl lg:text-4xl text-3xl">
            €{{ $price }}<sup class="lg:text-3xl text-2xl">{{ $decimal }}</sup>
          </span>
          @isset($product->discount_price)
            <span class="price_strike lg:text-3xl text-2xl">
              €{{ $dPrice }}<sup class="lg:text-lg text-base align-baseline">{{ $dDecimal }}</sup>
            </span>
          @endisset
        </div>
        <div class="flex gap-x-2 lg:w-auto w-full">
          <button type="button" id="product_copy_link" class="product_btn lg:w-auto w-full px-4">Copy link</button>
          <button type="button" id="product_print" onclick="print()" class="product_btn lg:w-auto w-full px-4">
            <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M7.25 7H16.75V5C16.75 3 16 2 13.75 2H10.25C8 2 7.25 3 7.25 5V7Z" stroke="#292D32"
                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16 15V19C16 21 15 22 13 22H11C9 22 8 21 8 19V15H16Z" stroke="#292D32" stroke-width="1.5"
                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M21 10V15C21 17 20 18 18 18H16V15H8V18H6C4 18 3 17 3 15V10C3 8 4 7 6 7H18C20 7 21 8 21 10Z"
                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M17 15H15.79H7" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M7 11H10" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
            Print
          </button>
        </div>
      </div>
      {!! $product->html !!}
    </div>
  </div>
  @push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script> --}}
    <script>
      {{-- document.addEventListener('DOMContentLoaded', function() {
            var main = new Splide('#main-carousel', {
              type: 'fade',
              fixedWidth: 500,
              arrows: false,
              drag: false,
              rewind: true,
              pagination: false,
            });


            var thumbnails = new Splide('#thumbnail-carousel', {
              fixedWidth: 300,
              fixedHeight: 200,
              gap: 10,
              rewind: true,
              pagination: false,
              isNavigation: true,
              arrow: true
            });

            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
          }); --}}

      let currentImageIndex = 0;
      const images = []
      document.querySelectorAll('.product_image').forEach(image => {
        images.push(image.src);
      })

      function openImages(image) {
        const modal = document.getElementById("myModal");
        modal.style.display = "block";
        currentImageIndex = image.getAttribute('data-id');
        showImage(currentImageIndex);
      }

      function closeModal() {
        document.getElementById("myModal").style.display = "none";
      }

      function prevImage() {
        if (currentImageIndex > 0) {
          currentImageIndex--;
          showImage(currentImageIndex);
        }
      }

      function nextImage() {
        if (currentImageIndex < images.length - 1) {
          currentImageIndex++;
          showImage(currentImageIndex);
        }
      }

      function showImage(index) {
        const modalImage = document.getElementById("modal-image");
        modalImage.src = images[index];
      }

      document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
          closeModal();
        } else if (event.key === "ArrowLeft") {
          prevImage();
        } else if (event.key === "ArrowRight") {
          nextImage();
        }
      });
    </script>
  @endpush
@endsection
