@extends('employee.layout.master')
@section('page_name','- Danh sách menu')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Danh sách menu</a>
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
                            <h1 class="d-inline-block">Danh sách menu<span
                                    style="color: red">({{count($menus)}})</span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a data-bs-toggle="modal"
                                   data-bs-target="#add-menu"
                                   class="btn btn-success add-menu">
                                    Thêm menu &nbsp;
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
                                        <th style="text-align: center">Tên menu</th>
                                        <th style="text-align: center">Menu cha</th>
                                        <th style="text-align: center">Đường dẫn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($menus[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($menus as $key => $menu)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$menu->name}}</td>
                                                <td>{{$menu->menu ? $menu->menu->name : ''}}</td>
                                                <td>{{$menu->url}}</td>
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
    <div class="modal modal-blur" id="add-menu" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block title-update-period">Thêm menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Tên menu :<span
                                class="text-danger">*</span></label>
                        <input class="form-control name" type="text"
                               placeholder="Nhập tên menu"
                               name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Đường dẫn</label>
                        <input class="form-control part_menu" type="text"
                               placeholder="Nhập đường dẫn"
                               name="part_menu">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Menu cha</label>
                        <select class="form-control parent_menu" type="text"
                                name="parent_menu">
                            <option value="">Chọn menu cha</option>
                            @foreach($parents as $parent)
                                <option value="{{$parent->id}}">{{$parent->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_add_menu">
                        Thêm mới
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/menu/index.js')}}"></script>
@endsection


