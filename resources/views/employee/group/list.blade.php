@extends('employee.layout.master')
@section('page_name','- Danh sách nhóm quyền')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Danh sách nhóm quyền</a>
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
                            <h1 class="d-inline-block">Danh sách nhóm quyền<span
                                    style="color: red">({{count($groups)}})</span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a class="btn btn-success add-menu" href="{{route('group.create')}}">
                                    Thêm nhóm quyền &nbsp;
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
                                        <th style="text-align: center">Tên nhóm quyền</th>
                                        <th style="text-align: center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($groups[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($groups as $key => $group)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$group->name}}</td>
                                                <td>
                                                    <a class="btn btn-info">Cập nhật</a>
                                                </td>

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
@endsection


