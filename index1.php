<?php
    include "sidebar.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/charts/chart-1/assets/css/chart-1.css">
</head>
<body>
    <div class="ml-64">
    <h1>today's total added new prospect/customer/client:0</h1>
    <h1>todays overall sales:0</h1>
    </div>

    <!-- Chart 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8">
        <div class="card widget-card border-light shadow-sm">
          <div class="card-body p-4">
            <div class="d-block d-sm-flex align-items-center justify-content-between mb-3">
              <div class="mb-3 mb-sm-0">
                <h5 class="card-title widget-card-title">Sales Overview</h5>
              </div>
              <div>
                <select class="form-select text-secondary border-light-subtle">
                  <option value="1">March 2023</option>
                  <option value="2">April 2023</option>
                  <option value="3">May 2023</option>
                  <option value="4">June 2023</option>
                </select>
              </div>
            </div>
            <div id="bsb-chart-1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://unpkg.com/bs-brain@2.0.3/components/charts/chart-1/assets/controller/chart-1.js"></script>
</html>