<?php

namespace Core;

abstract class BaseController
{
    private $viewPath; 
    private $layoutPath;
    protected $view;
    private $pageTitle = '';
    public function __construct()
    {
        $this->view = new \stdClass();
    }

    protected function setPageTitle($pageTitle){
        $this->pageTitle = $pageTitle;
    }

    protected function getPageTitle($separator = ''){
            return $this->pageTitle.' '.$separator;
    }

    protected function renderView($viewPath,$layoutPath = null)
    {
        $this->viewPath = $viewPath;
        if($layoutPath)
            {
                $this->layoutPath = $layoutPath;
                $this->layout();
                
                return;
            }
            $this->content();
            return;
    }

    protected function content()
    {
        if(file_exists(__DIR__."/../app/Views/{$this->viewPath}.phtml"))
        {
            require_once __DIR__."/../app/Views/{$this->viewPath}.phtml";
            return ;
        }
        echo "404 doidão";
        return ;
    }
    
    protected function layout()
    {
        if(file_exists(__DIR__."/../app/Views/{$this->layoutPath}.phtml"))
        {
            require_once __DIR__."/../app/Views/{$this->layoutPath}.phtml";
            return ;
        }
        echo "404 doidão";
        return ;
    }
}