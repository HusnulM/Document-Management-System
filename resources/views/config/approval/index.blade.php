@extends('layouts/App')

@section('title', 'Workflow Document Approval')

@section('additional-css')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- <h4 class="mt-5 ">Custom Content Above</h4> -->
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Workflow Group</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Workflow Group Assignment</a>
                </li>
            </ul>
            <!-- <div class="tab-custom-content">
                <p class="lead mb-0">Custom Content goes here</p>
            </div> -->
            <div class="tab-content" id="custom-content-above-tabContent">
                <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm btn-add-user">
                                        <i class="fas fa-plus"></i> Add Workflow Group
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tbl-menu" class="table table-bordered table-hover table-striped table-sm" style="width:100%;">
                                    <thead>
                                        <th>No</th>
                                        <th>Workflow Group</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach($groups as $key => $row)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $row->workflow_group }}</td>
                                            <td style="text-align:center;">
                                                <a href="{{ url('config/workflow/deletegroup/') }}/{{$row->id}}" class='btn btn-danger btn-sm button-delete'> <i class='fa fa-trash'></i> DELETE</a> 
                                                <button class='btn btn-primary btn-sm btn-edit-menu' data-menuid="{{$row->id}}" data-workflow_group="{{$row->workflow_group}}"> <i class='fa fa-edit'></i> EDIT</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm btn-add-menu">
                                        <i class="fas fa-plus"></i> Add Menu Group
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tbl-menu-group" class="table table-bordered table-hover table-striped table-sm" style="width:100%;">
                                    <thead>
                                        <th>No</th>
                                        <th>Menu Group</th>
                                        <th>Sort Index</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>                                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-modal')
<div class="modal fade" id="modal-add-user">
    <form action="{{ url('config/workflow/savegroup') }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Workflow Group</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-hover table-striped table-sm" style="width:100%;">
                            <thead>
                                <th>Workflow Group</th>
                                <th style="width:50px; text-align:center;">
                                    <button type="button" class="btn btn-success btn-sm btn-add-new-menu">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </th>
                            </thead>
                            <tbody id="tbl-new-menu-body">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="1"></td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tfoot>
                        </table>  
                    </div> 
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modal-edit-menu">
    <form action="{{ url('config/menus/updatemenu') }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Application Menu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <label for="menuname">Name</label>
                        <input type="text" name="menuname" id="menuname" class="form-control" required>
                        <input type="hidden" name="menuid" id="menuid" class="form-control" required>
                    </div> 
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modal-add-menu">
    <div class="modal-dialog modal-lg">
        <form action="{{ url('config/menus/savegroup') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Add Menu Group</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="groupname">Menu Group Name</label>
                                <input type="text" name="groupname" class="form-control">
                            </div>
                        </div> 
                        <div class="col-lg-8 col-md-12">
                            <div class="form-group">
                                <label for="groupicon">Menu Group Icon</label>
                                <input type="text" name="groupicon" class="form-control">
                            </div>
                        </div> 
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label for="displayidx">Menu Group Display Index</label>
                                <input type="number" name="displayidx" class="form-control">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-edit-group">
    <form action="{{ url('config/menus/updategroup') }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Menu Group</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <label for="egroupname">Group Name</label>
                        <input type="text" name="egroupname" id="egroupname" class="form-control" required>
                        <input type="hidden" name="egroupid" id="egroupid" class="form-control" required>
                    </div> 
                    <div class="col-lg-6 col-md-12">
                        <label for="egroupidx">Group Index</label>
                        <input type="number" name="egroupidx" id="egroupidx" class="form-control" required>
                    </div> 
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
    </form>
</div>
@endsection

@section('additional-js')
<script>
    $(document).ready(function(){
        //loadRoleUsers();
        //loadRoleMenus();
        $('#tbl-menu, #tbl-menu-group').DataTable();

        $('.btn-add-user').on('click', function(e){
            $('#modal-add-user').modal('show');
        });

        $('.btn-add-menu').on('click', function(e){
            $('#modal-add-menu').modal('show');
        });

        $('.btn-edit-menu').on('click', function(e){
            var _mndata = $(this).data();
            console.log(_mndata)
            $('#menuname').val(_mndata.menuname);
            $('#menuid').val(_mndata.menuid);
            $('#menuroute').val(_mndata.menuroute);
            $('#modal-edit-menu').modal('show');
        });

        $('.btn-edit-group').on('click', function(e){
            var _grpdata = $(this).data();
            console.log(_grpdata)
            $('#egroupname').val(_grpdata.groupname);
            $('#egroupid').val(_grpdata.groupid);
            $('#egroupidx').val(_grpdata.index);
            $('#modal-edit-group').modal('show');
        });

        $('.btn-add-new-menu').on('click', function(){
            $('#tbl-new-menu-body').append(`
                <tr>
                    <td>
                        <input type="text" name="wfgroups[]" class="form-control"/>
                    </td>
                    <td style="text-align:center;">
                        <button type="button" class="btn btn-danger btn-sm btnRemove">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `);

            $('.btnRemove').on('click', function(e){
                e.preventDefault();
                $(this).closest("tr").remove();
            });
        });
    });
</script>
@endsection