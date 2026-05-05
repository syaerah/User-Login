<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){
            //check Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form

                //sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //init data
                $data=[
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ] ;

            //validate email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            } else {
                //check email
                if($this->userModel->findByEmail($data['email'])){
                    $data['email_err'] = 'Email already exists';
                }
            
            }

            //validate name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            //validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            //validate name
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            //nak pastikan xde error
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                //validated

                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //register user
                if($this->userModel->register($data)){
                    flash('register_success', 'You are now registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
                
            } else {
                //die(var_dump($data));
                //load view with errors
                $this->view('users/register', $data);
            }


        }else{
            //Init data
            $data=[
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ] ;

            //load view
            $this->view('users/register', $data);
            }
        }

        public function login(){
            //check Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form

                //sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data=[
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                //validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }

                //check for user/email
                if($this->userModel->findUserByEmail($data['email'])){
                    // User jumpa
                } else {
                    // user tak jumpa
                    $data['email_err'] = 'No user found with this email';
                }

                //nak pastikan xde error
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //validated
                    // nak check dan set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        //create session 
                        $this->createUserSession($loggedInUser);
                    } else {
                        //die('daefsf');
                        $data['password_err'] = 'Invalid password';
                        $this->view('users/login', $data);
                    }
                } else {
                    //load view with errors
                    $this->view('users/login', $data);
                }
                
        } else{
            //Init data
            $data=[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ] ;

            //load view
            $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('pages/index');

        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            } else {
                return false;
            }
        }
    }
