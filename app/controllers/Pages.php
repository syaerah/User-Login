<?php
    class Pages extends Controller {
        public function __construct(){
            

        }
        public function index(){
            if(isLoggedIn()){
                redirect('posts');
            }
            $data = [
                'title' => 'User Login',
                'description' => 'Basic user authentication system with post-sharing functionality. Built as my first project using this framework. I’m Caerah, currently exploring PHP and still learning, so I’m open to any guidance, feedback, or suggestions for improvement.'
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

