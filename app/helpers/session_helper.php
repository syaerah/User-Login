<?php
    session_start();

    //Flash message helper
    // CONTOH - flash('register_success', "You are now registered');
    // DISPLAY IN VIEW - echo flash('register_success');
    function flash($name = '', $message = '', $class = 'alert alert-success'){
        //die(var_dump($_SESSION));
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name. '_class'])){
                    unset($_SESSION[$name. '_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;
            }   elseif(empty($message) && !empty($_SESSION[$name])){
                echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
            }
        }
    }

    // function flash('register_success', 'You are now registered and can log in', 'alert alert-success'){
    //     //die(var_dump($_SESSION));
    //     if(!empty($name)){
    //         if(true && true){
    //             $_SESSION[$name] = 'You are now registered and can log in';
    //             $_SESSION[$name. '_class'] =  'alert alert-success';
    //         }   
    //     }
    // }