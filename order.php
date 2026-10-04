<?php include('partials-front/navigation.php'); ?>

<!-- Order Section Starts Here -->
<div class="container">

    <div class="row">
        <div class="col">
            <h2 class="text-center mb-5">Complete Form to Confirm Order:</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <?php include('partials-front/order_selected_food.php'); ?>
            <?php include('cart.php'); ?>
        </div>

        <div class="col-6">
            <?php include('partials-front/order_food_list.php'); ?>
        </div>
    </div>
    <hr>

    <div class="row">

        <div class="col">
            <?php include('partials-front/order_contact_info.php'); ?>
        </div>
    </div>

</div>


<?php include('partials-front/footer.php'); ?>