<?php
    /*
    // *Base controller
    // *Loads models ngan views
    */
    
    class Controller{
        //load model
        public function model($model) {
            //require file model
            require_once '../app/models/' . $model . '.php';
            
            //Instantiate model
            return new $model;
            
        }

        //load view
        public function view($view, $data = []){
            //nak check file view
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                //kalau view not exist
                die('View does not exist!');
            }

        }
        

    }
    