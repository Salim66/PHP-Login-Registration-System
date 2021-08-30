<?php


    //==================== Create Helper Functions =====================//

    // clean entities, special symbols
    function clean($string){

        return htmlentities($string);

    }

    // create redirect function
    function redirect($location){

        return header("Location: {$location}");

    }

    // set session message function
    function setMessage($message){
        
        if(!empty($message)){
            $_SESSION['message'] = $message;
        }else {
            $message = "";
        }

    }

    // display session message function
    function displayMessage(){

        if(isset($_SESSION['message'])){

            echo $_SESSION['message'];
            unset($_SESSION['message']);

        }

    }

    // Create token genarator function
    function tokenGenerator(){

        $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        return $token;

    }






    //==================== Create Validation Functions =====================//


    // Create validate user registration function
    function validateUserRegistration(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // some property
            $errors = [];

            $min = 3;
            $max = 20;

            // grab form value
            $first_name         = clean($_POST['first_name']);
            $last_name          = clean($_POST['last_name']);
            $username           = clean($_POST['username']);
            $email              = clean($_POST['email']);
            $password           = clean($_POST['password']);
            $confirm_password   = clean($_POST['confirm_password']);


            // check first name less than 3 or not
            if(strlen($first_name) < $min){

                $errors[] = "Your first name cannot be less than {$min} characters";

            }

            // check last name less than 3 or not
            if(strlen($last_name) < $min){

                $errors[] = "Your last name cannot be less than {$min} characters";

            }


            // check errors array variable has or not than loop the message and show
            if(!empty($errors)){

                foreach($errors as $error){
                    echo $error;
                }

            }



        }

    }




?>