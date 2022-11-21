@extends("employee.layout.master")
@section('page_name', '- Thêm mới bài viết')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">{{__('page_name.create_news')}}</a>
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
                            <form action="{{route('customer.employee.save_news')}}" method="post" accept-charset="utf-8" enctype='multipart/form-data'> 
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.title_vi')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title_vi" id="title_vi"
                                                        placeholder="{{__('profile.title_vi')}}" >
                                            </div>
                                            @if($errors->has('title_vi'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('title_vi') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.title_en')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title_en" id="title_en"
                                                        placeholder="{{__('profile.title_en')}}" >
                                            </div>
                                            @if($errors->has('title_en'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('title_en') }}</p>
                                            @endif
                                        </div>
                                        <!-- <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="file">{{__('profile.img_news')}}<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="img_news" id="img_news"
                                                        placeholder="{{__('profile.img_news')}}" >
                                            </div>
                                            @if($errors->has('img_news'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('img_news') }}</p>
                                            @endif
                                        </div> -->
                                        <div class="col-md-7 col-sm-12">
                                            <div class="mb-3">
                                                <label for="img_news" class="img-ct">
                                                <label class="form-label"><strong>{{__('profile.img_news')}}</strong><span
                                                                class="text-danger">*</span></label>
                                                    <input type="file" name="img_news" accept="image/*" class="d-none"
                                                            id="img_news" value="{{!empty($detail->image) ? $detail->image : ''}}"
                                                            onchange="document.getElementById('img-news').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <img id="img-news" src="{{!empty($detail->image) ? $detail->image : asset('frontend/images/default.png')}}"
                                                            class="img-fluid" alt="" width="250px" height="250px"/>
                                                </label>
                                                @if($errors->has('img_news'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('img_news') }}</p>
                                                 @endif
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="category">{{__('profile.category')}}<span class="text-danger">*</span></label>
                                                <select type="text" class="form-control" name="category" id="category">
                                                    <option value="">--Chọn thể loại--</option>
                                                    @if ($categories)
                                                        @foreach ($categories as $item)
                                                            <option value="{{$item->slug}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif 
                                                </select>        
                                            </div>
                                            @if($errors->has('category'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('category') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.content_vi')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="content_vi" id="content_vi"
                                                    rows="4" cols="50"    placeholder="{{__('profile.content_vi')}}"></textarea>
                                            </div>
                                            @if($errors->has('content_vi'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('content_vi') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-md-7 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.content_en')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="content_en" id="content_en"
                                                    rows="4" cols="50"    placeholder="{{__('profile.content_en')}}"></textarea>
                                            </div>
                                            @if($errors->has('content_en'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('content_en') }}</p>
                                            @endif
                                        </div>
 
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" id="create" class="btn btn-success action">
                                                {{__('button.create')}} &nbsp;
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js'></script>
<script>
tinymce.init({
    selector: '#content_en',
});
tinymce.init({
    selector: '#content_vi',
});

</script>
@endsection
