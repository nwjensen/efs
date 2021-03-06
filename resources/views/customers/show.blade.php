@extends('app')
@section('content')

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
    $currentStockValue = 0;
    $currentStockPortfolioTotal = 0;
    $currentInvestmentPortfolio = 0;
    ?>


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
    $currentStockValue = 0;
    $currentStockPortfolioTotal = 0;
    $currentInvestmentPortfolio = 0;
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
                 @foreach($customer->stocks as $stock)
                    

<?php
       $ssymbol = $stock->symbol;
       

        $URL = "http://www.google.com/finance/info?q=NSE:" . $ssymbol;
        $file = fopen("$URL", "r");
        $r = "";
        do {
            $data = fread($file, 500);
            $r .= $data;
        } while (strlen($data) != 0);
        //Remove CR's from ouput - make it one line
        $json = str_replace("\n", "", $r);

        //Remove //, [ and ] to build qualified string
        $data = substr($json, 4, strlen($json) - 5);

        //decode JSON data
        $json_output = json_decode($data, true);
        //echo $sstring, "<br>   ";
        $price = "\n" . $json_output['l'];

     

        ?>



                    <tr>
                        <td>{{ $stock->symbol }}</td>
                        <td>{{ $stock->name }}</td>
                        <td>{{ $stock->shares }}</td>
                        <td>{{ $stock->purchase_price }}</td>
                        <td>{{ $stock->purchased }}</td>
                            <?php
                             $svalue = $stock->shares * $stock->purchase_price;
                             $stotal = $stotal + $svalue
                            ?>
                        <td>{{ $svalue }}</td>
                        
                        <td>{{ $price }}</td>
                            <?php
                             $currentStockValue = $stock->shares * $price;
                             $currentStockPortfolioTotal = $currentStockPortfolioTotal +  $currentStockValue
                             ?>
                       
                        <td>{{ $currentStockValue }}</td>
                            <?php
                             $svalue = 0;
                             $currentStockValue = 0;
                            ?>

                    </tr>
                 @endforeach
            </tbody>

</table>
<h4>Total of INITIAL stock portfolio ${{$stotal}}</h4>
<h4>Total of CURRENT stock portfolio ${{$currentStockPortfolioTotal}}</h4>
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
            </tr>
            </thead>
    
            <tbody>
                 @foreach($customer->investments as $investment)
                    <tr>
                        <td>{{ $investment->category }}</td>
                        <td>{{ $investment->description }}</td>
                        <td>{{ $investment->acquired_value }}</td>
                        <td>{{ $investment->acquired_date }}</td>
                        <td>{{ $investment->recent_value }}</td>
                        <td>{{ $investment->recent_date }}</td>


                        
                    </tr>
                      <?php
                       $ivalue = $ivalue + $investment->acquired_value 
                       ?>

                      <?php
                       $currentInvestmentPortfolio = $investment->recent_value + $currentInvestmentPortfolio
                       ?>

                       <?php
                            if ($investment->category == "401k")
                            $chart401kTotal = $chart401kTotal + $investment->recent_value;
                        ?>

                        <?php
                            if ($investment->category == "other")
                            $chartOtherTotal = $chartOtherTotal + $investment->recent_value;
                        ?>

                        <?php
                            if ($investment->category == "fund")
                            $chartFundTotal = $chartFundTotal + $investment->recent_value;
                        ?>

                        <?php
                            if ($investment->category == "property")
                            $chartPropertyTotal = $chartPropertyTotal + $investment->recent_value;
                        ?>
                 @endforeach
            </tbody>
    </table>
        <h4>Total of INITIAL investment portfolio ${{$ivalue}}</h4>
        <h4>Total of CURRENT investment portfolio ${{$currentInvestmentPortfolio}}</h4>
    </div>
 




 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Investments', 'Investment Mix'],
          ['Funds',     <?php echo  $chartFundTotal ?>],
          ['Properties',     <?php echo  $chartPropertyTotal ?>],
          ['Other',  <?php echo  $chartOtherTotal ?>],
          ['401k', <?php echo  $chart401kTotal ?>],
        ]);
        var options = {
          title: 'Current Investment Exposure'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, {width: 400, height: 240, is3D: true, title: 'Current Investment Mix'});
      }
    </script>





<br>

    <?php
        $iportfolio = $ivalue + $stotal
    ?>

    <?php
        $cportfolio = $currentInvestmentPortfolio + $currentStockPortfolioTotal
    ?>

<h2>Summary of Portfolio</h2>
 



 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["columnchart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Value', 'Initial', 'Current'],
          ['Portfolio Investment $',  <?php echo  $iportfolio ?>,     <?php echo  $cportfolio ?>]
        ]);
        var chart = new google.visualization.ColumnChart(document.getElementById('summary_chart'));
        chart.draw(data, {min:0, width: 400, height: 240, is3D: true, title: 'Current Portfolio Performance'});
      }
    </script>
  </head>

  <body>
    
  </body>

    <?php
        $netGain = 0;
        $netGain = $cportfolio - $iportfolio;
    ?>

<table style="width:90%" align="center">
  <tr>
    <th></th>
    <th></th>
  </tr>
  <tr>
    <td><div id="summary_chart"></div>
    <h6>Initial Portfolio Value: <b>${{$iportfolio}}</b></h6>
    <h6>Current Portfolio Value: <b>${{$cportfolio}}</b></h6>
    <h6>Net Gain: <b>${{$netGain}}</b></h6>
    </td>
    <td><div id="piechart"></div></td>
  </tr>
  </table>
   

   


@stop