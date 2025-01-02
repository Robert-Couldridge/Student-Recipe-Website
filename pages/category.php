<?php
    $category_id = $_GET['id'];
    $Part = new Part($Conn);
    $parts = $Part->getPartsByCategoryId($category_id);
    $Category = new Category($Conn);
    $category_name = $Category->getCategoryNameFromId($category_id);
?>
<body id="page-category">
    <div class="container">
        <div class="parts-container">
            <h1><?php echo $category_name; ?></h1>

            <div class="row part-row">
                <!-- fill container with cards representing each part in the category -->
                <?php foreach($parts as $part) { ?>
                    <div class="col-md-3">
                        <div class="part-card">
                            <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>">
                            <img class="part-card-image" src="./images/parts/<?php echo $part['part_image'];?>" alt="<?php echo $part['part_name'];?>">
                            </a>
                            <a href="index.php?p=part&id=<?php echo $part['part_id']; ?>">
                                <h3><?php echo $part['part_name'];?></h3>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>