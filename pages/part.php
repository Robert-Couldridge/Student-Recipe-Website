<?php
$part_id = $_GET['id'];
$Part = new Part($Conn);
$parts = $Part->getPartById($part_id);
?>

<body id="part">

<?php foreach($parts as $part) {?>
    <h2><?php echo $part['part_name'];?></h2>
<?php } ?>

</body> 