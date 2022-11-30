@extends('employee.layout.master')
@section('page_name', '- Cập nhật kế hoạch dự án ' . $project['name_vi'] ?? '')
@section('css')
    <style>
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 1000px;
                margin: 1.75rem auto
            }
        }
    </style>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-success">{{__('page_name.project_list')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Cập nhật kế hoạch dự
                        án</a>
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
                            <h3 class="d-inline-block">{{$project['name_vi']}}</h3>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <button data-bs-toggle="modal" data-bs-target="#add_document"
                                        class="btn btn-primary">
                                    <i class="fas fa-plus"></i>&nbsp;
                                    Thêm mới
                                </button>
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
                                        <th style="text-align: center">Tiêu đề (VI)</th>
                                        <th style="text-align: center">Tiêu đề (EN)</th>
                                        <th style="text-align: center">Nội dung (VI)</th>
                                        <th style="text-align: center">Nội dung (EN)</th>
                                        <th style="text-align: center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($project->businessPlanes)
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($project->businessPlanes as $key => $plan)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$plan->title_vi}}</td>
                                                <td>{{$plan->title_en}}</td>
                                                <td>{!! $plan->description_vi !!}</td>
                                                <td>{!! $plan->description_en !!}</td>
                                                <td>
                                                    <a class="btn btn-success edit_plan" data-bs-toggle="modal"
                                                       data-bs-target="#edit_plan" data-id="{{$plan->id}}"><i
                                                            class="fa fa-edit"></i></a>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur" id="add_document" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block title-update-period">Thêm kế hoạch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (VI):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_vi" type="text"
                               placeholder="Nhập tiêu đề"
                               name="title_vi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (EN):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_en" type="text"
                               placeholder="Nhập tiêu đề"
                               name="title_en">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Nội dung (VI):<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control description_vi" type="text"
                                  placeholder="Nhập nội dung"
                                  name="description_vi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Nội dung (EN):<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control description_en" type="text"
                                  placeholder="Nhập nội dung"
                                  name="description_en"></textarea>
                    </div>
                    <input class="form-control" type="hidden"
                           name="id" value="{{$project['id']}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_add_plan">
                        Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur" id="edit_plan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block title-update-period">Cập nhật kế hoạch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (VI):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_vi" type="text"
                               placeholder="Nhập tiêu đề"
                               name="edit_title_vi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (EN):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_en" type="text"
                               placeholder="Nhập tiêu đề"
                               name="edit_title_en">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Nội dung (VI):<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control edit_description_vi" type="text"
                                  placeholder="Nhập nội dung"
                                  name="edit_description_vi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Nội dung (EN):<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control edit_description_en" type="text"
                                  placeholder="Nhập nội dung"
                                  name="edit_description_en"></textarea>
                    </div>
                    <input class="form-control" type="hidden"
                           name="edit_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_edit_plan">
                        Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/project/plan.js')}}"></script>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('description_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('description_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('edit_description_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('edit_description_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection
