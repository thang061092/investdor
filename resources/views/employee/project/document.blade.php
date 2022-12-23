@extends('employee.layout.master')
@section('page_name', '- Cập nhật tài liệu dự án ' . $project['name_vi'] ?? '')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-success">{{__('page_name.project_list')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Cập nhật tài liệu dự
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
                                        <th style="text-align: center">Tiêu đề</th>
                                        <th style="text-align: center">Tên file</th>
                                        <th style="text-align: center">File</th>
                                        <th style="text-align: center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($project->documentProjects)
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($project->documentProjects as $key => $document)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$document->title_vi}}</td>
                                                <td>{{$document->name_file_vi}}</td>
                                                <td>
                                                    <a href="{{$document->link}}" target="_blank">
                                                        @if(in_array($document->type_file, ['xlsx', 'cvs']))
                                                            <img src="{{asset('image/file/filexls.png')}}">
                                                        @elseif(in_array($document->type_file, ['jpg', 'jpeg','png']))
                                                            <img src="{{asset('image/file/file_image.png')}}">
                                                        @elseif(in_array($document->type_file, ['mp3', 'mp4']))
                                                            <img src="{{asset('image/file/file_audio.png')}}">
                                                        @elseif(in_array($document->type_file, ['pdf']))
                                                            <img src="{{asset('image/file/file_pdf.png')}}">
                                                        @else
                                                            <img src="{{asset('image/file/file_adđf.png')}}">
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success edit_document" data-bs-toggle="modal"
                                                       data-bs-target="#edit_document" data-id="{{$document->id}}"><i
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
                    <h5 class="modal-title d-inline-block title-update-period">Thêm tài liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (VI):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_vi" type="text"
                               placeholder="Nhập tiêu đề tài liệu"
                               name="title_vi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (EN):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_en" type="text"
                               placeholder="Nhập tiêu đề tài liệu"
                               name="title_en">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tên file (VI):<span
                                class="text-danger">*</span></label>
                        <input class="form-control name_file_vi" type="text"
                               placeholder="Nhập tên tài liệu"
                               name="name_file_vi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tên file (EN):<span
                                class="text-danger">*</span></label>
                        <input class="form-control name_file_en" type="text"
                               placeholder="Nhập tên tài liệu"
                               name="name_file_en">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tệp đính kèm :</label>
                        <input class="form-control file_document" type="file" id="file_document"
                               name="file_document">
                    </div>
                    <input class="form-control" type="hidden"
                           name="id" value="{{$project['id']}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_add_document">
                        Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur" id="edit_document" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block title-update-period">Cập nhật tài liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (VI):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_vi" type="text"
                               placeholder="Nhập tiêu đề tài liệu"
                               name="edit_title_vi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiêu đề (EN):<span
                                class="text-danger">*</span></label>
                        <input class="form-control title_en" type="text"
                               placeholder="Nhập tiêu đề tài liệu"
                               name="edit_title_en">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tên file (VI):<span
                                class="text-danger">*</span></label>
                        <input class="form-control name_file_vi" type="text"
                               placeholder="Nhập tên tài liệu"
                               name="edit_name_file_vi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tên file (EN):<span
                                class="text-danger">*</span></label>
                        <input class="form-control name_file_en" type="text"
                               placeholder="Nhập tên tài liệu"
                               name="edit_name_file_en">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tệp đính kèm :<span
                                class="text-danger">*</span></label>
                        <input class="form-control edit_file_document" type="file" id="edit_file_document"
                               name="edit_file_document">
                    </div>
                    <input class="form-control" type="hidden"
                           name="edit_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_edit_document">
                        Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/project/document.js')}}"></script>
@endsection

