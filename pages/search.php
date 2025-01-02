<?php
    $query_string = $_POST['query'];
    $Part = new Part($Conn);
    $parts = $Part->searchParts($query_string);
?>
<body id="page-search">
    <div class="container">
        <div class="parts-container">

            <!-- Display the parts that match the search query  -->
            <h2>Search Results for "<?php echo $query_string;?>"</h2>

            <div class="row part-row">
                <?php foreach($parts as $part) { ?>
                    <div class="col-md-3">
                        <div class="part-card">
                            <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>">
                            <img class="part-card-image" src="./images/parts/<?php echo $part['part_image'];?>" alt="<?php echo $part['part_name'];?>">
                            </a>
                            <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>"><h3><?php echo $part['part_name'];?></h3></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>