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
        <?php
            if($_POST['add-to-order']){
                $destination = $_POST["races"];
                $quantity = $_POST["quantity"];

                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                // add to cart and check for errors
                $error = "";
                if (isset($_SESSION['cart'][$part_id])) {
                    if( $_SESSION['cart'][$part_id] + $quantity > $part['quantity_in_stores']){
                        $error = "Not enough {$part['part_name']}s in stores";
                    } else {
                    $_SESSION['cart'][$part_id] += $quantity;
                    }
                } else {
                    if($quantity > $part['quantity_in_stores']){
                        $error = "Not enough {$part['part_name']}s in stores";
                    } else {
                    $_SESSION['cart'][$part_id] = $quantity;
                    }
                }
                if($error){
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <?php echo $error; ?>
                            <button class="alert-close" data-dismiss="alert">X</button>
                        </div>
                    <?php
                } else {
                    ?>
                        <div class="alert alert-success alert-dismissible">
                            Parts added to order!
                            <button class="alert-close" data-dismiss="alert">X</button>
                        </div>
                    <?php
                }
            }
            ?>
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
                <br><br>
                <form class="part-order-form" id="part-order-form" method="post" action="">
                    <label for="races">Destination:</label>
                    <select name="races" id="races">
                        <?php foreach($races as $race) {?>
                        <option value=<?php echo $race['circuit_name'];?>><?php echo $race['circuit_name'];?></option>
                        <?php } ?>
                    </select>
                    <br><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity">
                    <br><br>
                    <button type="submit" name="add-to-order" value="1">Add to Order</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</body> 