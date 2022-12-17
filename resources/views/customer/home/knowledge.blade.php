@extends("customer.layout.master")
@section('page_name', __('page_name.knowledge'))
@section("content")
    @include('customer.home.banner')
    <section class="knowledge">
        @foreach($categories as $key => $value)
            <div class="container">
                <p class="title_lg wow fadeInUp">{{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $value->name_en : $value->name}}</p>
                <div class="s-content wow fadeInUp">
                    <p>
                        {!! session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $value->description_en : $value->description !!}
                    </p>
                </div>
                <div class="row mt-xl-4 mt-3">
                    @if(!empty($value->news))
                        @foreach($value->news as $new)
                            <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb-3">
                                <div class="item-knowledge shadow wow fadeIn">
                                    <div class="img d-block">
                                        <a href="{{route('customer.detail_knowledge', ['slug'=> $new->slug])}}" title="" class="image">
                                            <img src="{{$new->image ?? asset('frontend/images/kien-thuc.jpg')}}"
                                                 class="img-fluid" alt=""/>
                                        </a>
                                        <div class="content p-lg-3 p-3">
                                            <h2>
                                                <a href="{{route('customer.detail_knowledge', ['slug'=> $new->slug])}}" title=""
                                                   class="name d-block mb-1">{{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $new->title_en : $new->title}}</a>
                                            </h2>
                                            <div class="short">
                                                {!! session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? \Illuminate\Support\Str::limit($new->content_en, 500) : \Illuminate\Support\Str::limit($new->content, 500) !!}
                                                <a href="{{route('customer.detail_knowledge', ['slug'=> $new->slug])}}"
                                                   title="{{__('project.see_more')}}"
                                                   class="d-inline-block view_more link" >{{__('project.see_more')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-danger" style="text-align: center">{{__('table.no_data')}}</div>
                    @endif
                </div>
                <div class="text-center">
                    <a href="{{route('customer.home_page')}}" title="Xem các khoản đầu tư khác"
                       class="btn_all lg mx-auto mt-xl-3 mt-2">Xem ngay các khoản đầu
                        tư khác</a>
                </div>
            </div>
        @endforeach
    </section>
@stop
