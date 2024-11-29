<?php
$driver_id = $_GET['id'];
$Driver = new Driver($Conn);
$drivers = $Driver->getDriverById($driver_id);
?>

<body id="driver">

<?php foreach($drivers as $driver) {?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="./images/<?php echo $driver['driver_image_full_length'];?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo $driver['driver_name'];?></h2>
                <ul class="driver-stats">
                    <li>Born: <?php echo $driver['born'];?></li>
                    <li>Weight: <?php echo $driver['weight'];?>kg</li>
                    <li><i class="bi bi-rulers"></i>Height: <?php echo $driver['height'];?>m</li>
                    <li>Country: <?php echo $driver['country'];?></li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>

</body> 