@extends('_layout')
@section('content')
<section class="blog_area section_gap">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="blog_left_sidebar">
                      <article class="blog_item" dir-paginate="new in tintucs| itemsPerPage: pageSize| filter:timkiem " current-page="currentPage">
                        <div class="blog_item_img">
                          <img class="card-img rounded-0" src="upload/tintuc/@{{new.image}}" >
                          
                        </div>
                        
                        <div class="blog_details"> 
                            <a class="d-inline-block" href="/sblog/id?=@{{new.id}}">
                                <h2>@{{new.title}}</h2>
                            </a>
                            <ul class="blog-info-link">
                              <li><a href="#"><i class="ti-user"></i> Travel, Lifestyle</a></li>
                              <li><a href="#"><i class="ti-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                      </article>
                      <dir-pagination-controls max-size='5'id="abuttonv" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
                      <!-- <nav class="blog-pagination justify-content-center d-flex">
                          <ul class="pagination">
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Previous">
                                      <span aria-hidden="true">
                                          <span class="ti-arrow-left"></span>
                                      </span>
                                  </a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link">1</a>
                              </li>
                              <li class="page-item active">
                                  <a href="#" class="page-link">2</a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Next">
                                      <span aria-hidden="true">
                                          <span class="ti-arrow-right"></span>
                                      </span>
                                  </a>
                              </li>
                          </ul>
                      </nav> -->
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                      <!-- <aside class="single_sidebar_widget search_widget">
                          <form action="#">
                            <div class="form-group">
                              <div class="input-group mb-3">
                              <input type="text" ng-model="timkiem" class="form-control" placeholder="Search now" aria-label="search"id="btnNavbarSearch" aria-describedby="search">

                                <div class="input-group-append">
                                  <button class="btn" type="button"><i class="ti-search"></i></button>
                                </div>
                              </div>
                            </div>
                            <button class="main_btn rounded-0 w-100" type="submit"></button>
                          </form>
                      </aside> -->
                      <h3 class="widget_title">Tin tức nối bật</h3>

                      <aside class="single_sidebar_widget popular_post_widget"ng-repeat="new in tintucs|limitTo:7|orderBy:'-created_at'| filter:timkiem ">
                          <h3 class="widget_title"></h3>
                          <div class="media post_item">
                              <img src="upload/tintuc/@{{new.image}}" alt="post" style="width:100px">
                              <div class="media-body">
                                  <a href="/sblog/id?=@{{new.id_new}}">
                                      <h3>@{{new.title}}</h3>
                                  </a>
                                  <p>@{{new.created_at}}</p>
                              </div>
                          </div>
                        
                      </aside>
                      
                  </div>
              </div>
          </div>
      </div>
  </section>
  <script src="js/angular.min.js"></script>

    <script src="js/blog.js"></script>
  @stop