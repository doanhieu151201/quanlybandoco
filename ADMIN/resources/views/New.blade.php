@extends('_layoutad')
@section('content')


<h1>Quản lý bảng tin  </h1>



    <p>
        <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
    </p>
    <table class="table table-dark table-bordered" >
        <thead>
            <tr>
                <th>STT</th>
                <th>id</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Anh</th>
              
               
               
                <th>Sua</th>
                <th>Xoa</th>
            
            </tr>
        </thead>
        <tbody>
        <tr dir-paginate = "sp in news| filter:timkiem|itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                <td>@{{ sp.id}}</td>
                <td>@{{ sp.title }}</td>
                <td>@{{ sp.content}}</td>
                <td><img src="/upload/tintuc/@{{sp.image}}" style='width:100px;height:100px' alt=""></td>

           
                <td><button class="btn btn-info" ng-click="editClick(sp.id)">Sua</button></td>
                <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)">xoa</button></td>
            </tr>
        </tbody>
    </table>
    <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"id="abuttonv"></dir-pagination-controls>

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

                                <input type="text" class="form-control" id="name" ng-model="new.id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Tiêu đề</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="name" ng-model="new.title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Nội dung</label>
                            <div class="col-sm-9">
                            <textarea id="content"  class="form-control" ng-model="new.content">
                        	
                            </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name">Ảnh:</label>
                            <div>
                                <input type="file" class="form-control" id="file-upload" ng-model="new.image">
                            </div>
                            </br>
                            <div style="width:100px;height:100px" id="Anh">
                                <img src="/upload/tintuc/@{{new.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="new.image">
                            
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
        });
    </script>

<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
        
        <script>
                    CKEDITOR.replace( 'content' );
            </script>

    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/new1.js">

    </script>

@stop


