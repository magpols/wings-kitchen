<?php

function showAllCategories()
{

    global $connection;

?>

    <div class="">
        <ul class="">

            <?php
            $query = "SELECT * FROM tbl_category";
            $all_categories = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($all_categories)) {
                $id = $row['id'];
                $title = $row['title'];
                $image = $row['image_name'];
                $active = $row['active'];
                $featured = $row['featured'];

            ?>

                <li><a href="#">
                        <php? echo $title; ?>
                    </a></li>

            <?php
            }
            ?>

        </ul>
    </div>

<?php
}

?>