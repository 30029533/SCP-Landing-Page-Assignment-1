<?php

    class Model
    {
        public $text;

        public function __construct()
        {
            $this->text = "This is a first MVC applications. week 9 task"; 
        }
    }

    class View
    {
        private $model;

        public function __construct(Model $model)
        {
            $this->model = $model;
        }

        public function output()
        {
            return '<p>' . $this->model->text. '</P>';
        }

    }

    class Controller
    {
        private $model;

        public function __construct(Model $model)
        {
            $this->model = $model;
        }
    }
?>