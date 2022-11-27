@extends('employee.layout.master')
@section('page_name','- Danh sách quyền')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Danh sách quyền</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    {{-- Head --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <h1 class="d-inline-block">Danh sách quyền<span
                                    style="color: red">({{count($roles)}})</span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a class="btn btn-success add-role" data-bs-toggle="modal"
                                   data-bs-target="#add-role">
                                    Thêm quyền &nbsp;
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">STT</th>
                                        <th style="text-align: center">Tên quyền</th>
                                        <th style="text-align: center">Slug</th>
                                        <th style="text-align: center">Đường dẫn</th>
                                        <th style="text-align: center">Menu</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($roles[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($roles as $key => $role)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>{{$role->slug}}</td>
                                                <td>
                                                    {{$role->url}}
                                                </td>
                                                <td>{{$role->menu->name}}</td>
                                            </tr>
                                        @endforeach
                                        <div class="col-12 col-md-12">
                                            <div class="row">
                                                <div class="col-12 col-md-10"></div>
                                                <div
                                                    class=" col-12 col-md-2">
                                                </div>
                                            </div>
                                        </div>
                                    @endempty
                                    </tbody>
                                </table>
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
    <div class="modal modal-blur" id="add-role" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block title-update-period">Thêm role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Tên role :<span
                                class="text-danger">*</span></label>
                        <input class="form-control name" type="text"
                               placeholder="Nhập tên role"
                               name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Đường dẫn</label>
                        <input class="form-control url" type="text"
                               placeholder="Nhập đường dẫn"
                               name="url">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Menu</label>
                        <select class="form-control menu_id" type="text"
                                name="menu_id">
                            <option value="">Chọn menu</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_add_role">
                        Thêm mới
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/role/index.js')}}"></script>
@endsection


