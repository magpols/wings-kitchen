<?php include('partials-front/navigation.php'); ?>

<!-- Food Search Section Starts Here -->
<?php include('partials-front/food_search_box.php'); ?>

<!-- Food Search Section Ends Here -->


<!-- Food Menu Section Starts Here -->

<div class="container">
    <h1>Explore Our Menu</h1>
    <br><br>

    <?php

    if (isset($_GET['category_name'])) {
        $cat_id = $_GET['category_name'];
    ?>
        <h2><?php echo $cat_id; ?></h2>

        <?php
        $query = "SELECT * FROM tbl_category WHERE title='$cat_id' ";
        $select_category_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_category_query)) {
            $cat_id = $row['id'];

            $query2 = "SELECT * FROM tbl_food WHERE category_id='$cat_id' AND active='Yes' ";
            $food_query = mysqli_query($connection, $query2);
        ?>

            <div class="row">
                <?php
                while ($row2 = mysqli_fetch_assoc($food_query)) {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    $featured = $row2['featured'];
                ?>


                    <div class="card col-xs-12 col-sm-6 col-md-4 col-lg-3 p-2">
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="card-img-top" alt="...">
                        <div class="card-body text-left ">
                            <h3 class="card-title"><?php echo $title; ?></h3>
                            <h4 class="card-title">$<?php echo $price; ?></h4>
                            <p class="card-text"><?php echo $description; ?></p>
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
    <?php
        }
    } else {
        include('partials-front/view_all_foods.php');
    }

    include('partials-front/category_buttons.php');

    ?>
</div>
<!-- Food Menu Section Ends Here -->



<?php include('partials-front/footer.php'); ?>