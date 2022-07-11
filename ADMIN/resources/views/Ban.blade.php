@extends('_layoutad')
@section('content')
<h1>Quản lý hóa đơn bán </h1>

<p>
        <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
    </p>
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>id</th>
                <th>id khách hàng</th>
                <th>Tên khách hàng</th>
              


                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Payment</th>
               
                <th>Note</th>
              
                <th>Sua</th>
                <th>Xoa</th>
            </tr>
        </thead>
        <tbody>
        <tr dir-paginate = "sp in billbans| filter:timkiem|itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                <td>@{{ sp.id }}</td>
                <td>@{{ sp.id_kh }}</td>
                <td>@{{ sp.name_kh }}</td>
                



                <td>@{{ sp.date_order }}</td>
                <td>@{{ sp.tong_tien }}</td>
                <td>@{{ sp.payment }}</td>
                <td>@{{ sp.note }}</td>

                <td><button class="btn btn-info" ng-click="editClick(sp.id)">Sua</button></td>
                <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)">xoa</button></td>
            </tr>
        </tbody>
    </table>
    <!-- Button trigger amodal -->
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
                            <label for="name" class="col-sm-3 col-form-label">id </label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="name" ng-model="billban.id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">ID khách hàng</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="billban.id_kh">
                                    <option ng-repeat="kh in khachhangs"  value="@{{kh.id}}">@{{kh.id }}</option>
                                </select>
                            </div>
                                
                          </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Tên khách hàng</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="billban.name_kh">
                                    <option ng-repeat="kh in khachhangs"  value="@{{kh.ten_kh}}">@{{kh.ten_kh }}</option>
                                </select>
                            </div>
                        </div>
                       


                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ngày đặt</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="name" ng-model="billban.date_order">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Tổng tiền</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="billban.tong_tien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="billban.payment">
                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Note</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="billban.note">
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
    <script src="/js/ban.js">

    </script>

@stop


