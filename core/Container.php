<?php 
namespace Core;

class Container
{
    public function newController($controller){
        $objController = "\\App\\Controllers\\".$controller;
        return new $objController;
    }
}