<body id="page-login">
    <div class="container">
        <?php
            $User = new User($Conn);
            if($_POST){
                if($_POST['reg']){
                    // Registration form submitted

                    // Check for errors in the form
                    $error = "";
                    if(!$_POST['email']){
                        $error = "Email not set";
                    } else if(!$_POST['password']){
                        $error = "Password not set";
                    } else if(!$_POST['password_confirm']){
                        $error = "Confirmation password not set";
                    } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $error = "Email address is not valid";
                    } else if($_POST['password'] !== $_POST['password_confirm']) {
                        $error = "Password and Confirmation Password don't match";
                    } else if(strlen($_POST['password']) < 8){
                        $error = "Password must be at least 8 characters in length";
                    } else if($User->checkDatabaseForEmailAddress($_POST['email'])){
                        $error = "Email Address already has an account associated with it";
                    }
                    if($error){
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php echo $error; ?>
                                <button class="alert-close" data-dismiss="alert">X</button>
                            </div>
                        <?php
                    } 
                    else{

                        // If theres no errors create a new user
                        $attempt = $User->createUser($_POST);

                        if($attempt){
                            ?>
                                <div class="alert alert-success alert-dismissible">
                                    User created - Please login!
                                    <button class="alert-close" data-dismiss="alert">X</button>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="alert alert-danger alert-dismissible">
                                    An error occurred, please try again.
                                    <button class="alert-close" data-dismiss="alert">X</button>
                                </div>
                            <?php
                        }
                    }
                }  
                else if($_POST['login']){

                    // Login form submitted

                }  
            }
        ?>
        <div class="row">
            <div class="col-md-6">
                <h2 id="login-h2">Login</h2>
                <form id="login-form" method="post" action="">
                    <div class="form-group">
                        <label for="login_email">Email Address</label>
                        <input type="email" class="form-control" id="login_email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <input type="password" class="form-control" id="login_password" name="password">
                    </div>
                    <button type="submit" name="login" value="1" class="btn btn-ferrari">Login</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2 id="reg-h2">Register</h2>
                <form id="reg-form" method="post" action="">
                    <div class="form-group">
                        <label for="reg_email">Email Address</label>
                        <input type="email" class="form-control" id="reg_email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="reg_password">Password</label>
                        <input type="password" class="form-control" id="reg_password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="reg_password_confirm">Confirm Password</label>
                        <input type="password" class="form-control" id="reg_password_confirm" name="password_confirm">
                    </div>
                    <button type="submit" name="reg" value="1" class="btn btn-ferrari">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>