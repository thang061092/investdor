@extends("customer.layout.master")
@section('page_name', __('page_name.knowledge'))
@section("content")
<div class="banner">
        <img src="{{asset('frontend/images/banner-kien-thuc.jpg')}}" class="img-fluid" alt=""/>
        <div class="box-banner">
            <h2 class="banner_title wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.3s">
            {{__('page_name.investment_and_real_estate')}}
            </h2>
            <div class="banner_short wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="0.3s">
            {{__('page_name.BUILD_THE_FUTURE_YOU_WANT')}}
            </div>
            <div class="banner_desc wow fadeInUp" data-wow-delay="0.9s" data-wow-duration="0.3s">
            {{__('page_name.quick_access_investments')}}
            </div>
        </div>
    </div>
</div>
<section class="knowledge">
    @foreach($categories as $key => $value)
        <div class="container">
            <p class="title_small wow fadeInUp">Intercontinatal</p>
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
                            <a href="" title="" class="image">
                                <img src="{{$new->image ?? asset('frontend/images/kien-thuc.jpg')}}" class="img-fluid" alt=""/>
                            </a>
                            <div class="content p-lg-3 p-3">
                                <h2>
                                    <a href="" title="" class="name d-block mb-1">{{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $new->title_en : $new->title}}</a>
                                </h2>
                                <div class="short">
                                    {!! session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $new->content_en : $new->content !!}
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
                <a href="{{route('customer.home_page')}}" title="Xem các khoản đầu tư khác" class="btn_all lg mx-auto mt-xl-3 mt-2">Xem ngay các khoản đầu
                    tư khác</a>
            </div>
        </div>
    @endforeach
</section>
@stop
