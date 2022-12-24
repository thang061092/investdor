@extends('employee.layout.master')
@section('page_name', '- Cập nhật bài viết')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item">
                    <a href="">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{route('post.index')}}"
                       class="text-info">Danh sách bài viết
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href=""
                       class="text-success">Cập nhật bài viết
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
                                Cập nhật bài viết &nbsp;
                            </div>
                            <div class="card-body ">
                                <form method="post" action="{{route('post.update')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tiêu đề<span
                                                        class="text-danger">(VI)*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('title_vi'))is-invalid @endif"
                                                       name="title_vi"
                                                       id="title_vi" placeholder="Nhập tiêu đề"
                                                       value="{{$post->title_vi ?? old('title_vi')}}">
                                                @if($errors->has('title_vi'))
                                                    <p class="text-danger">{{ $errors->first('title_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tiêu đề<span
                                                        class="text-danger">(EN)*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('title_en'))is-invalid @endif"
                                                       name="title_en"
                                                       id="title_en" placeholder="Nhập tiêu đề"
                                                       value="{{$post->title_en ?? old('title_en')}}">
                                                @if($errors->has('title_en'))
                                                    <p class="text-danger">{{ $errors->first('title_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Chọn danh mục cha<span
                                                        class="text-danger"></span></label>
                                                <select type="text"
                                                        class="form-control @if($errors->has('parent'))is-invalid @endif"
                                                        name="parent"
                                                        id="parent">
                                                    <option value="">Chọn</option>
                                                    @foreach($parents as $parent)
                                                        <option
                                                            value="{{$parent->id}}" {{$post->parent_id == $parent->id ? 'selected' : ''}}>{{$parent->title_vi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('parent'))
                                                    <p class="text-danger">{{ $errors->first('parent') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Nội dung<span
                                                        class="text-danger">(VI)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('content_vi'))is-invalid @endif"
                                                          name="content_vi"
                                                          id="content_vi">{{$post->content_vi ?? old('content_vi')}}</textarea>
                                                @if($errors->has('content_vi'))
                                                    <p class="text-danger">{{ $errors->first('content_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Nội dung<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('content_en'))is-invalid @endif"
                                                          name="content_en"
                                                          id="content_en">{{$post->content_en ?? old('content_en')}}</textarea>
                                                @if($errors->has('content_en'))
                                                    <p class="text-danger">{{ $errors->first('content_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$post->id}}" name="id">
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <a class="btn btn-secondary" href="{{route('post.index')}}">
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
        CKEDITOR.replace('content_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script>
        CKEDITOR.replace('content_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection

