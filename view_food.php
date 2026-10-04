<?php include('partials-front/navigation.php'); ?>


<?php

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM tbl_food WHERE title LIKE '%$search%'  OR description LIKE '%$search%' ";
    $search_query = mysqli_query($connection, $query);

    if (!$search_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $count = mysqli_num_rows($search_query);

    if ($count == 0) {
        echo "<h1>No Result</h1>";
    } else {
        while ($row = mysqli_fetch_assoc($search_query)) {
            $id = $row['id'];
            $title = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
            $image_name = $row['image_name'];
?>

            <div class="container mx-auto col-4">
                <div class="text-center">
                    <h1>Search Result: </h1>
                    <?php

                    if ($image_name == "") {
                    ?>
                        <img class="img-responsive" src="<?php echo SITEURL; ?>images/food/not_available.jpg" alt="not_available">
                    <?php
                    } else {
                    ?>
                        <img class="img-responsive" src="images/food/<?php echo $image_name; ?>" alt="">
                    <?php
                    }
                    ?>

                    <h2 class="py-4"><?php echo $title; ?></h2>
                    <h4>$<?php echo $price; ?></h4>
                    <h4 class="py-4"><?php echo $description; ?></h4>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order</a>
                    <a href="<?php echo SITEURL; ?>" class="btn btn-secondary">Return to Home</a>

                </div>

            </div>

        <?php
        }
    }
}

if (isset($_GET['view'])) {
    $search_food_id = $_GET['view'];
    $query2 = "SELECT * FROM tbl_food WHERE id = '$search_food_id' ";
    $view_query = mysqli_query($connection, $query2);

    while ($row2 = mysqli_fetch_assoc($view_query)) {
        $id = $row2['id'];
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $image_name = $row2['image_name'];
        ?>

        <div class="container mx-auto col-4">
            <div class="text-center">
                <h1>Search Result: </h1>
                <?php

                if ($image_name == "") {
                ?>
                    <img class="img-responsive" src="<?php echo SITEURL; ?>images/food/not_available.jpg" alt="not_available">
                <?php
                } else {
                ?>
                    <img class="img-responsive" src="images/food/<?php echo $image_name; ?>" alt="">
                <?php
                }
                ?>

                <h2 class="py-4"><?php echo $title; ?></h2>
                <h4>$<?php echo $price; ?></h4>
                <h4 class="py-4"><?php echo $description; ?></h4>

                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order</a>
                <a href="<?php echo SITEURL; ?>" class="btn btn-secondary">Return to Home</a>

            </div>

        </div>

<?php
    }
}

?>

<?php include('partials-front/footer.php'); ?>