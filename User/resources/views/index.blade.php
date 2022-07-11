@extends('_layout')
@section('content')
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!-- Start feature Area -->
  
  <!-- End feature Area -->

  <!--================ Feature Product Area =================-->
  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Danh mục sản phẩm</span></h2>
        <a href="/categori">Nhấn vào đây để xem thêm</a>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6"ng-repeat="sp in loaisps| limitTo:3">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/danhmuc/@{{sp.image}}" style="width:200px;height:200px" />
              <div class="p_icon"style="width:100%">
                
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4><a>ID: </a>@{{sp.id}}</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4"><a>Tên danh mục: </a>@{{sp.tenloai}}</span>
              </div>
            </div>
          </div>

        </div>
       
  </section>
  
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->

 
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  <section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Sản phẩm mới</span></h2>
        <a href="/categori">Nhấn vào đây để xem thêm</a>
          </div>
        </div>
      </div>
     

       
          <div class="row">
            <div class="col-lg-3 col-md-6" ng-repeat="sp in sanphams| limitTo :8| orderBy:'-created_at' ">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100"  src="/upload/gom/@{{sp.image}}" style="width:180px;height:180px">
                 
                  <div class="p_icon"style="width:100%">
                    <a href="/ssp/id?=@{{sp.id}}">
                      <i class="ti-eye" ></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart" ng-click="addToCart(sp)"></i>

                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>@{{sp.name}}</h4>
                  </a>
                  <div class="mt-3">
                   <span>Giá: <a >@{{sp.unit_price|number}}</a>$</span>
                    
                  </div>
                </div>
              </div>
           


  
                      
           
  </section>
  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
 

     
        <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Sản phẩm được quan tâm</span></h2>
       

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6"ng-repeat="sp in sanphams|orderBy:'-xem'| limitTo:8">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/gom/@{{sp.image}}"style="width:180px;height:180px" />
              <div class="p_icon" style="width:100%">
                <a href="/ssp/id?=@{{sp.id}}">
                  <i class="ti-eye"></i>
                </a>
             
                <a href="#">
                  <i class="ti-shopping-cart" ng-click="addToCart(sp)"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
              <span class="mr-4"><a>Tên sản phẩm: </a>@{{sp.name}}</span>
              </a>
              <div class="mt-3">
                <span class="mr-4"><a>Lượt xem: </a>@{{sp.xem|number:'0'}}</span>
              </div>
            </div>
          </div>

        </div>
       
  </section>
  <!--================ End Inspired Product Area =================-->
  <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Money back gurantee</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>Free Delivery</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>Alway support</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Secure payment</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-area section-gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>latest blog</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6"ng-repeat="new in tintucs|limitTo:3">
          <div class="single-blog" >
            <div class="thumb">
              <img class="img-fluid"  src="upload/tintuc/@{{new.image}}"style="width:400px;height:250px"/> 
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                <a href="#">By Admin</a>
                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
              </div>
              <a class="d-block" href="/sblog/id?=@{{new.id}}">
                <h4>@{{new.title}}</h4>
              </a>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>
        
       
      </div>
    </div>
  </section>

  <!-- <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default">Subscribe</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
       </p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer> -->
  <!--================ Start Blog Area =================-->
    <script src="/js/angular.min.js"></script>
    <script src="/js/sanpham.js"></script>
@stop