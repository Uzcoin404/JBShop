@extends('layouts.admin')
@section('content')
  <div class="2xl:container mx-auto lg:px-10 px-4 my-12">
    <div class="flex items-center justify-between">
      <h1 class="lg:text-4xl text-3xl font-bold text-gray-800">Menu</h1>
      <button type="button" id="openCategoryModal">
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
        <span class="text-xs font-bold" style="color: #2B9B73;">add category</span>
      </button>
    </div>
    <p id="categoryStatusText" class="hidden text-green-500 my-2.5">Catogory added successfuly</p>
    <div id="list_view_tab" class="admin_table_wrapper mb-8">
      <table class="admin_table">
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td align="right">
                <button type="submit" class="category_open_update_modal font-bold mr-3">
                  edit
                </button>
                <div class="category_update_modal hidden z-10">
                  <form action="{{ route('categories.update', $category->id) }}" method="POST" class="block">
                    @csrf
                    @method('PATCH')
                    <h3 class="text-left text-xl font-medium mb-3">Change category name</h3>
                    <input type="text" name="name" value="{{ $category->name }}"
                      class="w-full px-4 py-3 rounded-lg border" placeholder="Enter a new name" />
                    <button type="submit" class="btn !w-auto mt-3 px-8 mr-auto">Save</button>
                  </form>
                </div>
                <div class="category_update_modal_overlay hidden fixed top-0 left-0 w-full h-full"></div>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" id="product_delete_btn"
                    onclick="return confirm('Are you sure you want to delete this category?')"
                    class="font-bold">delete</button>
                </form>
              </td>
            </tr>
            @if ($category->subcategory)
              @php
                $subcategories = json_decode($category->subcategory);
              @endphp
              @foreach ($subcategories as $subcategory)
                <tr>
                  <td class="left_gap">{{ $subcategory }}</td>
                  <td align="right">
                    <button type="submit" class="category_open_update_modal font-bold mr-3">
                      edit
                    </button>
                    <div class="category_update_modal hidden z-10">
                      <form action="{{ route('categories.update', $category->id) }}" method="POST" class="block">
                        @csrf
                        @method('PATCH')
                        <h3 class="text-left text-xl font-medium mb-3">Change category name</h3>
                        <input type="hidden" name="previous_name" value="{{ $subcategory }}" />
                        <input type="text" name="name" value="{{ $subcategory }}"
                          class="w-full px-4 py-3 rounded-lg border" placeholder="Enter a new name" />
                        <button type="submit" class="btn !w-auto mt-3 px-8 mr-auto">Save</button>
                      </form>
                    </div>
                    <div class="category_update_modal_overlay hidden fixed top-0 left-0 w-full h-full"></div>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="subcategory" value="{{ $subcategory }}" />
                      <button type="submit" id="product_delete_btn"
                        onclick="return confirm('Are you sure you want to delete this category?')"
                        class="font-bold">delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- Modal Overlay -->
  <div class="hidden fixed top-0 left-0 w-full h-full bg-black opacity-50 z-40" id="modalOverlay"></div>

  <!-- Modal Content -->
  <div
    class="hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-lg shadow-lg z-50"
    id="modalContent">
    <h1 class="text-xl font-bold mb-4">Create New Category</h1>
    <form id="createCategoryForm" action="#">
      <div class="mb-4" style="min-width: 320px;">
        <input type="text" name="name" id="category_name" class="w-full rounded-lg border"
          placeholder="Category name" required>
      </div>
      <div class="mb-4" style="min-width: 320px;">
        <label for="category" class="mb-4">Select category to create subcategory</label>
        <select name="subcategory" class="w-full p-2 rounded-lg border">
          <option value="">Select from existing category</option>
          @foreach ($categories as $category)
            <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" id="createCategoryBtn" class="btn add_product_btn">Create</button>
    </form>
  </div>
  <script>
    const updateModalBtn = document.querySelectorAll('.category_open_update_modal');
    const updateModal = document.querySelectorAll('.category_update_modal');
    const updateModalOverlay = document.querySelectorAll('.category_update_modal_overlay');
    const openCategoryModal = document.querySelector('#openCategoryModal');
    const createCategoryForm = document.querySelector('#createCategoryForm');
    const categoryName = document.querySelector('#category_name');
    const category = document.querySelector('#category');
    const modal = document.querySelector('.fixed');
    const modalOverlay = document.getElementById('modalOverlay');
    const modalContent = document.getElementById('modalContent');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    updateModalBtn.forEach((btn, i) => {
      btn.addEventListener('click', function() {
        updateModal[i].classList.remove('hidden');
        updateModalOverlay[i].classList.remove('hidden');
      });
    })
    updateModalOverlay.forEach((btn, i) => {
      btn.addEventListener('click', function() {
        updateModal[i].classList.add('hidden');
        updateModalOverlay[i].classList.add('hidden');
      });
    })

    openCategoryModal.addEventListener('click', function() {
      modalOverlay.style.display = 'block';
      modalContent.style.display = 'block';
    });

    modalOverlay.addEventListener('click', (event) => {
      if (event.target === modalOverlay) {
        modalOverlay.style.display = 'none';
        modalContent.style.display = 'none';
      }
    });
    createCategoryForm.addEventListener('submit', (event) => {
      event.preventDefault()
      formData = new FormData(createCategoryForm);
      fetch('/categories', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          body: formData,
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);
          if (data.status) {
            modalOverlay.style.display = 'none';
            modalContent.style.display = 'none';
            document.querySelector('#categoryStatusText').classList.remove('hidden');
            location.reload();
          } else {
            alert(data.error);
          }
        })
        .catch(error => {
          console.log(error);
          alert('Error creating category. Please try again.');
        });
    })
  </script>
@endsection
