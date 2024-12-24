<?php
    $part_id = $_GET['id'];
    $Part = new Part($Conn);
    $parts = $Part->getPartById($part_id);
    $Race = new Race($Conn);
    $races = $Race->getRacesByDate("2024-08-01");
    $Category = new Category($Conn);
?>
<body id="part">
<?php foreach($parts as $part) {?>
    <div class="container">
        <?php
            if(isset($_POST['add-to-order'])){
                $post_destination = $_POST["races"];
                $post_quantity = $_POST["quantity"];

                if (!isset($_SESSION['order'])) {
                    $_SESSION['order'] = [];
                }
                // add to order and check for errors
                $error = "";
                if (isset($_SESSION['order'][$part['part_name']])) {
                    $quantity_in_order = 0;
                    foreach($_SESSION['order'][$part['part_name']] as $destination => $destination_quantity){
                        $quantity_in_order += $destination_quantity;
                    }
                    if( $quantity_in_order + $post_quantity > $part['quantity_in_stores']){
                        $error = "Not enough {$part['part_name']}s in stores";
                    } else {
                        if (isset($_SESSION['order'][$part['part_name']][$post_destination])){
                            $_SESSION['order'][$part['part_name']][$post_destination] += $post_quantity;
                        } else {
                            $_SESSION['order'][$part['part_name']][$post_destination] = $post_quantity;
                        }
                    }
                } else {
                    if($post_quantity > $part['quantity_in_stores']){
                        $error = "Not enough {$part['part_name']}s in stores";
                    } else {
                    $_SESSION['order'][$part['part_name']][$post_destination] = $post_quantity;
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
                <img class="part-image" src="./images/parts/<?php echo $part['part_image'];?>">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h1><?php echo $part['part_name'];?></h1>
                    <a href="index.php?p=category&id=<?php echo $part['category_id']; ?>">
                        <h2><?php echo $Category->getCategoryNameFromId($part['category_id']); ?></h2>
                    </a>
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
                <?php if(isset($_SESSION['is_loggedin'])){?>
                <form class="part-order-form" id="part-order-form" method="post" action="">
                    <label for="races">Destination:</label>
                    <select name="races" id="races">
                        <?php if($_SESSION['user_data']['user_level'] == "lead mechanic"){?>
                            <option value="stores">Stores</option>
                        <?php } ?>
                        <?php foreach($races as $race) {?>
                        <option value="<?php echo $race['circuit_name'];?>"><?php echo $race['circuit_name'];?></option>
                        <?php } ?>
                    </select>
                    <br><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity">
                    <br><br>
                    <button type="submit" class="btn-outline-success btn ms-2 btn-ferrari" name="add-to-order" value="1">Add to Order</button>
                </form>
                <?php } else {?>
                    <h3>log in to order parts</h3>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

</body> 