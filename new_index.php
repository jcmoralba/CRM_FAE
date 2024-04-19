<?php require_once("includes/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="css/style_index_1.css">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />


  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />


</head>

<body>
  <?php
  include 'sidebar.php';

  ?>

  <!-- ======================= Cards ================== -->
  <div class="cardBox">
    <div class="card">
      <div>
        <div class="numbers">1,504</div>
        <div class="cardName">Daily Views</div>
      </div>

      <div class="iconBx">
        <ion-icon name="eye-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers">80</div>
        <div class="cardName">Sales</div>
      </div>

      <div class="iconBx">
        <ion-icon name="cart-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers">284</div>
        <div class="cardName">Comments</div>
      </div>

      <div class="iconBx">
        <ion-icon name="chatbubbles-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers">$7,842</div>
        <div class="cardName">Earning</div>
      </div>

      <div class="iconBx">
        <ion-icon name="cash-outline"></ion-icon>
      </div>
    </div>
  </div>

  <div id="chart" ></div> 

  <?php
  $sql = "SELECT prospect_id, company_name, item_deals, `status`, remark, pdf, total_sales , last_contacted  FROM new_prospect";
  $result = $con->query($sql);
  if ($result->rowCount() > 0) {
    $sales = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $sales[] = $row["total_sales"]; 
      $company[] = $row["company_name"];
    }
  }

  // echo print_r($sales);
  ?>

  <!-- ================ Order Details List ================= -->
  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

  <script>
    //setup block
    const sales = <?php echo json_encode($sales); ?>;
    const company = <?php echo json_encode($company); ?>;
    const data = {
      labels: company,
      datasets: [{
        label: '# of Sales',
        data: sales,
        borderWidth: 1
      }]
    };
    //config block
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }

    };

    //render block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );


    const ctx = document.getElementById('myChart');

    new Chart(ctx, {

    });
  </script>

  </script>

  <!-- ================= New Customers ================ -->
 
    <script> // apex chart
        var options = {
  chart: {
    height: 380,
    type: "area"
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "Series 1",
      data: sales
    }
  ],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100]
    }
  },
  xaxis: {
    categories: company
  }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

      
    </script>
  <canvas id="myChart2" style="width:100%;max-width:600px; margin-left: 600px; margin-top:800px;"></canvas>

  <script>
    var xValues2 = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues2 = [55, 49, 44, 24, 15];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];

    new Chart("myChart2", {
      type: "pie",
      data: {
        labels: xValues2,
        datasets: [{
          backgroundColor: barColors,
          data: yValues2
        }]
      },
      options: {
        title: {
          display: true,
          text: "World Wide Wine Production 2018"
        }
      }
    });
  </script>

  <!-- =========== Scripts =========  -->
  <script src="js/main.js"></script>

  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>