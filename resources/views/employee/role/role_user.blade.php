@extends('employee.layout.master')
@section('page_name','- Cập nhật quyền nhân viên')
@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Danh sách nhân viên</a>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-success">Cập nhật quyền nhân viên</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="right_col">
            <div class="list_item_table">
                <div class="head">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="title_head">
                                <h2 class="">{{$user->full_name .' - ' .$user->email}}
                                    <button
                                        class="btn btn-success btn_update_action_user"
                                        data-id="{{$user->id}}">Cập nhật
                                    </button>

                                </h2>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                        </div>
                    </div>
                </div>
                <div class="table">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#action" class="nav-link active" data-bs-toggle="tab">Thao tác</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="action">
                            <div class="float-right">
                                <ul class="nav navbar-right" style="min-width: initial;">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fas fa-cog"></i></a>
                                        <ul class="dropdown-menu" role="menu" style="text-align: center">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_select_action"
                                               class="show_model_action" data-id="{{$user->id}}">Thêm mới</a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <table class="table table-responsive table-nowrap table-striped" id="action_user">
                                <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->actions as $action)
                                    <tr class="clear_tr_{{$action->id}}">
                                        <td>{{$action->name}}
                                            <input type="hidden" id="action_id" value="{{$action->id}}">
                                        </td>
                                        <td style="color: red"><a class="nav-link clear_tr"
                                                                  data-id='{{$action->id}}'><i
                                                    class="fas fa-times"></i></a></td>
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
    <div class="modal modal-blur fade" id="modal_select_action" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới thao tác</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="tbl_modal_action" class="table table-striped display">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="fa fa-close" aria-hidden="true"></i> Hủy
                    </button>
                    <button type="button" class="btn btn-success save_model_action" data-bs-dismiss="modal">
                        <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Lưu lại
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/role/index.js')}}"></script>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection


