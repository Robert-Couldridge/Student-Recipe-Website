<?php
    $Part = new Part($Conn);
    $MailHandler = new MailHandler();
?>  
<body id="page-order">
    <div class="container">
        <?php
            if(isset($_POST['submit-order'])){
                $order_failed = false;
                $_SESSION['order-email'] = $_SESSION['order'];
                foreach($_SESSION['order'] as $part_name => $part_entry){
                    $attempt = $Part->orderParts($part_name, $part_entry['total_part_quantity']);

                    if($attempt){
                        unset($_SESSION['order'][$part_name]); 
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <?php echo $part_name?> order placed!
                                <button class="alert-close" data-dismiss="alert">X</button>
                            </div>
                        <?php
                    }else{
                        $order_failed = true;
                        unset($_SESSION['order-email'][$part_name]);
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php echo $part_name?> order failed, please try again.
                                <button class="alert-close" data-dismiss="alert">X</button>
                            </div>
                        <?php
                    }
                }
                if (!$order_failed){
                    $MailHandler->sendOrderConfirmationEmail($_SESSION['user_data']['email'], $_SESSION['order-email']);
                    unset($_SESSION['order']);
                }
            }
            if(isset($_POST['cancel-order'])){
                unset($_SESSION['order']);
                echo '<meta http-equiv="refresh" content="0;url=index.php?p=order">';
            }
        ?>
        <div class="row">
        <?php if(isset($_SESSION['order'])){ ?>
            <div class="order-list">
                <h2>Current Order</h2>
                <?php foreach($_SESSION['order'] as $part_name => $part_entry) {
                    $total_part_quantity = 0;?>
                    <h3>Part Name: <?php echo $part_name;?></h3>
                    <?php foreach($part_entry as $destination => $quantity){
                        if ($destination != 'total_part_quantity'){
                        $total_part_quantity += $quantity;?>
                        <p>Destination: <?php echo $destination;?></p>
                        <p>Quantity: <?php echo $quantity;?></p>
                    <?php }} ?>
                    <h4>Total: <?php echo $total_part_quantity;?></h4>
                    <?php
                    $_SESSION['order'][$part_name]['total_part_quantity'] = $total_part_quantity;
                    }?>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form class="order-submit-form" id="order-submit-form" method="post" action="">
                    <button type="submit" name="submit-order" value="1">Submit Order</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form class="order-cancel-form" id="order-cancel-form" method="post" action="">
                    <button type="submit" name="cancel-order" value="1">Cancel Order</button>
                    </form>
                </div>
            </div>
        <?php } else {
            if(isset($_SESSION['is_loggedin'])){
            ?><h3 class="order-list">No items in order</h3><?php 
            } else {
                ?><h3 class="order-list">Log in to create an order</h3><?php
            }}?>
        </div>
    </div>
</body>
