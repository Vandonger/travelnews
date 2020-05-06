<?php

class Controller {
    //function load model
    public function load_model($model) {
        require_once "./mvc/Models/".$model.".php";
        return new $model;
    }

    //Load view
    public function load_view($view, $data = []) {
        require_once "./mvc/Views/".$view.".php";
    }
}

?>