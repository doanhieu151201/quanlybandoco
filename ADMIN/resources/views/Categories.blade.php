@extends('_layoutad')
@section('content')

<h1>Quản lý danh mục </h1>
<div>
<p>
  <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
 </p>
 <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>TT</th>
                <th>id</th>
                <th>Tên loại</th>
                <th>Ảnh</th>
              
                <th>Edit</th>
                <th>Xoa</th>
            </tr>
        </thead>
        <tbody>
        <tr dir-paginate = "sp in lsps| filter:timkiem|itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                <td>@{{sp.id }}</td>
                <td>@{{ sp.tenloai }}</td>
                <td><img src="../upload/danhmuc/@{{sp.image}}" style='width:100px;height:100px' alt=""></td>



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
                            <label for="name" class="col-sm-3 col-form-label">ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="LSP.id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="LSP.tenloai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name">Ảnh:</label>
                            <div>
                                <input type="file" class="form-control" id="file-upload" ng-model="LSP.image">
                            </div>
                            </br>
                            <div style="width:100px;height:100px" id="Anh">
                                <img src="/upload/danhmuc/@{{lsp.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="lsp.image">
                            
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
</div>
<!-- <script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script> -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="/js/Cate.js">

</script>
<script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

@stop