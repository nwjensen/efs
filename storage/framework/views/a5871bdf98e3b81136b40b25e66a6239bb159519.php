<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eagle Financial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <a href="<?php echo e(action('CustomerController@index')); ?>">Customers</a> |
    <a href="<?php echo e(action('StockController@index')); ?>">Stocks</a> |
    <a href="<?php echo e(action('InvestmentController@index')); ?>">Investments</a>
</div>
<hr>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html>
