@extends('employee.layout.master')
@section('page_name','- Danh sách bài viết')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Danh sách bài viết</a>
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
                            <h1 class="d-inline-block">Danh sách bài viết <span
                                    style="color: red">({{$posts->total() ?? 0}})</span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a class="btn btn-success"
                                   href="{{route('post.create')}}">
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
                                            <form method="get" action="">
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
                                        <th style="text-align: center">Tên bài viết</th>
                                        <th style="text-align: center">Nội dung</th>
                                        <th style="text-align: center">Người tạo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($posts[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($posts as $key => $post)
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
                                                               href="{{route('post.show',['id'=> $post->id])}}">
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật thông tin
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$post->title_vi}}</td>
                                                <td>{!! \Illuminate\Support\Str::limit($post->content_vi, 200) !!}</td>
                                                <td>
                                                    {{$post->created_at}}
                                                    <br>
                                                    {{$post->created_by}}
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
                                {{$posts->appends(request()->query())}}
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

