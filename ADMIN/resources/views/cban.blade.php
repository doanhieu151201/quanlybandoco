@extends('_layoutad')
@section('content')
<h1>Quản lý  chi tiết hóa đơn bán </h1>

<!-- <p>
        <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
    </p> -->
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>id</th>
                <th>id hóa đơn bán</th>
                <th>sản phẩm</th>
                <th>Số lượng</th>
            
                <!-- <th>Sua</th> -->
                <th>Xoa</th>
            </tr>
        </thead>
        <tbody>
        <tr dir-paginate = "sp in cbillbans| filter:timkiem|itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                <td>@{{ sp.id }}</td>
                <td>@{{ sp.id_bill_ban }}</td>
                <td>@{{ sp.sp}}</td>
                <td>@{{ sp.sl }}</td>
           

                <!-- <td><button class="btn btn-danger" ng-click="deleteClickk(sp.id)">xoa</button></td> -->
                <td><button class="btn btn-danger" ng-click="show(sp.id)"><i class="fa fa-eye">xem</button></td>

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
                            <label for="name" class="col-sm-3 col-form-label">ID</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="name" ng-model="cbillban.id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">ID bill bán</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="name" ng-model="cbillban.id_bill_ban">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">sản phẩm</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="name" ng-model="cbillban.sp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Số lượng</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="name" ng-model="cbillban.sl">
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


    <div class="modal fade" id="detail_bill" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CHI TIẾT HÓA ĐƠN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                 <h2>KHÁCH HÀNG</h2>
                 <table class="table table-striped table-bordered table-hover" >
                     <thead>
                         <tr>
                             <th>Tên khách hàng</th>
                             <th>Số điện thoại</th>
                             <th>Địa chỉ</th>
                             <th>Email</th>
                         </tr>
                     </thead">
                     <tbody   ng-if="cbanss.id_kh==item.id" ng-repeat= "item in khachs">
                         <tr>
                             <td>@{{item.ten_kh}}</td>
                             <td>@{{item.sdt}}</td>
                             <td>@{{item.dia_chi}}</td>
                             <td>@{{item.email}}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                     </tbody>
                 </table>
                 <h2>ĐƠN HÀNG</h2>
                 <table class="table table-striped table-bordered table-hover"  >
                     <thead>
                         <tr>
                             <th>Tên sản phẩm</th>
                             <th>Số lượng</th>
                             <th>Tổng tiền</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td >@{{cbanss.sp}}</td>
                             <td>@{{cbanss.sl}}</td>
                             <td>@{{cbanss.tong}}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                     </tbody>
                 </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/cban.js">

    </script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



@stop


