<?php

namespace App\Controllers;
use Core\BaseCOntroller;

class PostsController extends BaseController
{
    public function index()
    {
        echo "Posts";
    }

    public function show($id,$request)
    {
        echo $id."<br/>";

        echo $request->get->nome."<br/>";

        echo $request->get->idade."<br/>";
    }
}