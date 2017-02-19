<?php $__env->startSection('content'); ?>
    <h1>Customer</h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
      </table>
    </div>

<br>

            <?php
    $stockprice=null;
    $stotal = 0;
    $svalue=0;
    $itotal = 0;
    $ivalue=0;
    $iportfolio = 0;
    $cportfolio = 32000;
    $chartFundTotal = 0;
    $chart401kTotal = 0;
    $chartOtherTotal = 0;
    $chartPropertyTotal = 0;
    ?>


    <h2>Stocks</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Original Value</th>
                <th>Current Price</th>
                <th>Current Value</th>
            </tr>
            </thead>

            <tbody>
                 <?php foreach($customer->stocks as $stock): ?>
                    <tr>
                        <td><?php echo e($stock->symbol); ?></td>
                        <td><?php echo e($stock->name); ?></td>
                        <td><?php echo e($stock->shares); ?></td>
                        <td><?php echo e($stock->purchase_price); ?></td>
                        <td><?php echo e($stock->purchased); ?></td>
                    <?php
                       $svalue = $stock->shares * $stock->purchase_price;
                       $stotal = $stotal + $svalue
                       ?>
                        <td><?php echo e($svalue); ?></td>
                    
                    <?php

                        $svalue = 0
                       ?>

                    </tr>
                 <?php endforeach; ?>
            </tbody>

</table>
<h4>Total of INITIAL stock portfolio $<?php echo e($stotal); ?></h4>
<h4>Total of CURRENT stock portfolio ________</h4>
</div>


<br>
    


    <h2>Investments</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Category</th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value</th>
                <th>Recent Date</th>
                <th>Current Price</th>
                <th>Current Value</th>
            </tr>
            </thead>
    
            <tbody>
                 <?php foreach($customer->investments as $investment): ?>
                    <tr>
                        <td><?php echo e($investment->category); ?></td>
                        <td><?php echo e($investment->description); ?></td>
                        <td><?php echo e($investment->acquired_value); ?></td>
                        <td><?php echo e($investment->acquired_date); ?></td>
                        <td><?php echo e($investment->recent_value); ?></td>
                        <td><?php echo e($investment->recent_date); ?></td>


                        
                    </tr>
                      <?php
                       $ivalue = $ivalue + $investment->acquired_value 
                       ?>

                       <?php
                            if ($investment->category == "401k")
                            $chart401kTotal = $chart401kTotal + $investment->acquired_value;
                        ?>

                        <?php
                            if ($investment->category == "other")
                            $chartOtherTotal = $chartOtherTotal + $investment->acquired_value;
                        ?>

                        <?php
                            if ($investment->category == "fund")
                            $chartFundTotal = $chartFundTotal + $investment->acquired_value;
                        ?>

                        <?php
                            if ($investment->category == "property")
                            $chartPropertyTotal = $chartPropertyTotal + $investment->acquired_value;
                        ?>
                 <?php endforeach; ?>
            </tbody>
    </table>
        <h4>Total of INITIAL investment portfolio $<?php echo e($ivalue); ?></h4>
        <h4>Total of CURRENT investment portfolio ________</h4>
    </div>
 




 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Investments', 'Asset Mix'],
          ['Funds',     <?php echo  $chartFundTotal ?>],
          ['Properties',     <?php echo  $chartPropertyTotal ?>],
          ['Other',  <?php echo  $chartOtherTotal ?>],
          ['401k', <?php echo  $chart401kTotal ?>],
        ]);

        var options = {
          title: 'Initial Investment Mixture'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, {width: 400, height: 240, is3D: true, title: 'Initial Investment Mixture'});
      }
    </script>

<div id="piechart" style="width: 900px; height: 500px;"></div>
     



<br>

    <?php
        $iportfolio = $ivalue + $stotal
    ?>

<h2>Summary of Portfolio</h2>
    <h4>Total of INITIAL portfolio value $<?php echo e($iportfolio); ?></h4>
    <h4>Total of CURRENT portfolio value ________</h4>

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["columnchart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Value', 'Initial', 'Current'],
          ['Portfolio',  <?php echo  $iportfolio ?>,     <?php echo  $cportfolio ?>]
        ]);

        var chart = new google.visualization.ColumnChart(document.getElementById('summary_chart'));
        chart.draw(data, {width: 400, height: 240, is3D: true, title: 'Portfolio Performance'});
      }
    </script>
  </head>

  <body>
    <div id="summary_chart"></div>
  </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>