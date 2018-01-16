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
        $this->SetPageTitle('Posts');
       $model = Container::getModel("Post");
       $this->view->posts = $model->All();
       $this->renderView('posts/index','layout');

    }

    public function show($id)
    {
        $model = Container::getModel('Post');
        $this->view->post = $model->find($id);
        $this->setPageTitle("{$this->view->post->title}");
        $this->renderView('posts/show','layout');
    }

    public function create()
    {
        $this->setPageTitle('New Post');
        $this->renderView('posts/create','layout');
    }

    public function store($request)
    {
        print_r($request->$post);
    }
}