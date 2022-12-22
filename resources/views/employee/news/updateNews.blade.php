@extends("employee.layout.master")
@section('page_name', '- Cập nhật bài viết')
@section('css')
<style>
            /* Style the Image Used to Trigger the Modal */
            .img {
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
        }

        .modal-backdrop {
            display: none !important;
        }

        .img:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
        }

    .close {
        position: absolute;
        top: 60px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation - Zoom in the Modal */
    .modal-content, #caption {
        animation-name: zoom;
        animation-duration: 0.6s;
    }
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }
    
    @keyframes zoom {
          from {transform:scale(0)}
          to {transform:scale(1)}
        }
        @media only screen and (max-width: 700px){
          .modal-content {
            width: 100%;
          }
        }
</style>
@endsection
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-info">{{__('page_name.list_news')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-success">{{__('page_name.update_news')}}</a>
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
                                @csrf
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.title_vi')}}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title_vi" id="title_vi"
                                                       value="{{$detail->title}}">
                                            </div>
                                            @if($errors->has('title_vi'))
                                                <p class="text-danger"
                                                   style="padding-bottom: 10px;">{{ $errors->first('title_vi') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.title_en')}}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title_en" id="title_en"
                                                       value="{{$detail->title_en}}">
                                            </div>
                                            @if($errors->has('title_en'))
                                                <p class="text-danger"
                                                   style="padding-bottom: 10px;">{{ $errors->first('title_en') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.content_vi')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="content_vi"
                                                          id="content_vi"
                                                          rows="4" cols="50"
                                                          placeholder="{{__('profile.content_vi')}}">{{$detail->content}}</textarea>
                                            </div>
                                            @if($errors->has('content_vi'))
                                                <p class="text-danger"
                                                   style="padding-bottom: 10px;">{{ $errors->first('content_vi') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.content_en')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="content_en"
                                                          id="content_en"
                                                          rows="4" cols="50"
                                                          placeholder="{{__('profile.content_en')}}">{{$detail->content_en}}</textarea>
                                            </div>
                                            @if($errors->has('content_en'))
                                                <p class="text-danger"
                                                   style="padding-bottom: 10px;">{{ $errors->first('content_en') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="category">{{__('profile.category')}}<span
                                                        class="text-danger">*</span></label>
                                                <select type="text" class="form-control" name="category" id="category">
                                                    @if ($categories)
                                                        @foreach ($categories as $item)
                                                            <option value="{{$item->slug}}"
                                                                    @if($item->slug == $detail->category) selected @endif>{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @if($errors->has('category'))
                                                <p class="text-danger"
                                                   style="padding-bottom: 10px;">{{ $errors->first('category') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="file" class="img-ct">
                                                    <label for="file"
                                                           class="form-label"><strong>{{__('profile.img_news')}}</strong></label>
                                                    <input type="file" name="img_news" accept="image/*" class=""
                                                           id="img_news"
                                                           value="{{!empty($detail->image) ? $detail->image : ''}}"
                                                           onchange="document.getElementById('img-news').src = window.URL.createObjectURL(this.files[0])"/>
                                                    <img id="img-news"
                                                         src="{{!empty($detail->image) ? $detail->image : asset('frontend/images/default.png')}}"
                                                         onclick="clickImg(this)" class="form-control" alt="" width="250px" height="250px"/>
                                                </label>
                                                @if($errors->has('img_news'))
                                                    <p class="text-danger"
                                                       style="padding-bottom: 10px;">{{ $errors->first('img_news') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    <!-- <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="file">{{__('profile.img_news')}}<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="img_news" id="img_news"
                                                        placeholder="{{__('profile.img_news')}}" >
                                                <img src='{{asset("$detail->image")}}'>
                                            </div>
                                            @if($errors->has('img_news'))
                                        <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('img_news') }}</p>
                                            @endif
                                        </div> -->

                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" id="create" class="btn btn-success action">
                                                    {{__('button.update')}} &nbsp;
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                                <a type="button" href="{{route('customer.employee.list_news')}}"
                                                   class="btn btn-danger action">
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
    <!-- The Modal -->
    <div id="imgModal" class="modal">
      <!-- The Close Button -->
      <span class="close" onclick="closeModal(this)">&times;</span>
      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">
      <!-- Modal Caption (Image Text) -->
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

    <script type="text/javascript">
        function clickImg(el) {
            var modal = document.getElementById("imgModal");
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            modal.style.display = "block";
            modalImg.src = el.src;
        }    
        const closeModal = function(el) {
            console.log("close");
            $(el).closest('.modal').hide();
        }
    </script>
@endsection
