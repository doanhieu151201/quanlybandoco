@extends('_layoutad')
@section('content')
<h1>Quản lý hóa đơn nhập</h1>
    <p>
        <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
    </p>
    <table class="table table-dark table-bordered" >
        <thead>
            <tr>
                <th>STT</th>

                <th>id</th>
                <th>id Nhà cung cấp</th>
                <th>id nhân viên</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>

                <th>Thanh toán</th>


                <th>Ghi chú</th>
               
                <th>Sua</th>
                <th>Xoa</th>
            </tr>
        </thead>
        <tbody>
        <tr dir-paginate = "sp in billnhaps| filter:timkiem|itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
               
                <td>@{{ sp.id }}</td> 
                <td>@{{ sp.id_ncc }}</td> 
                <td>@{{ sp.id_nhanvien}}</td>
                <td>@{{ sp.date_order }}</td>
                <td>@{{ sp.tong_tien}}</td>
                <td>@{{ sp.thanh_toan}}</td>
                <td>@{{ sp.note}}</td>

              
                <td><button class="btn btn-info" ng-click="editClick(sp.id)">Sua</button></td>
                <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)">xoa</button></td>
            </tr>
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"id="abuttonv"></dir-pagination-controls>


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
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">ID nhà cung cấp</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="billnhap.id_ncc">
                                    <option ng-repeat="ncc in nccs"  value="@{{ncc.id}}">@{{ncc.id}}</option>
                                </select>
                            </div>
                                
                          </div>
                          <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">ID nhân viên</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="billnhap.id_nhanvien">
                                    <option ng-repeat="nv in nhanviens"  value="@{{nv.id}}">@{{nv.id}}</option>
                                </select>
                            </div>
                                
                          </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ngày đặt</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="name" ng-model="billnhap.date_order">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Tổng tiền</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="billnhap.tong_tien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Thanh toán</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="billnhap.thanh_toan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Note</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="billnhap.note">
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


    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/nhap.js">

    </script>


@stop


