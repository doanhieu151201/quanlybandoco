@extends('_layout')
@section('content')

<div class="product_image_area" ng-repeat="sanpham in sanpham">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-6">
            <div class="s_product_img">
              <div
                
              >
               
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      class="d-block w-100"
                      src="/upload/gom/@{{sanpham.image}}"

                      
                    />
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <a href="#"></a><h3>@{{sanpham.name}}</h3>
              <h2>Giá: @{{sanpham.unit_price|number:'0'}}</h2>
              
              <p>
               @{{sanpham.mota_sp}}
              </p>
            
           
              <div class="card_area">
                <a class="main_btn" ng-click="addToCart(sanpham)">Add to Cart</a>
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-diamond"></i>
                </a>
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-heart"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


       


     


  
    








   
    <!--================End Single Product Area =================-->



    <!--================Product Description Area =================-->
   
         
    <script src="/js/angular.min.js"></script>
                  
    <script src="/js/single_sp.js"></script>
   
    @stop
