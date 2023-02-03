<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment</title>
    <!-- Include CSS file -->
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <!-- Warehouse display container -->
    <div class="row">
        <?php
        // Include Warehouse class file
        require_once('designClass.php');
        // Create new Warehouse object
        $warehouse = new Warehouse();

        // Call the display method to display the shelves
        echo $warehouse->display();
        ?>
    </div>
    <!-- Depot button container -->
    <div class="row">
       
        <button id="depot">GET ROUTE</button>
    </div>
    <!-- Container for routing result -->
    <div id="routing_result">

    </div>
</body>
<footer></footer>
<script src="assets/js/jquery.js"></script>
<script src="main.js"></script>

</html>