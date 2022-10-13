<?php


namespace Modules\Frontend\Http\Controllers;


use Modules\Mysql\Controller\BaseController;

class TemplateController extends BaseController
{
    public function example()
    {
        return view('frontend::template.example');
    }
}
