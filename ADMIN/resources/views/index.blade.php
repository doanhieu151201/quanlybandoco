@extends('_layoutad')
@section('content')
<!-- <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script> -->


<h1>Quản lý sản phẩm  </h1>
    
<p>
        <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
    </p>
    <table class="table table-dark table-bordered">
    <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Id loại sản phẩm</th>
                <th>Id nhà cung cấp</th>
                <th>Mô tả</th>
                <th>Gía</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Đơn vị</th>     
                <th>Đã xem</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
        <tr dir-paginate = "sp in sanphams| filter:timkiem|itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                <td>@{{ sp.name }}</td>
                <td>@{{ sp.id_lsp }}</td>
                <td>@{{ sp.id_ncc }}</td>
                <td>@{{ sp.mota_sp }}</td>
                <td>@{{ sp.unit_price }}</td>
                <td>@{{ sp.so_luong }}</td>
                <td><img src="/upload/gom/@{{sp.image}}" style='width:100px;height:100px' alt=""></td>
                <td>@{{ sp.don_vi_tinh }}</td>
                <td>@{{ sp.xem }}</td>
                <td><button class="btn btn-info" ng-click="editClick(sp.id)">Sua</button></td>
                <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)">Xóa</button></td>

            </tr>
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)" id="abuttonv"></dir-pagination-controls>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">id</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="sanpham.id">
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="sanpham.name">
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">ID LSP</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="sanpham.id_lsp">
                                    <option ng-repeat="lsp in lsps"  value="@{{lsp.id}}">@{{lsp.tenloai}}</option>
                                </select>
                            </div>
                                
                          </div>
                          <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">ID nhà cung cấp</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="sanpham.id_ncc">
                                    <option ng-repeat="ncc in nccs"  value="@{{ncc.id}}">@{{ncc.ten_ncc }}</option>
                                </select>
                            </div>
                                
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Mô tả </label>
                            <div class="col-sm-9">
                                 <textarea id="mota_sp"    class="form-control" ng-model="sanpham.mota_sp">
                        	
                                </textarea>

                           
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Gía</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="sanpham.unit_price">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Số lượng</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="sanpham.so_luong">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="name">Ảnh:</label>
                            <div>
                                <input type="file" class="form-control" id="file-upload" ng-model="sanpham.image">
                            </div>
                            </br>
                            <div style="width:100px;height:100px" id="Anh">
                                <img src="/upload/gom/@{{sanpham.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="sanpham.image">
                            
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Đã xem</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="sanpham.xem">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Đơn vị tính</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="sanpham.don_vi_tinh">
                            </div>
                          </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="updateData()">Save</button>
                </div>

            </div>
        </div>
    </div>


<!-- 
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
        </script> --><script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
        
            <script>
                        CKEDITOR.replace( 'mota_sp' );
                </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/angular.min.js"></script>
   <script src="/js/sanphamcontroller.js"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>




@stop


