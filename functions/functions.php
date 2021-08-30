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


    // Create form validation error
    function validationErrors($error_message){

        $message = <<<DELIMETER

                        <div class="alert alert-danger alert-dismissable">
                            <button class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> $error_message
                        </div>

                    DELIMETER;

        echo $message;

    }


    // Create username exists function, this function check username already database has or not
    function usernameExists($username){

        $sql = "SELECT id FROM users WHERE username = '$username'";
        $result = query($sql);
        if(rowCount($result) == 1){
            return true;
        }else {
            return false;
        }

    }


    // Create email exists function, this function check email already database has or not
    function emailExists($email){

        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = query($sql);
        if(rowCount($result) == 1){
            return true;
        }else {
            return false;
        }

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

            // check first name more than 20 or not
            if(strlen($first_name) > $max){

                $errors[] = "Your first name cannot be more than {$max} characters";

            }

            // check last name less than 3 or not
            if(strlen($last_name) < $min){

                $errors[] = "Your last name cannot be less than {$min} characters";

            }

            // check first name more than 20 or not
            if(strlen($last_name) > $max){

                $errors[] = "Your last name cannot be more than {$max} characters";

            }

            // check usernfame lass than 3 or not
            if(strlen($username) < 3){

                $errors[] = "Your username cannot be less than {$min} characters";

            }

            // check username more than 20 or not
            if(strlen($username) > $max){

                $errors[] = "Your username cannot be more than {$max} characters";

            }

            // check username already has or not into database
            if(usernameExists($username)){

                $errors[] = "Sorry that username already been taken!";

            }

            // check email more than 20 or not
            if(strlen($email) > $max){

                $errors[] = "Your email cannot be less than {$max} characters";

            }

            // check username already has or not into database
            if(emailExists($email)){

                $errors[] = "Sorry that email already is registered";

            }

            // check password and confirm password is not match
            if($password !== $confirm_password){

                $errors[] = "Your password and confirm password do not match";

            }


            // check errors array variable has or not than loop the errors and show message
            if(!empty($errors)){

                foreach($errors as $error){
                   
                    // code refactor
                    echo validationErrors($error);

                }

            }else {
                    
                // call to register user function and pass the parameters
                if(registerUser($first_name, $last_name, $username, $email, $password)){
                    
                    setMessage('<p class="bg-success text-center p-3">Please check your email inbox or span folder for activation link.</p>');
                    redirect("index.php");

                }

            }



        }

    }


    // Create user registration function
    function registerUser($first_name, $last_name, $username, $email, $password){

        // escape variable
        $first_name     = escapeString($first_name);
        $last_name      = escapeString($last_name);
        $username       = escapeString($username);
        $email          = escapeString($email);
        $password       = escapeString($password);


        if(usernameExists($username)){
            return false;
        }else if(emailExists($email)){
            return false;
        }else {

            $password        = md5($password);
            $validation_code = md5($username . microtime());

            $sql  = "INSERT INTO users(first_name, last_name, username, email, password, validation_code, active)";
            $sql .= " VALUES('$first_name', '$last_name', '$username', '$email', '$password', '$validation_code', 0)";
            $result = query($sql);
            confirm($result);

            return true;
        }

    }




?>