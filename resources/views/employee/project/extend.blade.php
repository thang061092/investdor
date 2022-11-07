@extends('employee.layout.master')
@section('page_name', '- Cập nhật thông tin mở rộng dự án - ' . $project['name_vi'] ?? '')
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
                       class="text-info">Cập nhật thông tin mở rộng dự án
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="col-md-12 col-sm-12">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header">
                                Thông tin tổng quan dự án &nbsp; <strong
                                    class="text-danger">{{$project['name_vi'] ?? ''}}</strong>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="{{route('project.update_extend')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Giới thiệu dự án<span
                                                        class="text-danger">(VI)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('description_project_vi'))is-invalid @endif"
                                                          name="description_project_vi"
                                                          id="description_project_vi">{!! $project->overviewProject->overview_vi ?? old('description_project_vi') !!}</textarea>
                                                @if($errors->has('description_project_vi'))
                                                    <p class="text-danger">{{ $errors->first('description_project_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Giới thiệu dự án<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('description_project_en'))is-invalid @endif"
                                                          name="description_project_en"
                                                          id="description_project_en">{!! $project->overviewProject->overview_en ?? old('description_project_en') !!}</textarea>
                                                @if($errors->has('description_project_en'))
                                                    <p class="text-danger">{{ $errors->first('description_project_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Thông tin địa điểm<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('address_project_vi'))is-invalid @endif"
                                                          name="address_project_vi"
                                                          id="address_project_vi">{!! $project->overviewProject->address_vi ?? old('address_project_vi') !!}</textarea>
                                                @if($errors->has('address_project_vi'))
                                                    <p class="text-danger">{{ $errors->first('address_project_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Thông tin địa điểm<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('address_project_en'))is-invalid @endif"
                                                          name="address_project_en"
                                                          id="address_project_en">{!! $project->overviewProject->address_en ?? old('address_project_en') !!}</textarea>
                                                @if($errors->has('address_project_en'))
                                                    <p class="text-danger">{{ $errors->first('address_project_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Thông tin thị trường<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('market_project_vi'))is-invalid @endif"
                                                          name="market_project_vi"
                                                          id="market_project_vi">{!! $project->overviewProject->market_vi ?? old('market_project_vi') !!}</textarea>
                                                @if($errors->has('market_project_vi'))
                                                    <p class="text-danger">{{ $errors->first('market_project_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Thông tin thị trường<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('market_project_en'))is-invalid @endif"
                                                          name="market_project_en"
                                                          id="market_project_en">{!! $project->overviewProject->market_en ?? old('market_project_en') !!}</textarea>
                                                @if($errors->has('market_project_en'))
                                                    <p class="text-danger">{{ $errors->first('market_project_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Thông tin nền tảng<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('background_project_vi'))is-invalid @endif"
                                                          name="background_project_vi"
                                                          id="background_project_vi">{!! $project->overviewProject->basis_vi ?? old('background_project_vi') !!}</textarea>
                                                @if($errors->has('background_project_vi'))
                                                    <p class="text-danger">{{ $errors->first('background_project_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Thông tin nền tảng<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('background_project_en'))is-invalid @endif"
                                                          name="background_project_en"
                                                          id="background_project_en">{!! $project->overviewProject->basis_en ?? old('background_project_en') !!}</textarea>
                                                @if($errors->has('background_project_en'))
                                                    <p class="text-danger">{{ $errors->first('background_project_en') }}</p>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('description_project_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('description_project_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('address_project_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('address_project_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('market_project_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('market_project_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('background_project_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('background_project_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection

