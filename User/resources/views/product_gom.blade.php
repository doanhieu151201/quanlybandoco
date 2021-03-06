@extends('_layout')
@section('content')
<link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
<section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Shop Category</h2>
              <p>Very us move be blessed multiply night</p>
              <input type="text" ng-model="timkiem" class="form-control" placeholder="Search now" aria-label="search"id="btnNavbarSearch" aria-describedby="search">

            </div>
       
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          
          <div class="col-lg-9">
            <div class="latest_product_inner">
              <div class="row">
                <div class="col-lg-4 col-md-6" ng-repeat="sp in sanphams|filter:'Gốm'| filter:timkiem ">
                <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100"  src="/upload/gom/@{{sp.image}}" style="width:200px;height:200px">
                  
                  <div class="p_icon"style="width:100%">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4> <b>@{{sp.name}}</b></h4>
                  </a>
                  <div class="mt-3">
                   <span>Giá: <a >@{{sp.unit_price|number:'0'}}</a>VNĐ</span>
                    
                  </div>
                </div>
              </div>
                </div>
                </div>
                  </div>
                </div>

          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                <a href="/categori"><h3>Danh mục sản phẩm</h3></a> 

                </div>
                <div class="widgets_inner">
                <ul class="list">
                    <li>
                      <a href="/gom">Gốm</a>
                    </li>
                    <li>
                    <a href="/hoathach">Hóa thạch</a>
                    </li>
                    <li>
                    <a href="/tranh">Tranh cổ</a>
                    </li>
                    <li>
                    <a href="/tien">Tiền cổ</a>

                    </li>
                    
                  </ul>
                </div>
              </aside>

            </div>
          </div>
        </div>
      </div>
      
    </section>
    
    <!--================End Category Product Area =================-->

    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
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
  </footer>

    <script src="js/angular.min.js"></script>
    <script src="js/sanpham.js"></script>
    @stop