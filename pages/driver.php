<?php
$driver_id = $_GET['id'];
$Driver = new Driver($Conn);
$drivers = $Driver->getDriverById($driver_id);
$DriverSpec = new DriverSpec($Conn);
$suspension_stiffness = $DriverSpec->calculateSpecAverage($driver_id, "suspension_stiffness");
$brake_bias = $DriverSpec->calculateSpecAverage($driver_id, "brake_bias");
$differential_setting = $DriverSpec->calculateSpecAverage($driver_id, "differential_setting");
$suspension_stiffness = round($suspension_stiffness['avg'], 1);
$brake_bias = round($brake_bias['avg'], 1);
$differential_setting = round($differential_setting['avg'], 1);
$most_recent_comment_data = $DriverSpec->getMostRecentComment($driver_id);
$most_recent_comment = $most_recent_comment_data['comments'];
$most_recent_comment_email = $most_recent_comment_data['user_email'];
if(isset($_POST['submit-specification'])){
    $DriverSpec->createSpec($driver_id, $_POST);
}
?>

<body id="driver">

<?php foreach($drivers as $driver) {?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="driver_full_length_image" src="./images/<?php echo $driver['image_full_length'];?>" alt="<?php echo $driver['name'];?>">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h1 class="driver-name"><?php echo $driver['name'];?></h1>
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
                <br><br>
                    <h3>Driver Specifications</h3>
                    <ul class="specifications-list">
                        <li>Suspension Stiffness <?php echo $suspension_stiffness; ?></li>
                        <li>Brake Bias <?php echo $brake_bias; ?></li>
                        <li>Differential Setting <?php echo $differential_setting; ?></li>
                    </ul>
                    <div class="specification-form">
                        <?php if(isset($_SESSION['is_loggedin'])){?>
                            <form method="post" action="">
                                <label for="suspension_stiffness">Suspension Stiffness</label>
                                <select id="suspension_stiffness" name="suspension_stiffness">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <label for="brake_bias">Brake Bias</label>
                                <select id="brake_bias" name="brake_bias">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <label for="differential_setting">Differential Setting</label>
                                <select id="differential_setting" name="differential_setting">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <input type="text" id="comments" name="comments" placeholder="mechanic comments">
                                <button type="submit" name="submit-specification">Submit Specification</button>
                            </form>
                        <?php } else {
                            ?><p>only logged in mechanics can update driver specifications</p><?php
                        } ?>
                    </div>
                    <br></br>
                    <div class="mechanic-comments">
                        <?php if($most_recent_comment_data){?>
                            <h3>Mechanics' Notes</h3>
                            <p><?php echo "$most_recent_comment_email : $most_recent_comment"?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</body> 