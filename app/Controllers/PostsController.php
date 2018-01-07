<?php

namespace App\Controllers;

use Core\BaseController;
use Core\DataBase;
use App\Models\Post;
use Core\Container;


class PostsController extends BaseController
{
    public function index()
    {

       $model = Container::getModel("Post");
       $posts = $model->All();

       print_r($posts);
    }

    public function show($id,$request)
    {
        echo $id."<br/>";

        echo $request->get->nome."<br/>";

        echo $request->get->idade."<br/>";
    }
}