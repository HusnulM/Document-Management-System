@extends('layouts/App')

@section('title', 'Document Approval')

@section('additional-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ ('/assets/css/customstyle.css') }}">
    <style type="text/css">
        .select2-container {
            display: block
        }

        .select2-container .select2-selection--single {
            height: 36px;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <form action="{{ url('transaction/document/save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Approve Document</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="doctitle">Document Title</label>
                                    <p>{{ $document->document_title }}</p>
                                </div>  
                                <div class="form-group">
                                    <label for="doctitle">DCN Number</label>
                                    <p>{{ $document->dcn_number }}</p>
                                </div>   
                                <div class="form-group">
                                    <label for="doctype">Document Type</label>
                                    <p>{{ $document->doctype }}</p>
                                </div>    
                                <div class="form-group">
                                    <label for="doclevel">Document Level</label>
                                    <p>{{ $document->document_level }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="effectivedate">Effectivity Date</label>
                                    <p>{{ formatDate($document->effectivity_date) }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="docnumber">Document Number</label>
                                    <p>{{ $document->document_number }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Created By:</label> {{$document->createdby}}
                                </div>
                                <div class="form-group">
                                    <label>Created At:</label>
                                    <p>{!! formatDateTime($document->created_at) !!} <br>
                                        ({{\Carbon\Carbon::parse($document->created_at)->diffForHumans()}})
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Last Updated:</label>
                                    <p>{!! formatDateTime($document->updated_at) !!} <br>
                                        @if($document->updated_at != null)
                                        ({{\Carbon\Carbon::parse($document->updated_at)->diffForHumans()}})
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <!-- <h3 class="card-title">Approve Document</h3> -->
                    <div class="row">
                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Files</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Document Affected Area</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-approval-tab" data-toggle="pill" href="#custom-content-above-approval" role="tab" aria-controls="custom-content-above-approval" aria-selected="false">Approval Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-history-tab" data-toggle="pill" href="#custom-content-above-history" role="tab" aria-controls="custom-content-above-history" aria-selected="false">Document History</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-default btn-sm">
                            <i class="fa fa-download"></i> Download All Files
                        </a>
                        <a href="{{ url('/transaction/docapproval') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                                    <div class="row">
                                        @foreach($attachments as $key => $file)
                                        <div class="col-lg-4 col-md-6 col-sm-12 m-t-20" style="cursor:pointer;">
                                            <div class="doc-box box box-widget widget-user-2">
                                                <div class="widget-user-header bg-gray bg-folder-shaper no-padding">
                                                    <div class="folder-shape-top bg-gray">
                                                    </div>
                                                    <div class="box-header">
                                                        <span style="margin-left: -15px;">
                                                            <!-- <i class="fa fa-folder text-yellow" style="font-size:20px;"></i> -->
                                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: transparent;border: none;">
                                                            <i class="fa fa-ellipsis-v" style="color: #fff;"></i>
                                                            </a>
    
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="#">Preview File</a>
                                                                <a class="dropdown-item" href="#">Download</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </span>     
                                                        <span class="pull-right" style="margin-right: 3px;">
                                                            <div class="dropdown">
                                                            </div>
                                                            <!-- <i class="fa fa-ellipsis-v text-white" style="font-size:20px;"></i> -->
                                                        </span>                                                        
                                                    </div>
                                                    <a href="#" style="color: black;">
                                                        <p style="font-size:12px; margin-left: 7px;">{{ $file->efile }}</p>
                                                        <hr style="background-color:white;">
                                                        <h5 class="widget-user-desc" style="font-size: 11px">
                                                            <span style="margin-left: -12px;" class="time" data-toggle="tooltip" title="{{ $file->createdby }}">
                                                                {{ $file->createdby }}
                                                            </span>
                                                            <span class="pull-right" style="margin-right: 15px;" data-toggle="tooltip" title="{{ $file->created_at }}">
                                                                <i class="fa fa-clock"></i> {{\Carbon\Carbon::parse($file->created_at)->diffForHumans()}}
                                                            </span>
                                                        </h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                                    <div class="col-lg-12">
                                        <table id="tbl-doc-area" class="table table-bordered table-hover table-striped table-sm" style="width:100%;">
                                            <thead>
                                                <th>Document Area</th>
                                            </thead>
                                            <tbody>
                                                @foreach($areas as $key => $row)
                                                <tr>
                                                    <td>{{ $row->docareaname }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>                                                    
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-content-above-approval" role="tabpanel" aria-labelledby="custom-content-above-approval-tab">
                                    <div class="col-lg-12">
                                        <table id="tbl-approval" class="table table-bordered table-hover table-striped table-sm" style="width:100%;">
                                            <thead>
                                                <th>Approver Name</th>
                                                <th>Approver Level</th>
                                                <th>Approval Status</th>
                                                <th>Approve Date</th>
                                                <th>Approver Note</th>
                                            </thead>
                                            <tbody>
                                                @foreach($approvals as $key => $row)
                                                <tr>
                                                    <td>{{ $row->approver_name }}</td>
                                                    <td>{{ $row->approver_level }}</td>
                                                    @if($row->approval_status == "Y")
                                                    <td style="text-align:center; background-color:green; color:white;">
                                                        Approved
                                                    </td>
                                                    @elseif($row->approval_status == "R")
                                                    <td style="text-align:center; background-color:red; color:white;">
                                                        Rejected
                                                    </td>
                                                    @else
                                                    <td style="text-align:center; background-color:yellow; color:black;">
                                                        Open
                                                    </td>
                                                    @endif
                                                    
                                                    <td>{{ $row->approval_date }}</td>
                                                    <td>{!! $row->approval_remark !!}</td>
                                                </tr>
                                                @endforeach
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
    </div>
</div>
@endsection

@section('additional-js')
<script src="{{ ('/assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ ('/assets/ckeditor/adapters/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.scaleflex.it/plugins/filerobot-image-editor/3/filerobot-image-editor.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () { 
        $('#tbl-doc-area').DataTable();
    });
</script>
@endsection