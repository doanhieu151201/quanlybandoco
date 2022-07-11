<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ADMIN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="Ad/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="Ad/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="Ad/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="Ad/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="Ad/images/favicon.png" />
  <script src="js/angular.min.js"></script>

  
<style>
    #abuttonv{
      float:right;
    }
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
      #abuttonv li.active > a:not(.page-link),
      #abuttonv li.active > a:not(.page-link):hover,
      #abuttonv li.active > a:not(.page-link):focus {
      border-color: #696cff;
      background-color: #696cff;
      color: #fff;
      box-shadow: 0 0.125rem 0.25rem rgba(105, 108, 255, 0.4);
    }
    /* #abuttonv a:first-child{
      border-top-left-radius: 25px;
      border-bottom-left-radius: 25px;
    }
    #abuttonv a:last-child{
      border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
    } */
    </style>
  
</head>
<body>
  <div class="container-scroller" ng-app="myapp" ng-controller="mycontroller">>
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
              <a href="https://www.bootstrapdash.com/product/majestic-admin-pro/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/majestic-admin-pro/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
      @include('includes.header')
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('includes.sidebar')
      
      <!-- partial -->
      <div class="main-panel">
    
          
          @yield('content')
          @yield('acc')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('includes.footer')
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="Ad/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="Ad/vendors/chart.js/Chart.min.js"></script>
  <script src="Ad/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="Ad/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="Ad/js/off-canvas.js"></script>
  <script src="Ad/js/hoverable-collapse.js"></script>
  <script src="Ad/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="Ad/js/dashboard.js"></script>
  <script src="Ad/js/data-table.js"></script>
  <script src="Ad/js/jquery.dataTables.js"></script>
  <script src="Ad/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="Ad/js/jquery.cookie.js" type="text/javascript"></script>
  
</body>

</html>

