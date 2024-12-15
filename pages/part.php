<?php
$part_id = $_GET['id'];
$Part = new Part($Conn);
$parts = $Part->getPartById($part_id);
$Race = new Race($Conn);
$races = $Race->getRacesByDate("2024-08-01");
?>

<body id="part">

<?php foreach($parts as $part) {?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="part-image" src="./images/<?php echo $part['part_image'];?>">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2><?php echo $part['part_name'];?></h2>
                    <h3>Description</h3>
                    <p><?php echo $part['description'];?></p>
                </div>
                <div>
                    <table class="parts-information-table">
                        <tr>
                            <th>Quantity in Stores</th>
                        </tr>
                        <tr>
                            <td><?php echo $part['quantity_in_stores'];?></td>
                        </tr>
                    </table>
                </div>
                <div class="race-selection">
                    <label for="races">Select Destination:</label>
                    <select name="races" id="races">
                        <?php foreach($races as $race) {?>
                        <option value=<?php echo $race['circuit_name'];?>><?php echo $race['circuit_name'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</body> 