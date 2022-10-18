<?php


namespace Modules\Frontend\Http\Controllers;


use Modules\Mysql\Controller\BaseController;

class TemplateController extends BaseController
{
    public function example()
    {
        return view('frontend::template.example');
    }
    public function cackhoandautu()
    {
        return view('frontend::template.cackhoandautu');
    }
    public function checkotp()
    {
        return view('frontend::template.checkotp');
    }
    public function chitietduan()
    {
        return view('frontend::template.chitietduan');
    }
    public function dautu1()
    {
        return view('frontend::template.dautu1');
    }
    public function dautu2()
    {
        return view('frontend::template.dautu2');
    }
    public function dautu3()
    {
        return view('frontend::template.dautu3');
    }
    public function dautu4()
    {
        return view('frontend::template.dautu4');
    }
    public function kienthuc()
    {
        return view('frontend::template.kienthuc');
    }
    public function lichsudautu()
    {
        return view('frontend::template.lichsudautu');
    }
    public function login()
    {
        return view('frontend::template.login');
    }
    public function profile()
    {
        return view('frontend::template.profile');
    }
    public function quanlycuatoi1()
    {
        return view('frontend::template.quanlycuatoi1');
    }
    public function quanlycuatoi2()
    {
        return view('frontend::template.quanlycuatoi2');
    }
    public function quanlycuatoi3()
    {
        return view('frontend::template.quanlycuatoi3');
    }
    public function quenmatkhau()
    {
        return view('frontend::template.quenmatkhau');
    }
    public function register()
    {
        return view('frontend::template.register');
    }
    public function thongbao()
    {
        return view('frontend::template.thongbao');
    }
    public function thongtincanhan()
    {
        return view('frontend::template.thongtincanhan');
    }
    public function trangchu()
    {
        return view('frontend::template.main');
    }
}
