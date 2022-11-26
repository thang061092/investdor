@extends('employee.layout.master')
@section('page_name','- Thêm mới nhóm quyền')
@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Danh sách nhóm quyền</a>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-success">Thêm mới nhóm quyền</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    {{-- Head --}}
                    <div class="right_col">
                        <div class="list_item_table">
                            <div class="head">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="title_head">
                                            <input class="form-control" name="name" type="text"
                                                   placeholder="Nhập tên nhóm quyền"
                                                   required>

                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <button style="margin-left: 50px;" class="btn btn-success btn_create_role"><i
                                                class="fas fa-plus"></i>&nbsp;Thêm mới
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table mt-3">
                                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#user" class="nav-link active" data-bs-toggle="tab">Nhân viên</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#menu" class="nav-link" data-bs-toggle="tab">Danh mục</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="user">
                                        <div class="float-right">
                                            <ul class="nav navbar-right" style="min-width: initial;">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown"
                                                       role="button"
                                                       aria-expanded="false"><i class="fas fa-cog"></i></a>
                                                    <ul class="dropdown-menu" role="menu" style="text-align: center">
                                                        <a href="#" data-bs-toggle="modal"
                                                           data-bs-target="#modal_select_user"
                                                           class="show_model_user">Thêm mới</a>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                        <table class="table table-responsive table-nowrap table-striped" id="role_user">
                                            <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="menu">
                                        <div class="float-right">
                                            <ul class="nav navbar-right" style="min-width: initial;">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown"
                                                       role="button"
                                                       aria-expanded="false"><i class="fas fa-cog"></i></a>
                                                    <ul class="dropdown-menu" role="menu" style="text-align: center">
                                                        <a href="#" data-bs-toggle="modal"
                                                           data-bs-target="#modal_select_menu"
                                                           class="show_model_menu">Thêm mới</a>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <table class="table table-responsive table-nowrap table-striped" id="role_menu">
                                            <thead>
                                            <tr>
                                                <th>Danh mục</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-inline-block float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal_select_user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="tbl_modal_user" class="table table-striped display">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Email</th>
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
                    <button type="button" class="btn btn-success save_model_user" data-bs-dismiss="modal">
                        <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Lưu lại
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal_select_menu" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="tbl_modal_menu" class="table table-striped display dataTable">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Danh mục</th>
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
                    <button type="button" class="btn btn-success save_model_menu" data-bs-dismiss="modal">
                        <i class="fa fa-save" aria-hidden="true"></i>&nbsp;Lưu lại
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/group/create.js')}}"></script>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection


