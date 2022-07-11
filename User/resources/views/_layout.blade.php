<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Website bán đồ cổ</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../use/css/bootstrap.css" />
  <link rel="stylesheet" href="../use/vendors/linericon/style.css" />
  <link rel="stylesheet" href="../use/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../use/css/themify-icons.css" />
  <link rel="stylesheet" href="../use/css/flaticon.css" />
  <link rel="stylesheet" href="../use/vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="../use/vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="../use/vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="../use/vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="../use/vendors/jquery-ui/jquery-ui.css" />
  <!-- main css -->
  <link rel="stylesheet" href="../use/css/style.css" />
  <link rel="stylesheet" href="../use/css/responsive.css" />


  <style>
   #abuttonv a {
      background-color: #fff;
      border: 1px solid #ddd;
      box-sizing: border-box;
      color: blue;
      cursor: pointer;
      display: inline-block;
      font-family: din-round,sans-serif;
      font-size: 15px;
      font-weight: 700;
      padding: 10px 12px;
      text-align: center;
      width: 100%;
    }
    </style>
</head>

<body ng-app="myapp" ng-controller="mycontroller">
  <!--================Header Menu Area =================-->
  <header class="header_area">

  @include('hf.header')
  @include('hf.menu')
</header>

  <!--================Header Menu Area =================-->


@yield('content')


<!-- f="../use -->
  <!--================ End Inspired Product Area =================-->

 
<script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

  <script src="../use/js/jquery-3.2.1.min.js"></script>
  <script src="../use/js/popper.js"></script>
  <script src="../use/js/bootstrap.min.js"></script>
  <script src="../use/js/stellar.js"></script>
  <script src="../use/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="../use/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="../use/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="../use/vendors/isotope/isotope-min.js"></script>
  <script src="../use/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="../use/js/jquery.ajaxchimp.min.js"></script>
  <script src="../use/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="../use/vendors/counter-up/jquery.counterup.js"></script>
  <script src="../use/js/mail-script.js"></script>
  <script src="../use/js/theme.js"></script>
                     


</body>

</html>