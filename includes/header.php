<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Easy, budget-friendly recipes for students. Learn to cook quick and healthy meals with simple ingredients.">
    <title>Scuderia Ferrari Parts Store</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81ae266e9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<header>
        <div class="page-header-top">
            <h1>Scuderia Ferrari Parts Store</h1>
            <p>tracking, ordering and specifications all in one place</p>
            <a href="index.html"><img src="./images/ferrari-sf-logo-transparent-background.svg" alt="ferrari-sf-logo-transparent-background" width="300"  height="300"></a>
            <section class="hero">
                <h1>Born of the Spirit of Racing</h1>
            </section>
        </div>

        <!-- Navigation Menu -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="image-container" href="index.php?p=home"><img src="./images/Prancing_horse.svg" alt="Prancing_horse" height="30" width="30"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <script type="text/javascript" src=".\node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
                    <script type="text/javascript" src=".\node_modules\jquery\dist\jquery.min.js"></script>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=home"><i class="fa-solid fa-gauge-high"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=formula1"><i class="fa-solid fa-oil-can"></i>Formula 1</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-gas-pump"></i>Parts Categories</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php
                                $Category = new Category($Conn);
                                $categories = $Category->getAllCategories();
                                foreach($categories as $category) { ?>
                                    <a class="dropdown-item" href="index.php?p=category&id=<?php echo $category['category_id']?>"><?php echo $category['category_name']?></a>
                                <?php } ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=order"><i class="fa-solid fa-cart-shopping"></i></i>Order</a>
                        </li>
                        <?php
                        if(isset($_SESSION['is_loggedin'])){ ?>
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="src/php/logout.php"><i class="fa-solid fa-fingerprint"></i>Logout</a> -->
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Logout</button>
                            </li>
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Logout?</h4>
                                    </div>
                                    <div class="modal-body">
                                    <p>Are you sure you want to log out?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="src/php/logout.php" method="post">
                                            <button type="submit" class="btn btn-default">Logout</button>
                                        </form>
                                    </div>
                                </div>
                                
                                </div>
                            </div>

                        <?php } else {?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=login"><i class="fa-solid fa-fingerprint"></i>Login/Register</a>
                            </li>
                        <?php } 
                        ?>
                    </ul>
                    <div class="email-search">
                        <?php
                        if(isset($_SESSION['is_loggedin'])){ ?>
                            <a class="user-email"><i class="bi bi-person-fill"></i><?php echo $_SESSION['user_data']['email'];?></a>
                        <?php }
                        ?>
                        <form action="index.php?p=search" method="post" class="search-form">
                            <input class="form-control search-form-box" type="search" placeholder="Search" aria-label="Search" name="query">
                            <button class="btn btn-outline-success ms-2" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </nav>
</header>