@extends('employee.layout.master')
@section('page_name','- '.__('page_name.project_list'))
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-info">{{__('page_name.project_list')}}</a>
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
                            <h1 class="d-inline-block">Danh sách dự án <span
                                    style="color: red">({{$projects->total() ?? 0}})</span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a class="btn btn-success"
                                   href="{{route('project.create')}}"
                                >
                                    <i class="fas fa-plus"></i>&nbsp;
                                    Thêm mới
                                </a>
                                <a class="btn btn-primary" href="#" data-bs-toggle="dropdown">
                                    <i class="fas fa-filter"></i>&nbsp;
                                    Lọc dữ liệu
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card"
                                     style="width: 300px;">
                                    <div class="card d-flex flex-column">
                                        <div class="card-body d-flex flex-column">
                                            <form method="get" action="{{route('project.list')}}">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Ngày bắt đầu</label>
                                                    <div>
                                                        <input type="date" name="start" class="form-control"
                                                               value="{{ request()->get('start') }}"
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Ngày kết thúc</label>
                                                    <div>
                                                        <input type="date" name="end" class="form-control"
                                                               value="{{ request()->get('end') }}"
                                                               autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group text-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-search"></i>&nbsp; Tìm kiếm
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">Tên dự án</th>
                                        <th style="text-align: center">Giá trị dự án</th>
                                        <th style="text-align: center">Số phần</th>
                                        <th style="text-align: center">Giá trị 1 phần</th>
                                        <th style="text-align: center">Loại dự án</th>
                                        <th style="text-align: center">Trạng thái</th>
                                        <th style="text-align: center">Địa chỉ</th>
                                        <th style="text-align: center">Người tạo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($projects[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($projects as $key => $project)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <div id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                                            <button class="btn btn-info"><i class="fas fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-demo">
                                                            <a class="dropdown-item"
                                                               href="{{route('project.action',['id'=> $project->id])}}">
                                                                <i class="fa fa-info-circle"></i>&nbsp;
                                                                Chi tiết dự án
                                                            </a>
                                                            @if(!in_array($project->status, [3,5]))
                                                                <a class="dropdown-item"
                                                                   href="{{route('project.action',['id'=> $project->id])}}?action=basic">
                                                                    <i class="fa fa-edit"></i>&nbsp;
                                                                    Cập nhật thông tin cơ bản
                                                                </a>
                                                            @endif
                                                            <a class="dropdown-item"
                                                               href="{{route('project.action',['id'=> $project->id])}}?action=image">
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật hình ảnh dự án
                                                            </a>
                                                            <a class="dropdown-item"
                                                               href="{{route('project.action',['id'=> $project->id])}}?action=extend">
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật thông tin mở rộng
                                                            </a>
                                                            <a class="dropdown-item"
                                                               href="{{route('project.action',['id'=> $project->id])}}?action=asset">
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật thông tin tài sản
                                                            </a>
                                                            <a class="dropdown-item"
                                                               href="{{route('project.action',['id'=> $project->id])}}?action=investor">
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật thông tin chủ đầu tư
                                                            </a>
                                                            <a class="dropdown-item"
                                                               href="{{route('project.action',['id'=> $project->id])}}?action=plan">
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật kế hoạch dự án
                                                            </a>
                                                            <a class="dropdown-item"
                                                               href="{{route('project.action',['id'=> $project->id])}}?action=document">
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật tài liệu
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$project->name_vi}}</td>
                                                <td>{{number_format_vn($project->total_value)}}</td>
                                                <td>{{number_format_vn($project->part)}}</td>
                                                <td>{{number_format_vn($project->value_part)}}</td>
                                                <td>{{type_project($project->type)}}</td>
                                                <td>
                                                    <select class="form-control status_project" name="status_project"
                                                            data-id="{{$project->id}}" {{in_array($project->status, [3,5]) ? 'disabled' : ''}}>
                                                        @foreach(status_project() as $k => $v)
                                                            <option
                                                                value="{{$k}}" {{$k == $project->status ? "selected" : ''}}>{{$v}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    {{$project->address_vi}}<br>{{$project->ward->name}}
                                                    <br>{{ $project->district->name }}<br>{{ $project->city->name}}
                                                </td>
                                                <td>
                                                    {{$project->created_at}}
                                                    <br>
                                                    {{$project->created_by}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endempty
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-inline-block float-right">
                                {{$projects->appends(request()->query())}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{asset('js/project/index.js')}}"></script>
@endsection

