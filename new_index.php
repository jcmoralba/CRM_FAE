<?php require_once("includes/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="css/style_index_1.css">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
  rel="stylesheet"
/>



</head>

<body >
  <?php
  include 'sidebar.php';

  ?>

  <!-- ======================= Cards ================== -->


<!-- FOR TODAYS ADD PROSPECT -->
<?php
  $today = date("Y-m-d");

  $sql = "SELECT COUNT(*) AS added_today FROM new_prospect WHERE date_added = '$today'";
  $result = $con->query($sql);
  
  $added_today = 0;

  if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $added_today = $row['added_today'];
  }
?>

<!-- FOR TOTAL SALES -->
<?php
  $sql = "SELECT SUM(total_sales) AS total_sum FROM new_prospect";
  $result = $con->query($sql);
  if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $totalSum = $row['total_sum'];
    $formattedTotalSum = number_format($totalSum);
  }
?>

<!-- FOR EARNINGS -->
<?php
  $sql = "SELECT SUM(total_sales) AS total_sum FROM new_prospect WHERE `status` = 'Close Deals'";
  $result = $con->query($sql);
  if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $totalSum = $row['total_sum'];
    $formattedEarnings = number_format($totalSum);
  }
?>

<!-- FOR ITENERARY -->
<?php
  $currentMonth = date('F');

  $firstDayOfMonth = date('Y-m-01');
  $lastDayOfMonth = date('Y-m-t');

  $sql = "SELECT COUNT(*) AS itinerary_count FROM schedule_list 
          WHERE 
            start_datetime BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'
            OR end_datetime BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'";
  $result = $con->query($sql);
  if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $itineraryCount = $row['itinerary_count'];
  } else {
    $itineraryCount = 0;
  }
?>

  <div class="cardBox">
    <div class="card">
      <a href="new_prospect.php">
      <div>
        <div class="numbers"><?php echo $added_today; ?></div>
        <div class="cardName">Today's Added Prospect</div>
      </div>

      <div class="iconBx">
        <ion-icon name="eye-outline"></ion-icon>
      </div>
      </a>
    </div>

    <div class="card">
      <a href="new_prospect.php">
      <div>
        <div class="numbers"><?php echo "₱" . $formattedTotalSum; ?></div>
        <div class="cardName">Gross Sales</div>
      </div>

      <div class="iconBx">
        <ion-icon name="cart-outline"></ion-icon>
      </div>
      </a>
    </div>

    <div class="card">
      <a href="event-calendar.php">
      <div>
        <div class="numbers"><?php echo $itineraryCount ?></div>
        <div class="cardName">Itenerary for this <?php echo $currentMonth ?></div>
      </div>

      <div class="iconBx">
        <ion-icon name="chatbubbles-outline"></ion-icon>
      </div>
      </a>
    </div>

    <div class="card">
      <a href="client_list.php">
      <div>
        <div class="numbers"><?php echo "₱" . $formattedEarnings; ?></div>
        <div class="cardName">Total Earning</div>
      </div>

      <div class="iconBx">
        <ion-icon name="cash-outline"></ion-icon>
      </div>
      </a>
    </div>
  </div>

  <div id="chart"></div>

  <?php
  $sql = "SELECT date_added FROM new_prospect";
  $result = $con->query($sql);
  if ($result->rowCount() > 0) {
    $sales = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $date = $row["date_added"];
      if (!isset($sales[$date])) {
        $sales[$date] = 1;
      } else {
        $sales[$date]++;
      }
      }
    }
  ?>

<div id="chart-container" style="display: flex; justify-content: space-between; ">
  <div id="area-chart" style="width: 50%; box-shadow: 0px 0px 84px 0px rgba(0,0,0,0.1); margin: 20px 10px 20px 30px; border-radius: 15px;"></div>
  <div id="pie-chart-container" style="width: 50%; box-shadow: 0px 0px 84px 0px rgba(0,0,0,0.1); margin: 20px 30px 20px 10px; display: grid; place-items: center; border-radius: 15px;">
  <div id="pie-chart"></div>
</div>

</div>

  <script>
    // Area Chart
    var salesData = <?php echo json_encode($sales); ?>;

    var dates = Object.keys(salesData);
    var counts = Object.values(salesData);
    
    var maxCount = Math.max(...counts);

    var formattedDates = dates.map(function(date) {
      var d = new Date(date);
      var options = { year: 'numeric', month: 'long', day: 'numeric' };
      return d.toLocaleDateString('en-US', options);
    });

    var areaOptions = {
      chart: {
        type: 'area',
        height: '400px',
        width: '100%'
      },
      series: [{
        name: 'Added Prospect',
        data: counts
      }],
      xaxis: {
        categories: formattedDates
      },
      yaxis: {
        min: 1,
        max: maxCount,
        forceNiceScale: true
      },
      stroke: {
        curve: 'smooth',
      },
      fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.7,
          opacityTo: 0.9,
          stops: [0, 90, 100]
        }
      },
    };

    var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaOptions);
    areaChart.render();
  </script>



  <?php
    $quota = 100000; // dapat nababago to
    $sql = "SELECT SUM(total_sales) AS total_sum FROM new_prospect";
    $result = $con->query($sql);
    if ($result->rowCount() > 0) {
      $row = $result->fetch(PDO::FETCH_ASSOC);
      $totalSum = $row['total_sum'];
      $remainingQuota = $quota - $totalSum;
    }
  ?>


  <script>
    // Pie Chart
    var pieOptions = {
      chart: {
        type: 'pie',
        height: '400px',
        width: '500px'
      },
      series: [<?php echo $totalSum; ?>, <?php echo $remainingQuota; ?>], 
      labels: ['Total Sales', 'Remaining Quota'], 
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
    };

    var pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieOptions);
    pieChart.render();
  </script>



























  <!-- ================ Order Details List ================= -->
  <!-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> -->

  <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>

 

  <!-- =========== Scripts =========  -->
  <script src="js/main.js"></script>

  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>