@extends("employee.layout.master")
@section('page_name', '- Chi tiết bài viết')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-info">{{__('page_name.list_news')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-success">{{__('page_name.detail_news')}}</a>
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
                            <form action='{{route("customer.employee.update_news",["id" => $detail->id])}}' method="post" accept-charset="utf-8" enctype='multipart/form-data'>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.title_vi')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title_vi" id="title_vi" disabled
                                                        value="{{$detail->title}}" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.title_en')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title_en" id="title_en" disabled
                                                        value="{{$detail->title_en}}" >
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.content_vi')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="content_vi" id="content_vi" disabled
                                                    rows="4" cols="50"    placeholder="{{__('profile.content_vi')}}">{{$detail->content}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.content_en')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="content_en" id="content_en" disabled
                                                    rows="4" cols="50"    placeholder="{{__('profile.content_en')}}">{{$detail->content_en}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="category">{{__('profile.category')}}<span class="text-danger">*</span></label>
                                                @foreach ($categories as $item)
                                                    @if ($item['id'] != $detail->category_news_id)
                                                        @continue
                                                    @else
                                                    <input type="text" class="form-control" name="category" id="category"
                                                        disabled value="{{$item['name']}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="file">{{__('profile.img_news')}}<span class="text-danger">*</span></label>
                                                <img style="width:200px; height:200px" class="form-control" src='{{asset("$detail->image")}}' id="img_after"  alt=""/>
                                            </div>
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <a type="button" href="{{route('customer.employee.list_news')}}" class="btn btn-danger action">
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
        CKEDITOR.replace('content_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('content_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection
