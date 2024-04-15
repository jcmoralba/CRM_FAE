

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="css/style_index_1.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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

  <!-- ================ Order Details List ================= -->
  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

  <script>
const xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }, { 
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>

    <!-- ================= New Customers ================ -->
    <canvas id="myChart1" style="width:100%;max-width:600px; margin-left:300px;"></canvas>
  <script>
    const xValues1 = [50,60,70,80,90,100,110,120,130,140,150];
const yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart1", {
  type: "line",
  data: {
    labels: xValues1,
    datasets: [{
      backgroundColor:"rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
 
});
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