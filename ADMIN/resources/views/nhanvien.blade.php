@extends('_layoutad')
@section('content')
<h1>Quản lý nhân viên  </h1>

    <p>
        <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
    </p>
    <table class="table table-dark table-bordered" >
        <thead>
            <tr>
                <th>TT</th>
                <th>id</th>
                <th>Họ tên</th>
                <th>giới tính</th>
                <th>Ngày sinh</th>
                <th>Quê quán</th>
                <th>Số điện thoại</th>
                <th>Email/th>
                <th>Cấp bậc</th>

                <th>Edit</th>
                <th>Xoa</th>
            </tr>
        </thead>
        <tbody >
        <tr dir-paginate = "sp in nhanviens| filter:timkiem|itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                <td>@{{ sp.id }}</td>
                <td>@{{ sp.ten_nhanvien }}</td>
                <td>@{{ sp.gioitinh }}</td>
                <td>@{{ sp.ngaysinh }}</td>
                <td>@{{ sp.quequan }}</td>
                <td>@{{ sp.sdt}}</td>

                <td>@{{ sp.email}}</td>
                <td>@{{ sp.capbac}}</td>

                <td><button class="btn btn-info" ng-click="editClick(sp.id)">Sua</button></td>
                <td><button class="btn btn-danger" ng-click="deleteClickk(sp.id)">xoa</button></td>
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
                            <label for="name" class="col-sm-3 col-form-label">id</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="nhanvien.id">
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="nhanvien.ten_nhanvien">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">giới tính</label>
                            <select ng-model="nhanvien.gioitinh" class="form-control">
                                     b4-p
                                    <option value="Nam">Nam</option>
                                    <option value="Nu">Nu</option>
                                </select>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ngày sinh</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="name" ng-model="nhanvien.ngaysinh">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="nhanvien.email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Quê quán</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="nhanvien.quequan">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Số điện thoại</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="nhanvien.sdt">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Cấp bậc</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="nhanvien.capbac">
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
   <script src="/js/nhanvien.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

@stop