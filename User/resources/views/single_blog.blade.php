@extends('_layout')
@section('content')
<section class="banner_area" >
      <div class="banner_inner d-flex align-items-center" >
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Blog Details</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="blog.html">Blog </a>
              <a href="single-blog.html">Blog Details</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
	<section class="blog_area single-post-area section_gap">
			<div class="container">
					<div class="row">
							<div class="col-lg-12 posts-list">
									<div class="single-post " ng-repeat="tintuc in tintuc"> 
													<div class="feature-img">
															<img class="img-fluid"   src="/upload/tintuc/@{{tintuc.image}}"alt="">
													</div>
											<div class="blog_details">
													<h2></h2>
                          <ul class="blog-info-link mt-3 mb-4">
                              <li><a href="#"><i class="ti-user"></i> Travel, Lifestyle</a></li>
                              <li><a href="#"><i class="ti-comments"></i> 03 Comments</a></li>
                            </ul>
													<p class="excert">
                          @{{tintuc.content}}
													</p>
													
											</div>
                  </div>
                  <div class="navigation-top">
                   

                   
                  </div>
                  
                  
                  <div class="blog-author">
                    <div class="media align-items-center">
                      <div class="media-body">
                      </div>
                    </div>
                  </div>

									<div class="comments-area">
											<h4></h4>
											<div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                          <div class="user justify-content-between d-flex">
                             
                          </div>
                      </div>
											</div>
											<div class="comment-list">
                          <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                  
                              </div>
                          </div>
											</div>
											<div class="comment-list">
                          <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                  
                              </div>
                          </div>
											</div>
									</div>
									
							</div>
						

                   

                     


                    
                  </div>
							</div>
					</div>
			</div>
	</section>
	<!--================Blog Area =================-->
  <!--================ start footer Area  =================-->
      <script src="/js/angular.min.js"></script>

    <script src="/js/detailblog.js"></script>

      @stop