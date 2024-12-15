<body id="page-login">
    <div class="container">
        <?php
            $User = new User($Conn);
            $MailHandler = new MailHandler();
            if($_POST){
                if(isset($_POST['reg'])){
                    // Registration form submitted

                    // Check for errors in the form
                    $error = "";
                    if(!$_POST['email']){
                        $error = "Email not set";
                    } else if($User->checkDatabaseForEmailAddress($_POST['email'])){
                        $error = "Email Address already has an account associated with it";
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
                    } 
                    if($error){
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php echo $error;?>
                                <button class="alert-close" data-dismiss="alert">X</button>
                            </div>
                        <?php
                    } 
                    else{
                        $_SESSION['confirmation_code'] = $MailHandler->sendEmailAddressConfirmation($_POST['email']);
                        $_SESSION['email_confirmation_check'] = true;
                        $_SESSION['registration_post'] = $_POST;
                        echo '<meta http-equiv="refresh" content="0;url=index.php?p=email_confirm">';
                    }
                }  
                else if(isset($_POST['login'])){
                    
                    // Login form submitted

                    // Check for errors in the form
                    $error = "";
                    if(!$_POST['email']){
                        $error = "Email missing";
                    } else if(!$User->checkDatabaseForEmailAddress($_POST['email'])){
                        $error = "Email Address doesn't have an account associated with it";
                    } else if(!$_POST['password']){
                        $error = "Password missing";
                    } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $error = "Email address is not valid";
                    } else if(strlen($_POST['password']) < 8){
                        $error = "Password must be at least 8 characters in length";
                    } 
                    if($error){
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php echo $error;?>
                                <button class="alert-close" data-dismiss="alert">X</button>
                            </div>
                        <?php
                    }
                    else {
                        $_SESSION['confirmation_code'] = $MailHandler->sendEmailAddressConfirmation($_POST['email']);
                        $_SESSION['email_confirmation_check'] = true;
                        $_SESSION['login_post'] = $_POST;
                        echo '<meta http-equiv="refresh" content="0;url=index.php?p=email_confirm">';
                        // header("Location: index.php?p=email_confirm");
                    }
                } 
            }
        ?>
        <div class="container">
            <h2>Modal Example</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                    <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                
                </div>
            </div>
            
            </div>
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
    </div>
</body>