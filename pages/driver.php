<?php
$driver_id = $_GET['id'];
$Driver = new Driver($Conn);
$drivers = $Driver->getDriverById($driver_id);
?>

<body id="driver">

<?php foreach($drivers as $driver) {?>
    <h2><?php echo $driver['driver_name'];?></h2>
<?php } ?>

</body> 