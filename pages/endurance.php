<?php
$Part = new Part($Conn);
$parts = $Part->getAllParts();
$Driver = new Driver($Conn);
$drivers = $Driver->getDriversByDiscipline("Endurance");
?>

<body id="page-endurance">
    <div class="container">
        <h2>Endurance Drivers</h2>

        <div class="row">
            <?php foreach($drivers as $driver) { ?>
                <div class="col-md-4">
                    <div class="driver-card driver-card-endurance">
                        <a href="index.php?p=driver&id=<?php echo $driver['driver_id']; ?>">
                            <img class="driver-card-image" src="./images/<?php echo $driver['image'];?>">
                        </a>
                        <a href="index.php?p=driver&id=<?php echo $driver['driver_id']; ?>"><h3><?php echo $driver['name'];?></h3></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Number 50</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="hypercar-image mb-4" style="background-image: url(images/499P_50_1.webp);">
                            <a class="hypercar-lightbox" href="./images/499P_50_1.webp" data-lightbox="hypercar-imgs"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hypercar-image mb-4" style="background-image: url(images/499P_50_2.avif);">
                            <a class="hypercar-lightbox" href="./images/499P_50_2.avif" data-lightbox="hypercar-imgs"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hypercar-image mb-4" style="background-image: url(images/499P_50_3.jpg);">
                            <a class="hypercar-lightbox" href="./images/499P_50_3.jpg" data-lightbox="hypercar-imgs"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Number 51</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="hypercar-image mb-4" style="background-image: url(images/499P_51_1.webp);">
                            <a class="hypercar-lightbox" href="./images/499P_51_1.webp" data-lightbox="hypercar-imgs"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hypercar-image mb-4" style="background-image: url(images/499P_51_2.webp);">
                            <a class="hypercar-lightbox" href="./images/499P_51_2.webp" data-lightbox="hypercar-imgs"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hypercar-image mb-4" style="background-image: url(images/499P_51_3.jpg);">
                            <a class="hypercar-lightbox" href="./images/499P_51_3.jpg" data-lightbox="hypercar-imgs"></a>
                        </div>
                    </div>
            </div>
        </div>
        <h2>WEC Race Calendar</h2>
    </div>
</body>