@extends('employee.layout.master')
@section('page_name', '- Cập nhật thông tin chủ đầu tư - ' . $project['name_vi'] ?? '')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item">
                    <a href="">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{route('project.list')}}"
                       class="text-success">{{__('page_name.project_list')}}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href=""
                       class="text-info">Cập nhật thông tin chủ đầu tư
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card" style="border-radius: 10px;">
                                <div class="card-header">
                                    Thông tin Chủ đầu tư &nbsp; <strong
                                        class="text-danger">{{$project['name_vi'] ?? ''}}</strong>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="{{route('project.update_investor')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Tên công ty<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control @if($errors->has('name_company_vi'))is-invalid @endif"
                                                           name="name_company_vi"
                                                           id="name_company_vi"
                                                           value="{{$project->investorProject->name_company_vi ?? old('name_company_vi')}}"
                                                           placeholder="Nhập tên công ty">
                                                    @if($errors->has('name_company_vi'))
                                                        <p class="text-danger">{{ $errors->first('name_company_vi') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Địa chỉ công ty<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control @if($errors->has('address_vi'))is-invalid @endif"
                                                           name="address_vi"
                                                           id="address_vi"
                                                           value="{{$project->investorProject->address_vi ?? old('address_vi')}}"
                                                           placeholder="Nhập Địa chỉ công ty">
                                                    @if($errors->has('address_vi'))
                                                        <p class="text-danger">{{ $errors->first('address_vi') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Giới thiệu công ty<span
                                                            class="text-danger">(VI)*</span></label>
                                                    <textarea type="text"
                                                              class="form-control @if($errors->has('description_vi'))is-invalid @endif"
                                                              name="description_vi"
                                                              id="description_vi">{{$project->investorProject->description_vi ?? old('description_vi')}}</textarea>
                                                    @if($errors->has('description_vi'))
                                                        <p class="text-danger">{{ $errors->first('description_vi') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Giới thiệu công ty<span
                                                            class="text-danger">(EN)*</span></label>
                                                    <textarea type="text"
                                                              class="form-control @if($errors->has('description_en'))is-invalid @endif"
                                                              name="description_en"
                                                              id="description_en">{{$project->investorProject->description_en ?? old('description_en')}}</textarea>
                                                    @if($errors->has('description_en'))
                                                        <p class="text-danger">{{ $errors->first('description_en') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <input name="id" type="hidden" value="{{$project['id']}}">
                                            <div class="text-center" style="text-align: right !important;">
                                                <div class="btnadmin">
                                                    <a class="btn btn-secondary" href="{{route('project.list')}}">
                                                        Trở về &nbsp;
                                                        <i class="fa fa-backspace" aria-hidden="true"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-success action">
                                                        Cập nhật &nbsp;
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card" style="border-radius: 10px;">
                                <div class="card-header">
                                    Thành viên công ty
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-vcenter table-nowrap table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align: center">Họ tên</th>
                                                        <th style="text-align: center">Chức vụ</th>
                                                        <th style="text-align: center">Ảnh đại diện</th>
{{--                                                        <th style="text-align: center"></th>--}}
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @empty($project->investorProject->memberCompanies)
                                                        <tr>
                                                            <td colspan="20" class="text-danger"
                                                                style="text-align: center">Không có dữ
                                                                liệu
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @foreach($project->investorProject->memberCompanies as $key => $member)
                                                            <tr style="text-align: center">
                                                                <td>{{$member->name_member}}</td>
                                                                <td>{{$member->position_member_vi}}</td>
                                                                <td>
                                                                    <a href="{{$member->avatar_member}}">
                                                                        <img src="{{$member->avatar_member}}"
                                                                             width="100px" height="100px">
                                                                    </a>
                                                                </td>
{{--                                                                <td>--}}
{{--                                                                    <a class="btn btn-success"><i class="fa fa-edit"--}}
{{--                                                                                                  aria-hidden="true"></i></a>--}}
{{--                                                                </td>--}}
                                                            </tr>
                                                        @endforeach
                                                    @endempty
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center" style="text-align: right !important;">
                                                <div class="btnadmin">
                                                    @if(!empty($project->investorProject->name_company_vi))
                                                        <a data-bs-toggle="modal"
                                                           data-bs-target="#add-member"
                                                           class="btn btn-success action">
                                                            Thêm thành viên &nbsp;
                                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                        </a>
                                                    @endif
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
        </div>
    </div>
    <div class="modal modal-blur" id="add-member" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block title-update-period">Thêm thành viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Họ tên :<span
                                class="text-danger">*</span></label>
                        <input class="form-control name_member" type="text"
                               placeholder="Nhập tên thành viên"
                               name="name_member">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Chức vụ :(VI)<span
                                class="text-danger">*</span></label>
                        <input class="form-control position_member_vi" type="text"
                               placeholder="Nhập chức vụ thành viên"
                               name="position_member_vi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Chức vụ :(EN)<span
                                class="text-danger">*</span></label>
                        <input class="form-control position_member_en" type="text"
                               placeholder="Nhập chức vụ thành viên"
                               name="position_member_en">
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="img-ct">
                            <input type="file" name="avatar" accept="image/*" class="d-none"
                                   id="avatar"
                                   onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])"/>
                            <img id="img-avatar" src="{{asset('frontend/images/default.png')}}"
                                 class="img-fluid" alt="" width="250px" height="250px"/>
                        </label>
                        <label class="form-label"><strong>Avatar</strong><span
                                class="text-danger">*</span></label>
                    </div>
                    <input class="form-control interest_period_id" type="hidden"
                           name="investor_project_id" value="{{$project->investorProject->id ?? ''}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_add_member" id="btn_add_member">
                        Xác
                        nhận
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/project/investor.js')}}"></script>
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
    </script>
@endsection
