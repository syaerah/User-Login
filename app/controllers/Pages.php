<?php
    class Pages extends Controller {
        public function __construct(){
            

        }
        public function index(){
            $data = [
                'title' => 'User Login',
                'description' => 'Simple user authentication built on this framework'
            ];
            
            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'About Us',
                'description' => 'User login app for practice and future expansion.'
            ];

            $this->view('pages/about', $data);

        }

    }

