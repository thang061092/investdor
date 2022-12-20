@extends("employee.layout.master")
@section('page_name', '- Thêm mới ý kiến phải hồi')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">{{__('page_name.create_feedback')}}</a>
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
                            <div class="card-header text-primary">
                                Thông tin chi tiết:
                            </div>
                            <form action="{{route('feedback.save')}}" method="post" accept-charset="utf-8" enctype='multipart/form-data'>
                                @csrf
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.feedback_vi')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="feedback_vi" id="feedback_vi"
                                                    rows="4" cols="50"    placeholder="{{__('profile.feedback_vi')}}"></textarea>
                                                @if($errors->has('feedback_vi'))
                                                    <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('feedback_vi') }}</p>
                                                @endif
                                            </div>
   
                                        </div>

                                        <div class="col-md-6 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.feedback_en')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="feedback_en" id="feedback_en"
                                                    rows="4" cols="50"    placeholder="{{__('profile.feedback_en')}}"></textarea>
                                                @if($errors->has('feedback_en'))
                                                    <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('feedback_en') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.job_vi')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="job_vi" id="job_vi"
                                                        placeholder="{{__('profile.job_vi')}}" >
                                                @if($errors->has('job_vi'))
                                                    <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('job_vi') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.job_en')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="job_en" id="job_en"
                                                        placeholder="{{__('profile.job_en')}}" >
                                                @if($errors->has('job_en'))
                                                    <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('job_en') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="full_name" id="full_name"
                                                        placeholder="{{__('profile.full_name')}}" >
                                                @if($errors->has('full_name'))
                                                    <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('full_name') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="avatar" class="img-ct">
                                                <label class="form-label"><strong>{{__('profile.photo')}}</strong><span
                                                                class="text-danger">*</span></label>
                                                    <input type="file" name="avatar" accept="image/*" class="d-none"
                                                            id="avatar" value=""
                                                            onchange="document.getElementById('img-news').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <img id="img-news" src="{{!empty($detail->avatar) ? $detail->image : asset('frontend/images/default.png')}}"
                                                        class="img-fluid" alt="" width="250px" height="250px"/>
                                                </label>
                                                @if($errors->has('avatar'))
                                                    <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('avatar') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" id="create" class="btn btn-success action">
                                                {{__('button.create')}} &nbsp;
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                                <a type="button" href="{{route('feedback.index')}}" class="btn btn-danger action">
                                                {{__('button.back')}} &nbsp;
                                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                </a>
                                            </div>
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
@endsection
@section('js')
    <script>
        CKEDITOR.replace('feedback_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('feedback_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection
