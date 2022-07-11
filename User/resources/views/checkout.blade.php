@extends('_layout')
@section('content')
<section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Product Checkout</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="checkout.html">Product Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="#" class="billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" class="form-control" placeholder="" id="name_kh"  ng-model="khach.ten_kh">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Địa chỉ</label>
	                  <input type="text" class="form-control"  ng-model="khach.dia_chi" >
	                </div>
		            </div>
		           
		            <div class="w-100"></div>
		            
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress"> Gmail</label>
	                  <input type="text" class="form-control" placeholder="" ng-model="khach.email">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress"> Sdt</label>
	                  <input type="text" class="form-control" placeholder="" ng-model="khach.sdt">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">

										</div>
									</div>
                </div>
	            </div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
						  <table class="table table-responsive">
                              <thead>
                                  <tr>
                                      <th>Tên </th>
                                      <th>Số lượng</th>
                                      <th>Tổng giá</th>
                                  </tr>
                              </thead>
                              <tbody ng-repeat="item in listSP">
                                  <tr>
                                      <td scope="row">@{{item.name}}</td>
                                      <td>@{{item.so_luong}}</td>
                                      <td>@{{item.unit_price*item.so_luong|number}}$</td>
                                  </tr>
                                  <tr>
                                      <td scope="row"></td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                              </table>
                              <span>Tổng tiền: </span>
		    						              <span>@{{total|number}}$</span>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			
									<div class="form-group">	
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="" ng-click="updateCustomer();updateData();detail_bill()" class="btn btn-primary py-3 px-4">Đặt hàng</a></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section>
    <script src="/js/angular.min.js"></script>
    <script src="js/cart.js"></script>
    @stop