<?php
    $Part = new Part($Conn);
?>
<body id="page-order">
    <div class="container">
        <div class="row">
            <div class="order-list">
                <h1>Current Order</h1>
                <?php foreach($_SESSION['order'] as $part_id => $part_entry) {?>
                    <h2>Part Name: <?php echo $part_id;?></h2>
                    <?php foreach($part_entry as $destination => $quantity){?>
                        <h3>Destination: <?php echo $destination;?></h3>
                        <h3>Quantity: <?php echo $quantity;?></h3>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
