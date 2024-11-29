<?php
$Part = new Part($Conn);
$parts = $Part->getAllParts();
$Driver = new Driver($Conn);
$drivers = $Driver->getAllDrivers();
?>

<body id="formula1">

    <div class="container">
        <h2>Formula 1 Drivers</h2>

        <div class="row">
            <?php foreach($drivers as $driver) { ?>
                <div class="col-md-6">
                    <div class="driver-card">
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
        <h2>Formula 1 Parts</h2>

        <div class="row">
            <?php foreach($parts as $part) { ?>
                <div class="col-md-3">
                    <div class="part-card">
                        <img class="part-card-image" src="./images/<?php echo $part['part_image'];?>">
                        <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>"><h3><?php echo $part['part_name'];?></h3></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <section id="next-race">
            <h2>Formula 1 Race Calendar</h2>
            <div class="next-race"></div>
            <script src="src/js/next_race.js"></script>
        </section>
    </div>
</body>