@extends('layouts.admin')
@section('content')
  <div class="2xl:container mx-auto lg:px-10 px-4 my-12">
    <div class="flex items-center justify-between">
      <h1 class="lg:text-4xl text-3xl font-bold text-gray-800">Admin</h1>
      <a href="{{ route('products.create') }}">
        <div class="btn admin_add_product">
          <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
            <path
              d="M0 18.5C0 17.3854 0.903571 16.4818 2.01818 16.4818H34.9818C36.0964 16.4818 37 17.3854 37 18.5C37 19.6146 36.0964 20.5182 34.9818 20.5182H2.01818C0.903569 20.5182 0 19.6146 0 18.5Z"
              fill="white" />
            <path
              d="M18.5 37C17.3854 37 16.4818 36.0964 16.4818 34.9818L16.4818 2.01818C16.4818 0.903569 17.3854 1.36939e-07 18.5 8.82175e-08C19.6146 3.94963e-08 20.5182 0.903571 20.5182 2.01818L20.5182 34.9818C20.5182 36.0964 19.6146 37 18.5 37Z"
              fill="white" />
          </svg>
        </div>
        <span class="text-xs font-bold" style="color: #2B9B73;">add product</span>
      </a>
    </div>
    <div class="flex justify-end mt-6 mb-4">
      <button type="button" id="list_view" class="products_view_btn active mr-2.5" title="List view">
        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="0.284485" width="2.4" height="2.4" fill="#D9D9D9" />
          <rect x="4.7998" y="0.284485" width="7.2" height="2.26637" fill="#D9D9D9" />
          <rect y="5.08453" width="2.4" height="2.4" fill="#D9D9D9" />
          <rect x="4.7998" y="5.08453" width="7.2" height="2.26637" fill="#D9D9D9" />
          <rect y="9.88446" width="2.4" height="2.4" fill="#D9D9D9" />
          <rect x="4.7998" y="9.88446" width="7.2" height="2.26637" fill="#D9D9D9" />
        </svg>
      </button>
      <button type="button" id="grid_view" class="products_view_btn" title="Grid view">
        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="0.284485" width="4.8" height="4.8" fill="#D9D9D9" />
          <rect x="7.2002" y="0.284485" width="4.8" height="4.8" fill="#D9D9D9" />
          <rect y="7.48444" width="4.8" height="4.8" fill="#D9D9D9" />
          <rect x="7.2002" y="7.48444" width="4.8" height="4.8" fill="#D9D9D9" />
        </svg>

      </button>
    </div>
    <div id="list_view_tab" class="admin_table_wrapper mb-8">
      <table class="admin_table">
        <thead class="text-lg font-normal text-gray-600">
          <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Discount price</th>
          </tr>
        </thead>
        <tbody>
          @empty(!$products)
            @foreach ($products as $product)
              <tr>
                <td>{{ $product->title }}</td>
                <td><b>€{{ $product->price }}</b></td>
                <td>{{ $product->discount_price ?? '-' }}</td>
                <td align="right">
                  <a href="{{ route('products.edit', $product->id) }}" id="product_edit_btn"
                    class="font-bold lg:mr-8 mr-3">edit</a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="product_delete_btn"
                      onclick="return confirm('Are you sure you want to delete this product?')"
                      class="font-bold">delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          @endempty
        </tbody>
      </table>
    </div>
    <div id="grid_view_tab" class="hidden mb-8">
      <div
        class="grid 2xl:grid-cols-6 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-x-4 gap-y-6">
        @empty(!$products)
          @foreach ($products as $product)
            @php
              $images = json_decode($product->photos);
            @endphp
            <div class="grid_view_card">
              <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ asset('storage/') . '/' . $images[0] }}" alt="" class="grid_view_product_img">
              </a>
              <div class="px-4">
                <h5 class="font-medium text-gray-800 my-3">
                  {{ $product->title }}
                </h5>
                <p class="text-xl font-bold text-gray-800">€{{ $product->price }}</p>
                <div class="flex gap-x-1 mt-3.5">
                  <a href="{{ route('products.edit', $product->id) }}" id="product_edit_btn"
                    class="grid_view_product_btn flex-auto">edit</a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-auto inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="product_delete_btn" class="grid_view_product_btn w-full"
                      onclick="return confirm('Are you sure you want to delete this product?')"
                      class="font-bold">delete</button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        @endempty
      </div>
    </div>
    {{ $products->links() }}
  </div>

  <script>
    let listView = document.querySelector('#list_view');
    let gridView = document.querySelector('#grid_view');
    let listViewTab = document.querySelector('#list_view_tab');
    let gridViewTab = document.querySelector('#grid_view_tab');

    if (localStorage.getItem('admin_products_layout')) {
      if (localStorage.getItem('admin_products_layout') === 'grid') {
        setGridView();
      } else {
        setListView();
      }
    }

    listView.addEventListener('click', function() {
      setListView();
      localStorage.setItem('admin_products_layout', 'list')
    })
    gridView.addEventListener('click', function() {
      setGridView();
      localStorage.setItem('admin_products_layout', 'grid')
    })

    function setListView() {
      listViewTab.classList.remove('hidden');
      gridViewTab.classList.add('hidden');
      listView.classList.add('active');
      gridView.classList.remove('active');
    }

    function setGridView() {
      listViewTab.classList.add('hidden');
      gridViewTab.classList.remove('hidden');
      listView.classList.remove('active');
      gridView.classList.add('active');
    }
  </script>
@endsection
