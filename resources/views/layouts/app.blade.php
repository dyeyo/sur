<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/logo.png">
  <!-- Author Meta -->
  <meta name="author" content="CodePixar">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Site Title -->
  <title>Karma Shop</title>
  <!--
		CSS
		============================================= -->
  <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <style>
    .colored-toast.swal2-icon-success {
      background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
      background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
      background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
      background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
      background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
      color: white;
    }

    .colored-toast .swal2-close {
      color: white;
    }

    .colored-toast .swal2-html-container {
      color: white;
    }

    .inputCar {
      font-size: 15px;
      background: #fff;
      border: none;
    }

    @import "compass/css3";

    /*
I wanted to go with a mobile first approach, but it actually lead to more verbose CSS in this case, so I've gone web first. Can't always force things...

Side note: I know that this style of nesting in SASS doesn't result in the most performance efficient CSS code... but on the OCD/organizational side, I like it. So for CodePen purposes, CSS selector performance be damned.
*/

    /* Global settings */
    $color-border: #eee;
    $color-label: #aaa;
    $font-default: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    $font-bold: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';


    /* Global "table" column settings */
    .product-image {
      float: left;
      width: 20%;
    }

    .product-details {
      float: left;
      width: 37%;
    }

    .product-price {
      float: left;
      width: 12%;
    }

    .product-quantity {
      float: left;
      width: 10%;
    }

    .product-removal {
      float: left;
      width: 9%;
    }

    .product-line-price {
      float: left;
      width: 12%;
      text-align: right;
    }


    /* This is used as the traditional .clearfix class */
    .group:before,
    .group:after {
      content: '';
      display: table;
    }

    .group:after {
      clear: both;
    }

    .group {
      zoom: 1;
    }


    /* Apply clearfix in a few places */
    .shopping-cart,
    .column-labels,
    .product,
    .totals-item {
      @extend .group;
    }


    /* Apply dollar signs */
    .product .product-price:before,
    .product .product-line-price:before,
    .totals-value:before {
      content: '$';
    }


    /* Body/Header stuff */
    body {
      padding: 0px 30px 30px 20px;
      font-family: $font-default;
      font-weight: 100;
    }

    h1 {
      font-weight: 100;
    }

    label {
      color: $color-label;
    }

    .shopping-cart {
      margin-top: -45px;
    }


    /* Column headers */
    .column-labels {
      label {
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid $color-border;
      }

      .product-image,
      .product-details,
      .product-removal {
        text-indent: -9999px;
      }
    }


    /* Product entries */
    .product {
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid $color-border;

      .product-image {
        text-align: center;

        img {
          width: 100px;
        }
      }

      .product-details {
        .product-title {
          margin-right: 20px;
          font-family: $font-bold;
        }

        .product-description {
          margin: 5px 20px 5px 0;
          line-height: 1.4em;
        }
      }

      .product-quantity {
        input {
          width: 40px;

        }
      }

      .remove-product {
        border: 0;
        padding: 4px 8px;
        background-color: #c66;
        color: #fff;
        font-family: $font-bold;
        font-size: 12px;
        border-radius: 3px;
      }

      .remove-product:hover {
        background-color: #a44;
      }
    }


    /* Totals section */
    .totals {
      .totals-item {
        float: right;
        clear: both;
        width: 100%;
        margin-bottom: 10px;

        label {
          float: left;
          clear: both;
          width: 79%;
          text-align: right;
        }

        .totals-value {
          float: right;
          width: 21%;
          text-align: right;
        }
      }

      .totals-item-total {
        font-family: $font-bold;
      }
    }

    .checkout {
      float: right;
      border: 0;
      margin-top: 20px;
      padding: 6px 25px;
      background-color: #6b6;
      color: #fff;
      font-size: 25px;
      border-radius: 3px;
    }

    .checkout:hover {
      background-color: #494;
    }

    /* Make adjustments for tablet */
    @media screen and (max-width: 650px) {

      .shopping-cart {
        margin: 0;
        padding-top: 20px;
        border-top: 1px solid $color-border;
      }

      .column-labels {
        display: none;
      }

      .product-image {
        float: right;
        width: auto;

        img {
          margin: 0 0 10px 10px;
        }
      }

      .product-details {
        float: none;
        margin-bottom: 10px;
        width: auto;
      }

      .product-price {
        clear: both;
        width: 70px;
      }

      .product-quantity {
        width: 100px;

        input {
          margin-left: 20px;
        }
      }

      .product-quantity:before {
        content: 'x';
      }

      .product-removal {
        width: auto;
      }

      .product-line-price {
        float: right;
        width: 70px;
      }

    }


    /* Make more adjustments for phone */
    @media screen and (max-width: 350px) {

      .product-removal {
        float: right;
      }

      .product-line-price {
        float: right;
        clear: left;
        width: auto;
        margin-top: 10px;
      }

      .product .product-line-price:before {
        content: 'Item Total: $';
      }

      .totals {
        .totals-item {
          label {
            width: 60%;
          }

          .totals-value {
            width: 40%;
          }
        }
      }
    }
  </style>
</head>

<body>
  @include('layouts.header')
  <main class="py-4">
    @yield('content')
  </main>
  @include('layouts.footer')
  <script src="{{ asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('js/nouislider.min.js') }}"></script>
  <script src="{{ asset('js/countdown.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="{{ asset('js/gmaps.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>