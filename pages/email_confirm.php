<body id="page-email-confirm">
    <div class="container">
    <?php
        $User = new User($Conn);

        if(isset($_POST['confirm'])){
            if($_POST["email_confirmation_code"] == $_SESSION['confirmation_code']){

                // If the code matches check the action

                if(isset($_SESSION['registration_post'])){
                    $attempt = $User->createUser($_SESSION['registration_post']);
                    unset($_SESSION['email_confirmation_check']);
                    unset($_SESSION['registration_post']);
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
                                Registration failed, please try again.
                                <button class="alert-close" data-dismiss="alert">X</button>
                            </div>
                        <?php
                    }
                } else if (isset($_SESSION['login_post'])){
                    unset($_SESSION['email_confirmation_check']);
                    if($User->loginUser($_SESSION['login_post'])){
                        $_SESSION['is_loggedin'] = true;
                        $_SESSION['user_data'] = $_SESSION['login_post'];
                        $_SESSION['user_data']['user_level'] = $User->getUserLevel($_SESSION['login_post']['email']);
                        unset($_SESSION['login_post']);
                        echo '<meta http-equiv="refresh" content="0;url=index.php">';
                    } else {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                            Log in failed, please try again.
                            <button class="alert-close" data-dismiss="alert">X</button>
                        </div>
                    <?php 
                    }
                }
            }else{
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        Incorrect Code.
                        <button class="alert-close" data-dismiss="alert">X</button>
                    </div>
                <?php
            }
        }
    if(isset($_SESSION['email_confirmation_check'])){ ?> 
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form id="email-confirmation-form" method="post" action="">
                    <div class="form-group">
                        <label for="email-confirmation">Confirmation Code</label>
                        <input type="number" class="form-control" id="email_confirmation_code" name="email_confirmation_code">
                    </div>
                    <button type="submit" name="confirm" value="1" class="btn btn-ferrari">Confirm</button>
                </form>   
            </div>
        </div> 
    </div>
    <?php } ?>
    </div>
</body>