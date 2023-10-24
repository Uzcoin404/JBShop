@php
  $photos = json_decode($product->photos);
@endphp

@extends('layouts.admin')
@section('content')
  <div class="2xl:container mx-auto lg:px-10 px-4 mt-12 pb-20">
    <div class="flex justify-between">
      <h1 class="lg:text-4xl text-3xl font-bold text-gray-800">Add Product</h1>
      <a href="{{ route('products.index') }}" class="text-base underline">Go back</a>
    </div>
    <form action="{{ route('products.update', $product->id) }}" method="POST"
      class="flex lg:flex-row flex-col lg:gap-10 gap-y-12 mt-3">
      @csrf
      @method('PATCH')
      <div class="flex-1">
        <div class="w-full">
          <label for="price" class="block lg:text-lg leading-6 text-gray-900">Title</label>
          <div class="relative mt-2 rounded-md shadow-sm">
            <input type="text" name="title" id="title" value="{{ $product->title }}"
              class="block w-full lg:h-20 h-12 rounded-md border-0 py-1.5 px-8 lg:text-lg text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset"
              required>
          </div>
        </div>
        <div id="uploaded_images" class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-3 sm:grid-cols-2 gap-2.5 mt-2.5">
          @empty(!$photos)
            @foreach ($photos as $i => $image)
              <div class="photo_item relative" data-index="{{ $i }}">
                <img src="{{ asset('storage/') . '/' . $image }}" alt="" id="photo_item_image" class="h-full">
                <div class="photo_content absolute top-2.5 right-2.5">
                  <div class="flex gap-x-1.5">
                    <button type="button" class="photo_item_btn" data-index="{{ $i }}" onclick="deleteImage(this)">
                      <img src="{{ asset('img/icons/trash.svg') }}" alt="">
                    </button>
                    <input type="radio" name="main_image" id="main_image" class="photo_item_btn">
                  </div>
                </div>
              </div>
            @endforeach
          @endempty
          <div class="add_photos w-full aspect-square" style="height: 100%;">
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
                <b>add photo</b>
              </p>
              <input name="photos[]" type="file" id="upload_input" multiple accept="image/*"
                class="absolute opacity-0 top-0 left-0 w-full h-full">
              <input type="hidden" name="photos" id="photosInput" required />
            </div>
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
              <input type="number" name="price" id="price" min="0" step="0.01"
                value="{{ $product->price }}"
                class="block w-full lg:h-20 h-12 font-bold rounded-md border-0 py-1.5 px-8 lg:text-lg text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset"
                placeholder="0.00" required>
            </div>
          </div>
          <div class="w-52">
            <label for="price" class="block lg:text-lg leading-6 text-gray-900">Discount price</label>
            <div class="relative mt-2 rounded-md shadow-sm">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-800 lg:text-lg font-bold">€</span>
              </div>
              <input type="number" name="discount_price" id="discount_price" min="0" step="0.01"
                @isset($product->discount_price) value="{{ $product->discount_price }}" @endisset
                class="block w-full lg:h-20 h-12 font-bold rounded-md border-0 py-1.5 px-8 lg:text-lg text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset"
                placeholder="0.00">
            </div>
          </div>
        </div>
        <div class="my-8">
          <textarea id="rich_texteditor" name='html'>
          @isset($product->html)
{{ $product->html }}
@endisset
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
  <script src="{{ asset('js/sortable.min.js') }}"></script>
  <script>
    tinymce.init({
      selector: '#rich_texteditor',
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
      menubar: 'file edit view insert format tools table help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
      toolbar_sticky: true,
      autosave_ask_before_unload: true,
      autosave_interval: '30s',
      autosave_restore_when_empty: false,
      autosave_retention: '2m',
      image_advtab: true,
      importcss_append: true,
      template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
      template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
      height: 600,
      image_caption: true,
      quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
      noneditable_noneditable_class: 'mceNonEditable',
      toolbar_mode: 'sliding',
      contextmenu: 'link image imagetools table',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    let uploadInput = document.querySelector('#upload_input');
    let productForm = document.querySelector('#productForm');
    let uploadedImagesEl = document.querySelector('#uploaded_images');
    let photoItem = document.querySelectorAll('.photo_item');
    if (photoItem && photoItem?.length !== 0) updateImagesOrder();

    uploadInput.addEventListener('change', function(event) {
      if (event.target.files.length !== 0 && event.target.files.length <= 10) {
        const formData = new FormData();
        for (const file of event.target.files) {
          formData.append('photos[]', file);
        }
        let files = event.target.files;
        fetch('/api/upload', {
            method: 'POST',
            body: formData,
          })
          .then(response => response.json())
          .then(data => {
            let i = photoItem.length;
            if (!data) return;
            data.forEach(image => {
              let html = `
              <div class="photo_item relative" data-index="${i}">
                <img src="/storage/${image}" alt="" id="photo_item_image" class="h-full">
                <div class="photo_content absolute top-2.5 right-2.5">
                  <div class="flex gap-x-1.5">
                  <button type="button" class="photo_item_btn" data-index="${i}" onclick="deleteImage(this)">
                    <img src="{{ asset('img/icons/trash.svg') }}" alt="">
                  </button>
                  <input type="radio" name="main_image" id="main_image" class="photo_item_btn">
                  </div>
                </div>
              </div>`
              document.querySelector('#uploaded_images .add_photos').insertAdjacentHTML('beforebegin', html)
            })
            updateImagesOrder();
          })
          .catch(error => {
            alert('Error uploading image. Please try again.' + error);
          });
      } else {
        alert("Uploading more than 10 images not allowed");
        this.value = ''
      }
    })

    function updateImagesOrder() {
      photoItem = document.querySelectorAll('.photo_item');
      let photoItemImg = document.querySelectorAll('#photo_item_image');
      let photoItemBtn = document.querySelectorAll('button.photo_item_btn');
      let photoItemRadio = document.querySelectorAll('input.photo_item_btn');
      let images = [];
      for (let i = 0; i < photoItem.length; i++) {
        let photoUrl = photoItemImg[i].src.replace(/.*\/storage\//, '');
        images.push(photoUrl);
        photoItem[i].setAttribute('data-index', i);
        photoItemBtn[i].setAttribute('data-index', i);
        photoItemRadio[i].value = i;
      }
      document.querySelector('#photosInput').value = JSON.stringify(images);
    }

    function deleteImage(btn) {
      document.querySelector(`.photo_item[data-index="${btn.getAttribute('data-index')}"]`).remove();
      updateImagesOrder();
    };

    new Sortable(uploadedImagesEl, {
      animation: 150,

      onEnd: (event) => {
        updateImagesOrder();
      }
    })
  </script>
@endsection
