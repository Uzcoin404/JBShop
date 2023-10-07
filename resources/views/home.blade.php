<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JBShop</title>
  <link rel="shortcut icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <header>
    <nav class="mx-auto flex max-w-screen-2xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex">
        <a href="#" class="mr-5 -m-1.5 p-1.5">
          <img class="nav__logo" src="img/icons/logo.png" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" id="navbar_menu_btn" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex xl:gap-x-12 gap-x-5">
        <a href="#" class="flex 2xl:text-lg text-sm 2xl:font-bold font-semibold nav__link">
          <img src="img/icons/circle-check.svg" alt="" class="mr-2">
          Kauf auf Rechnung via PayPal
        </a>
        <a href="#" class="flex 2xl:text-lg text-sm 2xl:font-bold font-semibold nav__link">
          <img src="img/icons/circle-check.svg" alt="" class="mr-2">
          Kostenloser Versand
        </a>
        <a href="#" class="flex 2xl:text-lg text-sm 2xl:font-bold font-semibold nav__link">
          <img src="img/icons/circle-check.svg" alt="" class="mr-2">
          4 Wochen kostenlose Rücknahme
        </a>
        <a href="#" class="flex 2xl:text-lg text-sm 2xl:font-bold font-semibold nav__link">
          <img src="img/icons/circle-check.svg" alt="" class="mr-2">
          zuverlässiger Service
        </a>
      </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="hidden" id="navbar_toggle" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div id="navbar_toggle_backdrop" class="fixed inset-0 z-10"></div>
      <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <img class="h-12 w-auto" src="img/icons/logo.png" alt="">
          </a>
          <button type="button" id="navbar_close_btn" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <a href="#" class="-mx-3 flex rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 nav__link">
                <img src="img/icons/circle-check.svg" alt="" class="mr-2">
                Kauf auf Rechnung via PayPal
              </a>
              <a href="#" class="-mx-3 flex rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 nav__link">
                <img src="img/icons/circle-check.svg" alt="" class="mr-2">
                Kostenloser Versand
              </a>
              <a href="#" class="-mx-3 flex rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 nav__link">
                <img src="img/icons/circle-check.svg" alt="" class="mr-2">
                4 Wochen kostenlose Rücknahme
              </a>
              <a href="#" class="-mx-3 flex rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 nav__link">
                <img src="img/icons/circle-check.svg" alt="" class="mr-2">
                zuverlässiger Service
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="hero">
    <div class="2xl:container mx-auto px-5 lg:pr-5 pr-0">
      <div class="hero_content flex items-center">
        <div style="min-width: 320px;">
          <h1 class="hero_title">
            Hochwertige und nicht teure Waren für die ganze Familie!
          </h1>
          <a href="#" class="btn mt-3">
            Beste Wahl!
          </a>
        </div>
        <img src="{{asset('img/hero.png')}}" alt="" class="hero_img">
      </div>
    </div>
  </div>
  <div class="2xl:container mx-auto px-5">
    <div class="hero_menu relative flex flex-wrap lg:justify-center bg_green mt-8 rounded">
      <div class="hero_menu_link">
        <span class="link_title 2xl:text-lg text-sm lg:px-8 px-4 py-2.5">Gartenmöbel</span>
        <div class="hero_menu_content 2xl:container">
          <h2>Some stuff here</h2>
        </div>
      </div>
      <div class="hero_menu_link">
        <span class="link_title 2xl:text-lg text-sm lg:px-8 px-4 py-2.5">Camping&Sport</span>
        <div class="hero_menu_content 2xl:container">
          <h2>Some stuff here 2</h2>
        </div>
      </div>
      <div class="hero_menu_link">
        <span class="link_title 2xl:text-lg text-sm lg:px-8 px-4 py-2.5">Haushalt</span>
        <div class="hero_menu_content 2xl:container">
          <h2>Some stuff here 3</h2>
        </div>
      </div>
    </div>
    <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-3 gap-3">
      <div class="header_box">
        <div class="header_box_icon">
          <svg width="43" height="32" viewBox="0 0 43 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.34014 0.888889C2.34014 0.397969 2.73303 0 3.21769 0H28.0816C29.2125 0 30.1293 0.928595 30.1293 2.07407V6.51852C30.1293 6.68216 30.2602 6.81482 30.4218 6.81482H35.3946C36.0391 6.81482 36.646 7.12218 37.0327 7.64444L42.5905 15.1506C42.8563 15.5096 43 15.9463 43 16.3951V23.1111C43 24.2566 42.0833 25.1852 40.9524 25.1852H3.21769C2.73303 25.1852 2.34014 24.7872 2.34014 24.2963C2.34014 23.8054 2.73303 23.4074 3.21769 23.4074H40.9524C41.1139 23.4074 41.2449 23.2748 41.2449 23.1111V16.3951C41.2449 16.331 41.2244 16.2686 41.1864 16.2173L35.6286 8.71111C35.5733 8.6365 35.4866 8.59259 35.3946 8.59259H30.4218C29.2909 8.59259 28.3741 7.664 28.3741 6.51852V2.07407C28.3741 1.91043 28.2432 1.77778 28.0816 1.77778H3.21769C2.73303 1.77778 2.34014 1.37981 2.34014 0.888889Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3741 24.2963V3.25926H30.1293V24.2963H28.3741Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.92517 8.2963C2.92517 7.80538 3.31806 7.40741 3.80272 7.40741H16.381C16.8656 7.40741 17.2585 7.80538 17.2585 8.2963C17.2585 8.78722 16.8656 9.18519 16.381 9.18519H3.80272C3.31806 9.18519 2.92517 8.78722 2.92517 8.2963Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 17.1852C0 16.6943 0.392893 16.2963 0.877551 16.2963H13.4558C13.9404 16.2963 14.3333 16.6943 14.3333 17.1852C14.3333 17.6761 13.9404 18.0741 13.4558 18.0741H0.877551C0.392893 18.0741 0 17.6761 0 17.1852Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.26375 24.2963C6.88032 24.2963 6.54052 24.5612 6.48976 24.9462C6.45389 25.2182 6.43537 25.4958 6.43537 25.7778C6.43537 29.2142 9.18563 32 12.5782 32C15.9708 32 18.7211 29.2142 18.7211 25.7778C18.7211 25.4958 18.7026 25.2182 18.6667 24.9462C18.6159 24.5612 18.2761 24.2963 17.8927 24.2963C17.3186 24.2963 16.9144 24.8793 16.9549 25.4594C16.9622 25.5646 16.966 25.6707 16.966 25.7778C16.966 28.2324 15.0015 30.2222 12.5782 30.2222C10.1549 30.2222 8.19048 28.2324 8.19048 25.7778C8.19048 25.6707 8.19421 25.5646 8.20156 25.4594C8.24209 24.8793 7.83789 24.2963 7.26375 24.2963ZM26.5699 24.2963C26.1864 24.2963 25.8466 24.5612 25.7959 24.9462C25.76 25.2182 25.7415 25.4958 25.7415 25.7778C25.7415 29.2142 28.4917 32 31.8844 32C35.277 32 38.0272 29.2142 38.0272 25.7778C38.0272 25.4958 38.0087 25.2182 37.9728 24.9462C37.9221 24.5612 37.5823 24.2963 37.1988 24.2963C36.6247 24.2963 36.2205 24.8793 36.261 25.4595C36.2684 25.5646 36.2721 25.6707 36.2721 25.7778C36.2721 28.2324 34.3076 30.2222 31.8844 30.2222C29.4611 30.2222 27.4966 28.2324 27.4966 25.7778C27.4966 25.6707 27.5003 25.5646 27.5077 25.4594C27.5482 24.8793 27.144 24.2963 26.5699 24.2963Z" fill="#333333" />
          </svg>
        </div>
        <div class="pl-5">
          <h5 class="xl:text-lg text-base font-bold text-gray-800">Gratis Versand</h5>
          <p class="text-sm text-gray-800">
            Bestellungen werden normalerweise innerhalb von 3-4 Werktagen
            geliefert.
          </p>
        </div>
      </div>
      <div class="header_box">
        <div class="header_box_icon">
          <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.15492 1.37405C5.78294 1.37405 5.43473 1.5591 5.22355 1.86901L1.55768 7.24866C1.42742 7.43981 1.35766 7.66653 1.35766 7.89873V27.4809C1.35766 28.1133 1.8642 28.626 2.48905 28.626H28.5109C29.1358 28.626 29.6423 28.1133 29.6423 27.4809V7.92192C29.6423 7.68073 29.5671 7.4457 29.4273 7.25035L25.5616 1.84751C25.3488 1.55012 25.008 1.37405 24.6452 1.37405H6.15492ZM4.1059 1.08892C4.57051 0.407113 5.33657 0 6.15492 0H24.6452C25.4433 0 26.1931 0.387368 26.6612 1.04162L30.5269 6.44445C30.8344 6.87423 31 7.3913 31 7.92192V27.4809C31 28.8722 29.8856 30 28.5109 30H2.48905C1.11439 30 0 28.8722 0 27.4809V7.89873C0 7.38788 0.153464 6.8891 0.440033 6.46856L4.1059 1.08892Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M30.3212 8.01527H0.678832V6.64122H30.3212V8.01527Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.708 7.32824V0.458015H16.0657V7.32824H14.708Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9253 12.5676C13.1904 12.8359 13.1904 13.2709 12.9253 13.5392L10.4637 16.0305L12.9253 18.5218C13.1904 18.7901 13.1904 19.2251 12.9253 19.4934C12.6602 19.7617 12.2303 19.7617 11.9652 19.4934L9.02364 16.5163C8.75854 16.248 8.75854 15.813 9.02364 15.5447L11.9652 12.5676C12.2303 12.2993 12.6602 12.2993 12.9253 12.5676Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82482 16.0305C8.82482 15.6511 9.12874 15.3435 9.50365 15.3435H18.3285C19.5128 15.3435 20.4565 15.81 21.1002 16.5388C21.7331 17.2554 22.0485 18.1929 22.062 19.112C22.0754 20.0313 21.787 20.9774 21.1536 21.7026C20.5089 22.4408 19.549 22.9008 18.3285 22.9008H14.708C14.3331 22.9008 14.0292 22.5932 14.0292 22.2137C14.0292 21.8343 14.3331 21.5267 14.708 21.5267H18.3285C19.1897 21.5267 19.7685 21.2138 20.1364 20.7926C20.5155 20.3585 20.7136 19.7588 20.7045 19.1323C20.6953 18.5056 20.479 17.8973 20.0879 17.4545C19.7077 17.024 19.1353 16.7176 18.3285 16.7176H9.50365C9.12874 16.7176 8.82482 16.41 8.82482 16.0305Z" fill="#333333" />
          </svg>
        </div>
        <div class="pl-5">
          <h5 class="xl:text-lg text-base font-bold text-gray-800">30 Tage Rückgaberecht</h5>
          <p class="text-sm text-gray-800">
            Bei allen Refurbished-Artikeln gelten 30 Tage Rückgaberecht
          </p>
        </div>
      </div>
      <div class="header_box">
        <div class="header_box_icon">
          <svg width="38" height="35" viewBox="0 0 38 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 9C0 8.44771 0.447715 8 1 8H37C37.5523 8 38 8.44771 38 9V13.8C38 14.0662 37.9131 14.3132 37.8497 14.4686C37.7742 14.6534 37.6714 14.8506 37.5488 15.0496C37.3029 15.4486 36.9485 15.9015 36.4899 16.3304C35.5716 17.1892 34.1795 18 32.3636 18C30.3629 18 28.8937 16.995 27.9908 16.0169C27.0501 17.0021 25.5034 18 23.3636 18C21.2239 18 19.6772 17.0021 18.7365 16.0169C17.8335 16.995 16.3644 18 14.3636 18C12.2931 18 10.6992 16.9198 9.72727 15.9247C8.75531 16.9198 7.16147 18 5.09091 18C3.6258 18 2.37371 17.4297 1.48639 16.6521C0.630072 15.9017 0 14.8494 0 13.8V9ZM2 10V13.8C2 14.084 2.21538 14.6316 2.80452 15.1479C3.36265 15.637 4.15602 16 5.09091 16C7.00163 16 8.42242 14.5478 8.87495 13.8103C9.05681 13.514 9.37956 13.3333 9.72727 13.3333C10.075 13.3333 10.3977 13.514 10.5796 13.8103C11.0321 14.5478 12.4529 16 14.3636 16C16.2464 16 17.4775 14.5809 17.8369 13.878C18.0079 13.5437 18.3518 13.3333 18.7273 13.3333C19.1028 13.3333 19.4466 13.5437 19.6176 13.878C19.9561 14.54 21.228 16 23.3636 16C25.4993 16 26.7712 14.54 27.1097 13.878C27.2806 13.5437 27.6245 13.3333 28 13.3333C28.3755 13.3333 28.7194 13.5437 28.8903 13.878C29.2498 14.5809 30.4809 16 32.3636 16C33.5478 16 34.4739 15.4775 35.1237 14.8696C35.4493 14.5652 35.6914 14.2514 35.8461 14.0004C35.9237 13.8744 35.9723 13.7757 35.998 13.7127L36 13.7077V9.99999L2 10Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.51155 2C7.18089 2 6.8716 2.16346 6.68532 2.43666L1.82623 9.56334L0.173773 8.43666L5.03287 1.30999C5.5917 0.490377 6.51955 0 7.51155 0H30.2449C31.2126 0 32.1209 0.466805 32.6842 1.25366L37.8131 8.41789L36.1869 9.58211L31.058 2.41789C30.8702 2.1556 30.5674 2 30.2449 2H7.51155Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M36 16V32C36 33.6569 34.6569 35 33 35H5C3.34315 35 2 33.6569 2 32V16.5373H4V32C4 32.5523 4.44771 33 5 33H33C33.5523 33 34 32.5523 34 32V16H36Z" fill="#333333" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7154 21.6987L17.9014 29.6987C17.7133 29.8914 17.4553 30 17.186 30C16.9168 30 16.6588 29.8914 16.4707 29.6987L12.2846 25.413L13.7154 24.0156L17.186 27.5689L24.2846 20.3013L25.7154 21.6987Z" fill="#333333" />
          </svg>
        </div>
        <div class="pl-5">
          <h5 class="xl:text-lg text-base font-bold text-gray-800">Vom Hersteller zertifiziert</h5>
          <p class="text-sm text-gray-800">
            Neuwertiger Zustand. Vom Hersteller oder von einem vom Hersteller autorisierten Anbieter generalüberholt
          </p>
        </div>
      </div>
    </div>
    <div class="flex lg:flex-nowrap flex-wrap xl:gap-x-12 lg:gap-x-6 mt-16">
      <div class="product_section">
        <h1 class="hero_title max-w-none mb-10">
          Hochwertige und nicht teure Waren für die ganze Familie!
        </h1>
        <div class="flex flex-wrap gap-y-5">
          <img src="img/image1.png" alt="" class="product_image">
          <div class="flex gap-x-5">
            <div><img src="img/image1.png" alt="" class="product_image"></div>
            <div><img src="img/image1.png" alt="" class="product_image"></div>
            <div><img src="img/image1.png" alt="" class="product_image"></div>
          </div>
          <div class="flex gap-x-5">
            <div><img src="img/image1.png" alt="" class="product_image"></div>
            <div><img src="img/image1.png" alt="" class="product_image"></div>
            <div><img src="img/image1.png" alt="" class="product_image"></div>
          </div>
          <div class="flex gap-x-5">
            <div><img src="img/image1.png" alt="" class="product_image"></div>
            <div><img src="img/image1.png" alt="" class="product_image"></div>
            <div><img src="img/image1.png" alt="" class="product_image"></div>
          </div>
        </div>
      </div>
      <div class="product_section">
        <div class="flex flex-wrap gap-3 justify-between lg:mt-0 mt-8">
          <div class="flex">
            <span class="product_price 2xl:text-5xl lg:text-4xl text-3xl">
              €499<sup class="lg:text-3xl text-2xl">00</sup>
            </span>
            <span class="price_strike lg:text-3xl text-2xl">
              €600<sup class="lg:text-lg text-base align-baseline">00</sup>
            </span>
          </div>
          <div class="flex gap-x-2 lg:w-auto w-full">
            <button type="button" class="product_btn lg:w-auto w-full">Copy link</button>
            <button type="button" class="product_btn lg:w-auto w-full">
              <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.25 7H16.75V5C16.75 3 16 2 13.75 2H10.25C8 2 7.25 3 7.25 5V7Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 15V19C16 21 15 22 13 22H11C9 22 8 21 8 19V15H16Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21 10V15C21 17 20 18 18 18H16V15H8V18H6C4 18 3 17 3 15V10C3 8 4 7 6 7H18C20 7 21 8 21 10Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M17 15H15.79H7" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7 11H10" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              Print</button>
          </div>
        </div>
        <table class="product_details_table mt-5 mb-10">
          <tbody>
            <tr>
              <td>Artikelzustand</td>
              <th align="left">Neu mit Etikett: Neuer, unbenutzter und nicht getragener Artikel in der
                Originalverpackung (wie z. ...
                Mehr zum ThemaÜber den Zustand</th>
            </tr>
            <tr>
              <td>Farbe</td>
              <th align="left">Schwarz</th>
            </tr>
            <tr>
              <td>Besonderheiten</td>
              <th align="left">Erweiterbar, Leicht, Mit Schloss, Räder/Rollen, Teleskopgriff</th>
            </tr>
            <tr>
              <td>Material</td>
              <th align="left">Kunststoff</th>
            </tr>
            <tr>
              <td>Ausführung</td>
              <th align="left">Hartschale</th>
            </tr>
            <tr>
              <td>Marke</td>
              <th align="left">Cheffinger</th>
            </tr>
            <tr>
              <td>Produktart</td>
              <th align="left">Koffer</th>
            </tr>
            <tr>
              <td>Rollen</td>
              <th align="left">Mit 4 Rollen</th>
            </tr>
            <tr>
              <td>Geschlecht</td>
              <th align="left">Unisex</th>
            </tr>
          </tbody>
        </table>
        <h5 class="xl:text-lg text-base font-bold leading-10">Artikelbeschreibung des Verkäufers</h5>
        <h6 class="xl:text-lg text-base font-medium leading-10">Hochwertige Hartschalen Reisekoffer</h6>
        <ul class="product_info_list xl:text-lg text-base">
          <li>Aus robustem und qualitativem ABS-Material hergestellt</li>
          <li>Diese bieten eine gute Widerstandsfähigkeit vor Stößen und Kratzern und Schmutz.</li>
          <li>Jeder Koffer ist mit 4 Doppelrollen ausgestatte,welche sind 360 drehen können,das manövrieren ist damit
            sehr leicht und einfach und vor allem sehr leise.</li>
          <li>Ein Zahlenschloss ist mit dabei,dieser sorgt für erhöhte Sicherheit für die Gegenstände welche sich im
            Koffer innen befinden.</li>
          <li>Alle Koffer haben 2 ergonomische Tragegriffe,eines oben und eines auf der Seite,damit kann man die Koffer
            heben.</li>
          <li>4 Seitenfüße sind ebenfalls auf jedem Koffer zu finden,damit kann man die Koffer auch Waagrecht stellen.
          </li>
          <li>Ein verstellbarer Teleskopgriff ist ebenso in der Ausstattung,den kann man in die Höhe verstellen damit
            jeder es leicht schieben oder tragen kann.</li>
          <li>Die Koffer kann man in einander stapeln,damit erspart man sich beim Verstauen enorm viel Platz.</li>
          <li>Eine Separate Netztasche im kleinen Trolley ermöglicht ein rasches verstauen von Gegenständen,ein X -
            förmiger Gurt ist ebenfalls mit dabei.</li>
          <li>Ein Weiches und sanftes Innenfutter deckt das innere der Koffer.</li>
          <li>Farbe: Schwarz,Grau,Hell blau</li>
        </ul>
        <h5 class="xl:text-lg text-base font-bold leading-10">Abmessungen</h5>
        <h6 class="xl:text-lg text-base font-medium leading-10">M Koffer</h6>
        <ul class="product_info_list xl:text-lg text-base">
          <li>Außenmaße : ca. H 55 x B 37 x T 23 cm</li>
          <li>Gewicht : ca. 2,60 kg</li>
        </ul>
        <h6 class="xl:text-lg text-base font-medium leading-10">L Koffer</h6>
        <ul class="product_info_list xl:text-lg text-base">
          <li>Außenmaße : ca. H 55 x B 37 x T 23 cm</li>
          <li>Gewicht : ca. 2,60 kg</li>
        </ul>
        <h6 class="xl:text-lg text-base font-medium leading-10">XL Koffer</h6>
        <ul class="product_info_list xl:text-lg text-base">
          <li>Außenmaße : ca. H 55 x B 37 x T 23 cm</li>
          <li>Gewicht : ca. 2,60 kg</li>
        </ul>
      </div>
    </div>
  </div>
  <footer class="footer mt-8">
    <div class="container mx-auto px-5">
      <div class="flex flex-wrap gap-x-24 gap-y-8">
        <div class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" width="34" height="31" viewBox="0 0 34 31" fill="none">
            <g id="Vector">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.199 0.734625C6.46404 0.60765 6.75454 0.5 7 0.5C7.25957 0.5 7.50247 0.608541 7.70052 0.730421C7.90767 0.857901 8.1188 1.03316 8.32645 1.23657C8.74267 1.6443 9.18696 2.20674 9.60671 2.85251C10.4435 4.13993 11.2285 5.82962 11.4932 7.4178C11.6819 8.55001 11.2156 9.44936 10.6077 10.1028C10.0083 10.7471 9.24271 11.1876 8.72359 11.4472C8.08136 11.7683 7.50682 12.8956 8.44719 14.7764L8.44882 14.7796C9.44468 16.7714 9.93861 17.7592 11.4287 20.2428C12.1978 21.5245 12.9406 21.8813 13.5737 21.9048C14.2606 21.9304 14.9833 21.5768 15.7226 21.084C17.4751 19.9156 19.7784 20.5163 20.916 22.2227C21.0078 22.3603 21.1083 22.5088 21.2148 22.6661C21.675 23.3462 22.2463 24.1903 22.7009 25.0284C22.982 25.5466 23.2296 26.0819 23.3826 26.5947C23.5336 27.101 23.6071 27.6332 23.4851 28.1213C23.389 28.5054 23.1387 28.8302 22.8345 29.0956C22.5272 29.3636 22.1338 29.5985 21.6906 29.7992C20.8036 30.2009 19.6557 30.493 18.4273 30.6223C15.9934 30.8785 13.0763 30.5097 11.1746 28.8796C9.37646 27.3384 7.1772 24.7173 5.26276 21.7127C3.34846 18.7084 1.69079 15.2767 1.01109 12.1048C0.22418 8.43254 1.40883 5.53625 2.91569 3.57078C3.66678 2.5911 4.5004 1.83832 5.21763 1.32719C5.57602 1.07179 5.91136 0.872432 6.199 0.734625ZM3.70929 4.17922C2.34115 5.96375 1.27579 8.56746 1.98889 11.8952C2.63438 14.9075 4.2267 18.2258 6.10611 21.1754C7.98538 24.1248 10.1235 26.6616 11.8254 28.1204C13.4236 29.4903 16.0066 29.8715 18.3226 29.6277C19.4693 29.507 20.5089 29.2366 21.2781 28.8883C21.663 28.714 21.965 28.527 22.1772 28.3419C22.3925 28.1541 22.486 27.9946 22.5149 27.8787C22.5748 27.6392 22.5517 27.3076 22.4243 26.8806C22.2989 26.4601 22.0863 25.9926 21.8219 25.5052C21.3933 24.715 20.8579 23.9235 20.3984 23.2443C20.2884 23.0817 20.1827 22.9255 20.084 22.7773C19.2215 21.4837 17.5248 21.0844 16.2773 21.916C15.5166 22.4232 14.563 22.9423 13.5366 22.9041C12.4565 22.864 11.4494 22.2208 10.5712 20.7572C9.06217 18.2421 8.55582 17.2297 7.55277 15.2236C6.49314 13.1044 6.9186 11.2317 8.27637 10.5528C8.75725 10.3124 9.3972 9.93583 9.87552 9.42167C10.3454 8.91659 10.6291 8.31594 10.5068 7.5822C10.2715 6.17038 9.55644 4.61007 8.76827 3.39749C8.37552 2.79326 7.97606 2.2932 7.62667 1.95093C7.4515 1.77934 7.29935 1.65772 7.17642 1.58208C7.06564 1.5139 7.00981 1.50235 7.00037 1.5004C7.0003 1.50038 7.00043 1.50041 7.00037 1.5004C6.99293 1.50148 6.96338 1.50584 6.90707 1.52356C6.83673 1.5457 6.74422 1.58226 6.63106 1.63647C6.40504 1.74476 6.11928 1.91259 5.79798 2.14156C5.15583 2.59918 4.39571 3.2839 3.70929 4.17922Z" fill="white" />
              <path fill-rule="evenodd" clip-rule="evenodd" d="M30.5 7H11V6H30.5C32.433 6 34 7.567 34 9.5V21C34 22.933 32.433 24.5 30.5 24.5H24C23.7238 24.5 23.5 24.2761 23.5 24C23.5 23.7239 23.7238 23.5 24 23.5H30.5C31.8807 23.5 33 22.3807 33 21V9.5C33 8.11929 31.8807 7 30.5 7Z" fill="white" />
              <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4849 15.2434L32.1974 7.10181L32.8025 7.89797L22.09 16.0395C20.8537 16.9791 19.1461 16.9918 17.896 16.0706L10.2034 10.4024L10.7966 9.59736L18.4892 15.2656C19.3821 15.9235 20.6018 15.9145 21.4849 15.2434Z" fill="white" />
            </g>
          </svg>
          <div class="ml-3">
            <h4 class="text-lg font-bold leading-8">Angaben zum Unternehmen</h4>
            <p class="text-sm leading-8">Unternehmensname: <span class="font-bold">Jaroslav Bogdanovic</span></p>
            <p class="text-sm leading-8">orname: <span class="font-bold">Jaroslav</span></p>
            <p class="text-sm leading-8">Nachname: <span class="font-bold">Bogdanovic</span></p>
            <p class="text-sm leading-8">Adresse: <span class="font-bold">Schubertstr. 62, 15234 Frankfurt Oder,
                Deutschland</span></p>
            <p class="text-sm leading-8">Telefonnummer: <span class="font-bold">491775055815</span></p>
            <p class="text-sm leading-8">E-Mail:
              <span class="font-bold"><a href="mailto:jbcompany24@gmail.com" class="underline">jbcompany24@gmail.com</a></span>
            </p>
            <p class="text-sm leading-8">USt-IdNr. <span class="font-bold">DE 325048750</span></p>
          </div>
        </div>
        <div>
          <p class="text-lg font-bold text-left mb-5">Zahlung</p>
          <div class="flex flex-wrap gap-2" style="max-width: 400px;">
            <img src="img/icons/Paypal.png" alt="" class="h-max">
            <img src="img/icons/visa.png" alt="" class="h-max">
            <img src="img/icons/Mastercard Full.png" alt="" class="h-max">
            <img src="img/icons/Klarna.png" alt="" class="h-max">
            <img src="img/icons/GooglePay.png" alt="" class="h-max">
            <img src="img/icons/ApplePay.png" alt="" class="h-max">
            <img src="img/icons/SEPA.png" alt="" class="h-max">
          </div>
        </div>
        <div>
          <p class="text-lg font-bold text-left mb-5">Versandpartner</p>
          <div class="flex flex-wrap gap-2" style="max-width: 270px;">
            <img src="img/icons/dhl.png" alt="" class="h-max">
            <img src="img/icons/gls-logo 1.png" alt="" class="h-max">
            <img src="img/icons/dpd.png" alt="" class="h-max">
            <img src="img/icons/UPS.png" alt="" class="h-max">
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script>
    let navbarToggle = document.querySelector('#navbar_toggle');
    document.querySelector('#navbar_menu_btn').addEventListener('click', function() {
      navbarToggle.classList.remove('hidden');
    })
    document.querySelector('#navbar_close_btn').addEventListener('click', function() {
      navbarToggle.classList.add('hidden');
    })
    document.querySelector('#navbar_toggle_backdrop').addEventListener('click', function() {
      navbarToggle.classList.add('hidden');
    })
  </script>
</body>

</html>