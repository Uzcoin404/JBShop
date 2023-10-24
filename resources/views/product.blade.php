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
  <div id="productPrintArea" class="flex lg:flex-nowrap flex-wrap xl:gap-x-12 lg:gap-x-6 mt-16">
    <div class="product_section">
      <h1 class="hero_title max-w-none mb-10">
        {{ $product->title }}
      </h1>
      <div class="grid grid-cols-3 gap-y-5 gap-x-4">
        @foreach ($photos as $image)
          <img src="{{ asset('storage/') . '/' . $image }}" alt=""
            class="product_image{{ $loop->first ? ' col-span-3' : '' }}">
        @endforeach
      </div>
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
      {{-- <table class="product_details_table mt-5 mb-10">
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
        </ul> --}}
    </div>
  </div>
@endsection