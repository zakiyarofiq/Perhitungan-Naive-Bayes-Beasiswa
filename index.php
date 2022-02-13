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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Naive Bayes
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_simulasi.php">Data Set</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style='margin-top:90px'>
    <div class="row">
      <div class="col-12 mt-5">
        <h2 class="tebal">Naive Bayes</h2>
        <p class="desc mt-4">Naïve Bayes Classifier merupakan sebuah metoda klasifikasi yang berakar pada teorema Bayes.
          Metode pengklasifikasian dengan menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes,
          yaitu memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes.
          Ciri utama dr Naïve Bayes Classifier ini adalah asumsi yang sangat kuat (naïf) akan independensi dari masing-masing kondisi / kejadian.
          Menurut Olson Delen (2008) menjelaskan Naïve Bayes untuk setiap kelas keputusan, menghitung probabilitas dg syarat bahwa kelas keputusan adalah benar,
          mengingat vektor informasi obyek. Algoritma ini mengasumsikan bahwa atribut obyek adalah independen.
          Probabilitas yang terlibat dalam memproduksi perkiraan akhir dihitung sebagai jumlah frekuensi dari " master " tabel keputusan.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mt-4">
        <h3 class="tebal">Simulasi Probabilitas Penerimaan Beasiswa.</h3>
      </div>

      <div class="col-6">
        <form method="POST" class="mt-3">

          <div class="form-group">
            <label for="penghasilan">Penghasilan Ortu / Wali :</label>
            <select name="penghasilan" id="penghasilan" class="form-control selBox" required="required">
              <option value="" disabled selected>-- pilih penghasilan ortu / wali--</option>
              <option value="p1">Rp. 100.000 - Rp. 2.000.000</option>
              <option value="p2">Rp. 2.000.000 - Rp.3.500.000</option>
              <option value="p3">Rp. 3.500.000 - Rp. 5.000.000</option>
              <option value="p4">> Rp. 5.000.000</option>
            </select>
          </div>

          <div class="form-group">
            <label for="tanggungan">Tanggungan Ortu / Wali :</label>
            <select name="tanggungan" id="tanggungan" class="form-control selBox" required="required">
              <option value="" disabled selected>-- pilih tanggungan ortu / wali--</option>
              <option value="t1">1</option>
              <option value="t2">2</option>
              <option value="t3">>2</option>
            </select>
          </div>

          <div class="form-group">
            <label for="rumah">Kepemilikan Rumah :</label>
            <select name="rumah" id="rumah" class="form-control selBox" required="required">
              <option value="" disabled selected>-- pilih kepemilikan rumah--</option>
              <option value="sendiri">Sendiri</option>
              <option value="sewa">Sewa</option>
            </select>
          </div>

          <div class="form-group">
            <label for="prestasi">Jumlah Prestasi :</label>
            <select name="prestasi" id="prestasi" class="form-control selBox" required="required">
              <option value="" disabled selected>-- pilih jumlah prestasi--</option>
              <option value="pp1">0</option>
              <option value="pp2">1</option>
              <option value="pp3">2</option>
              <option value="pp4">>2</option>
            </select>
          </div>

          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary mt-3" id="dor" onclick="return simulasi()" />
          </div>

        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mt-5 mb-5">
        <div id="hasilSIM" style="margin-bottom:30px;">

        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="page-footer font-small abu1">

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

  <!-- validasi -->
  <script>
    $(document).ready(function() {
      $('.toggle').click(function() {
        $('ul').toggleClass('active');
      });
    });
  </script>

  <script>
    function simulasi() {
      var penghasilan = $("#penghasilan").val();
      var rumah = $("#rumah").val();
      var tanggungan = $("#tanggungan").val();
      var prestasi = $("#prestasi").val();

      //validasi
      var ph = document.getElementById("penghasilan");
      var rm = document.getElementById("rumah");
      var tg = document.getElementById("tanggungan");
      var pp = document.getElementById("prestasi");

      if (ph.selectedIndex == 0) {
        alert("Penghasilan Tidak Boleh Kosong");
        return false;
      }

      if (rm.selectedIndex == 0) {
        alert("Rumah Tidak Boleh Kosong");
        return false;
      }

      if (tg.selectedIndex == 0) {
        alert("Tanggungan Tidak Boleh Kosong");
        return false;
      }

      if (pp.selectedIndex == 0) {
        alert("Prestasi Tidak Boleh Kosong");
        return false;
      }

      //batas validasi

      $.ajax({
        url: 'simulasi.php',
        type: 'POST',
        dataType: 'html',
        data: {
          penghasilan: penghasilan,
          rumah: rumah,
          tanggungan: tanggungan,
          prestasi: prestasi
        },
        success: function(data) {
          document.getElementById("hasilSIM").innerHTML = data;
        },
      });

      return false;

    }
  </script>

  <script>
    $(document).ready(function() {
      $('#dor').click(function() {
        $('html, body').animate({
          scrollTop: $("#hasilSIM").offset().top
        }, 500);
      });
    });
  </script>
</body>

</html>