@extends('layouts.admin')
@section('content')
  <div class="2xl:container mx-auto lg:px-10 px-4 mt-12 pb-20">
    <h1 class="lg:text-4xl text-3xl font-bold text-gray-800">Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype='multipart/form-data' id="productForm"
      class="flex lg:flex-row flex-col lg:gap-10 gap-y-12 mt-3">
      @csrf
      <div class="flex-1">
        <div class="w-full mb-2.5">
          <label for="price" class="block lg:text-lg leading-6 text-gray-900">Title</label>
          <div class="relative mt-2 rounded-md shadow-sm">
            <input type="text" name="title" id="title" required
              class="block w-full lg:h-20 h-12 rounded-md border-0 py-1.5 px-8 lg:text-lg text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
            <input name="photos[]" type="hidden" id="sdfsdfsdf" />
          </div>
        </div>
        <div id="uploaded_images" class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-3 sm:grid-cols-2 gap-2.5 my-2.5">
        </div>
        <div class="add_photos w-full">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47" fill="none"
              class="mx-auto">
              <path
                d="M0 23.0635C0 21.6773 1.12373 20.5535 2.50992 20.5535H43.5053C44.8915 20.5535 46.0152 21.6773 46.0152 23.0635C46.0152 24.4497 44.8915 25.5734 43.5053 25.5734H2.50992C1.12373 25.5734 0 24.4497 0 23.0635Z"
                fill="#494949" />
              <path
                d="M23.0076 46.0711C21.6214 46.0711 20.4977 44.9473 20.4977 43.5612L20.4977 2.56577C20.4977 1.17958 21.6214 0.0558473 23.0076 0.0558473C24.3938 0.0558472 25.5175 1.17958 25.5175 2.56577L25.5175 43.5612C25.5175 44.9473 24.3938 46.0711 23.0076 46.0711Z"
                fill="#494949" />
            </svg>
            <p class="text-lg text-center text-gray-800 mt-5">
              <b>add photos</b> <br>
              (up to 10 pictures)
            </p>
            <input id="upload_input" type="file" multiple accept="image/*" required
              class="absolute opacity-0 top-0 left-0 w-full h-full">
          </div>
        </div>
      </div>
      <div class="flex-1">
        <div class="flex">
          <div class="w-52 mr-4">
            <label for="price" class="block lg:text-lg leading-6 text-gray-900">Price</label>
            <div class="relative mt-2 rounded-md shadow-sm">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-800 lg:text-lg font-bold">€</span>
              </div>
              <input type="number" name="price" id="price" min="0" step="0.01" required
                class="block w-full lg:h-20 h-12 font-bold rounded-md border-0 py-1.5 px-8 lg:text-lg text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset"
                placeholder="0.00">
            </div>
          </div>
          <div class="w-52">
            <label for="price" class="block lg:text-lg leading-6 text-gray-900">Discount price</label>
            <div class="relative mt-2 rounded-md shadow-sm">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-800 lg:text-lg font-bold">€</span>
              </div>
              <input type="number" name="discount_price" id="discount_price" min="0" step="0.01"
                class="block w-full lg:h-20 h-12 font-bold rounded-md border-0 py-1.5 px-8 lg:text-lg text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset"
                placeholder="0.00">
            </div>
          </div>
        </div>
        <div class="my-8">
          <textarea id="rich_texteditor" name="html">
						Lorem ipsum dolor sit amet.
					</textarea>
        </div>
        <div class="flex lg:justify-end">
          <a href="{{ route('products.index') }}" class="btn add_product_btn mr-2">Cancel</a>
          <button type="submit" class="btn add_product_btn">Save</button>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.tiny.cloud/1/9cc2j8k45ibwnkmf5gnm7uv7avtotf23nljojb3xje5u5nny/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#rich_texteditor',
      width: '100%',
      height: '500px',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    let uploadInput = document.querySelector('#upload_input');
    let productForm = document.querySelector('#productForm');
    var formData = new FormData(productForm);
    let selectedFiles = [];

    uploadInput.addEventListener('change', function(event) {
      if (event.target.files && event.target.files?.length <= 10) {
        let files = event.target.files;
        for (let i = 0; i < files.length; i++) {
          let reader = new FileReader();
          reader.onload = function(event) {
            let uniqueID = Date.now() + "_" + Math.floor(Math.random() * 100);
            let html = `
						<div class="photo_item relative" data-index="${uniqueID}">
							<img src="${event.target.result}" alt="" class="h-full">
							<div class="photo_content absolute top-2.5 right-2.5">
								<div class="flex gap-x-1.5">
								<button type="button" id="uploaded_item_delete_btn" class="photo_item_btn" data-index="${uniqueID}">
									<img src="{{ asset('img/icons/trash.svg') }}" alt="">
								</button>
								<input type="radio" name="main_image" id="main_image" class="photo_item_btn">
								</div>
							</div>
						</div>`;
            document.querySelector('#uploaded_images').insertAdjacentHTML('beforeend', html)
            selectedFiles.push(files[i]);
          }
          reader.readAsDataURL(event.target.files[i])
        }
      } else {
        alert("Uploading more than 10 images not allowed");
        this.value = ''
      }
    })
    window.addEventListener('click', function(event) {
      if (event.target.id === 'uploaded_item_delete_btn') {
        document.querySelector(`.photo_item[data-index="${event.target.getAttribute('data-index')}"]`).remove();
        selectedFiles = selectedFiles.filter(selectedFile => selectedFile !== file);
        updateFileInput()
      }
    });

    function updateFileInput() {
      // Create a new FileList using the selectedFiles array
      const newFileList = new DataTransfer();
      for (const file of selectedFiles) {
        newFileList.items.add(file);
      }

      // Update the file input's files property
      uploadInput.files = newFileList.files;
    }
  </script>
@endsection