<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts for Admins</title>
    <link rel="stylesheet" href="../assets/css/chart.css">
    <script defer type="text/javascript" src="../assets/js/chart.js"></script>
    <!-- Chart.js  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div>

<!--Nav -->

<!-- kraj nava-->

<div class="container container-1"> 
  <h1>Izvestaj koji prikazuje ukupan broj prodatih primeraka svake knjige:</h1>
  <canvas  id="myChart"></canvas>
</div>
 


<div class="container container-2"> 
  <h1>Izvestaj koji prikazuje ukupan doprinos u profitu  po kategoriji:</h1>
  <canvas  id="myChart2"></canvas>
</div>

<div class="container container-3"> 
  
<h4 style="margin-bottom:50px;">Unesite datum za period koji zelite da analizirate:</h4>
  <label>From:</label>
  <input class="from" style="margin-bottom:2rem; margin-right:2rem" placeholder="yyyy-mm-dd" type="text" />

  <label>To:</label>
  <input class="to" placeholder="yyyy-mm-dd" type="text" />

  <button type="button" class="datum-btn btn-primary">submit</button>

  
  <canvas  id="myChart3"></canvas>
</div>

</div>
</body>
</html>