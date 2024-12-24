<?php
$Part = new Part($Conn);
$parts = $Part->getAllParts();
$Driver = new Driver($Conn);
$drivers = $Driver->getDriversByDiscipline("Formula 1");
?>

<body id="page-formula1">

    <div class="container">
        <h1>Formula 1 Drivers</h1>

        <div class="row">
            <?php foreach($drivers as $driver) { ?>
                <div class="col-md-6">
                    <div class="driver-card driver-card-f1">
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
        <div class="parts-container">
            <h1>Formula 1 Parts</h1>

            <div class="row part-row">
                <?php foreach($parts as $part) { ?>
                    <div class="col-md-3">
                        <div class="part-card">
                            <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>">
                            <img class="part-card-image" src="./images/parts/<?php echo $part['part_image'];?>">
                            </a>
                            <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>"><h3><?php echo $part['part_name'];?></h3></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>