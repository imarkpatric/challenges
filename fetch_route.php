<?php
require_once('getRoute.php');
$warehouse = new Warehouse();
$warehouse->processShelf($_POST['shelf']);
echo $warehouse->getSteps();