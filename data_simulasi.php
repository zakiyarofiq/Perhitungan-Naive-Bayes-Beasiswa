<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="img/nbc.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- font awsome -->
  <link rel="stylesheet" href="css/fontawesome.css" />
  <link rel="stylesheet" href="css/brands.css" />
  <link rel="stylesheet" href="css/solid.css" />

  <link rel="stylesheet" href="css/gaya.css">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/datatables.css">

  <title>Naive Bayes</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/nbc.png" alt="" width=50 height=50>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Naive Bayes</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="data_simulasi.php">Data Set <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style='margin-top:90px'>
    <div class="row">
      <div class="col-12 mt-5">
        <h2 class="tebal">List Data Set</h2><br>
        <table id="dataLatih" class="display pt-3 mb-3">
          <thead>
            <tr>
              <th>No</th>
              <th>Penghasilan</th>
              <th>Tanggungan</th>
              <th>Rumah</th>
              <th>Prestasi</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = 'data.json';
            $json = file_get_contents($data);
            $hasil = json_decode($json, true);

            $no = 1;
            foreach ($hasil as $hasil) {

              if ($hasil['status'] == 1) {
                $stt = "diterima";
              } else {
                $stt = "ditolak";
              }

              if ($hasil['penghasilan'] == "p1") {
                $pgh = "Rp. 100.000 - Rp. 2.000.000";
              } else if ($hasil['penghasilan'] == "p2") {
                $pgh = "Rp. 2.000.000 - Rp.3.500.000";
              } else if ($hasil['penghasilan'] == "p3") {
                $pgh = "Rp. 3.500.000 - Rp. 5.000.000";
              } else if ($hasil['penghasilan'] == "p4") {
                $pgh = "> Rp. 5.000.000";
              }

              if ($hasil['tanggungan'] == "t1") {
                $tun = "1";
              } else if ($hasil['tanggungan'] == "t2") {
                $tun = "2";
              } else if ($hasil['tanggungan'] == "t3") {
                $tun = ">2";
              }

              if ($hasil['prestasi'] == "pp1") {
                $pre = "0";
              } else if ($hasil['prestasi'] == "pp2") {
                $pre = "1";
              } else if ($hasil['prestasi'] == "pp3") {
                $pre = "2";
              } else if ($hasil['prestasi'] == "pp4") {
                $pre = ">2";
              }
            ?>

              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $pgh; ?></td>
                <td><?php echo $tun; ?></td>
                <td><?php echo $hasil['rumah']; ?></td>
                <td><?php echo $pre; ?></td>
                <td><?php
                    if ($stt == "diterima") {
                      echo "<span class='badge badge-success' style='padding:10px'>diterima</span>";
                    } else {
                      echo "<span class='badge badge-danger' style='padding:10px'>ditolak</span>";
                    }
                    ?></td>
              </tr>

            <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="page-footer font-small abu1 mt-5">

    <!-- Footer Elements -->
    <div class="container">

      <!-- Grid row-->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-12 py-5">
          <div class="mb-5 d-flex justify-content-center">
          </div>

          <div class="text-center">
            Made with <i class="fa fa-heart" style="color:#dc3545"></i> in Malang
          </div>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>

  </footer>
  <!-- Footer -->


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="jspopper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/datatables.js"></script>

  <!-- validasi -->
  <script>
    $(document).ready(function() {
      $('.toggle').click(function() {
        $('ul').toggleClass('active');
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#dataLatih').dataTable({
        "pageLength": 50
      });
    });
  </script>

</body>

</html>