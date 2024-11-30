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
                <img class="driver_full_length_image" src="./images/<?php echo $driver['image_full_length'];?>">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2 class="driver-name"><?php echo $driver['name'];?></h2>
                    <ul class="driver-stats-list">
                        <li><i class="bi bi-calendar-event-fill"></i> Born: <?php echo $driver['born'];?></li>
                        <li><i class="bi bi-duffle"></i> Weight: <?php echo $driver['weight'];?>kg</li>
                        <li><i class="bi bi-arrows-vertical"></i> Height: <?php echo $driver['height'];?>m</li>
                        <li><i class="bi bi-flag-fill"></i> Country: <?php echo $driver['country'];?></li>
                    </ul>
                </div>
                <div>
                    <table class="driver-stats-table">
                        <tr>
                            <th>Race Wins</th>
                            <th>Pole Postitions</th>
                            <th>Grand Prix</th>
                        </tr>
                        <tr>
                            <td><?php echo $driver['race_wins'];?></td>
                            <td><?php echo $driver['pole_positions'];?></td>
                            <td><?php echo $driver['grand_prix'];?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</body> 