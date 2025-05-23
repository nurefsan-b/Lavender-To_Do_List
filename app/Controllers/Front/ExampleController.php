<?php

namespace App\Core;
use App\Core\BaseController;

class ExampleController extends BaseController{
    public function index(){
        $title="Örnek MVC Sayfası";
        $content="Örnek MVC Sayfası İçeriği";
        $this->render("front/home", ['title'=>$title,'content' => $content]);
    }
}