<?php
$Part = new Part($Conn);
$parts = $Part->getLastOrderedParts();
?>

<body id="page-home">
    <!-- Main Content -->
    <div class="container">

        <!-- Popular Recipes Section -->
        <section id="home">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-image-container">
                            <div id="home-carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#home-carousel" data-slide-to="1"></li>
                                    <li data-target="#home-carousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a href="images/home_images/factory1.webp" data-lightbox="home-gallery">
                                            <img class="home-image" src="images/home_images/factory1.webp" alt="First slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="images/home_images/factory2.png" data-lightbox="home-gallery">
                                            <img class="home-image" src="images/home_images/factory2.png" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="images/home_images/factory3.png" data-lightbox="home-gallery">
                                            <img class="home-image" src="images/home_images/factory3.png" alt="Third slide">
                                        </a>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="overlay-text">Welcome to the new Scuderia Ferrari parts store, please log in with your mechanic email to begin your order</div> 
                        </div>
                    </div>
                </div>
                <div class="parts-container">
                    <h1>Recently Ordered Parts</h1>

                    <div class="row part-row">
                        <?php foreach($parts as $part) { ?>
                            <div class="col-md-3">
                                <div class="part-card">
                                    <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>">
                                    <img class="part-card-image" src="./images/parts/<?php echo $part['part_image'];?>" alt="<?php echo $part['part_name'];?>">
                                    </a>
                                    <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>"><h3><?php echo $part['part_name'];?></h3></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <!-- Lightbox2 JS -->
            <script src="node_modules/lightbox2/src/js/lightbox.js"></script>

        </section>
    </div>
</body>