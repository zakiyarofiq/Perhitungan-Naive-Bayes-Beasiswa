<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

// $a1 = $_POST['pekerjaan'];
$a2 = $_POST['penghasilan'];
$a3 = $_POST['rumah'];
$a4 = $_POST['tanggungan'];
$a5 = $_POST['prestasi'];

//TRUE
// $pekerjaan = $obj->probpekerjaan($a1, 1);
$penghasilan = $obj->probpenghasilan($a2, 1);
$rumah = $obj->probrumah($a3, 1);
$tanggungan = $obj->probtanggungan($a4, 1);
$prestasi = $obj->probprestasi($a5, 1);

//FALSE
// $pekerjaan2 = $obj->probpekerjaan($a1, 0);
$penghasilan2 = $obj->probpenghasilan($a2, 0);
$rumah2 = $obj->probrumah($a3, 0);
$tanggungan2 = $obj->probtanggungan($a4, 0);
$prestasi2 = $obj->probprestasi($a5, 0);

//result
$paT = $obj->hasilTrue($jumTrue, $jumData, $penghasilan, $rumah, $tanggungan, $prestasi);
$paF = $obj->hasilFalse($jumTrue, $jumData, $penghasilan2, $rumah2, $tanggungan2, $prestasi2);

if ($a2 == "p1") {
  $a2 = "Rp. 100.000 - Rp. 2.000.000";
} else if ($a2 == "p2") {
  $a2 = "Rp. 2.000.000 - Rp.3.500.000";
} else if ($a2 == "p3") {
  $a2 = "Rp. 3.500.000 - Rp. 5.000.000";
} else if ($a2 == "p4") {
  $a2 = "> Rp. 5.000.000";
}

if ($a4 == "t1") {
  $a4 = "1";
} else if ($a4 == "t2") {
  $a4 = "2";
} else if ($a4 == "t3") {
  $a4 = ">2";
}

if ($a5 == "pp1") {
  $a5 = "0";
} else if ($a5 == "pp2") {
  $a5 = "1";
} else if ($a5 == "pp3") {
  $a5 = "2";
} else if ($a5 == "pp4") {
  $a5 = ">2";
}

echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi berdasarkan masukan calon mahasiswa menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='card' style='width: 25rem;'>
  <div class='card-header' style='background-color:#17a2b8;color:#fff'>
    <b>Informasi Calon Mahasiswa</b>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>penghasilan : &nbsp;&nbsp;<b>$a2</b></li>
    <li class='list-group-item'>tanggungan : &nbsp;&nbsp;<b>$a4</b></li>
    <li class='list-group-item'>rumah : &nbsp;&nbsp;<b>$a3</b></li>
    <li class='list-group-item'>prestasi : &nbsp;&nbsp;<b>$a5</b></li>
  </ul>
</div><br>
<hr>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th>Jumlah True</th>
    <th>Jumlah False</th>
    <th>Jumlah Total Data</th>
  </tr>
  <tr>
    <td>$jumTrue</td>
    <td>$jumFalse</td>
    <td>$jumData</td>
  </tr>
</table>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th></th>
    <th>True</th>
    <th>False</th>
  </tr>
  <tr>
    <td>pA</td>
    <td>$jumTrue / $jumData</td>
    <td>$jumFalse / $jumData</td>
  </tr>
  <tr>
    <td>Penghasilan</td>
    <td>$penghasilan / $jumTrue</td>
    <td>$penghasilan2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Tanggungan</td>
    <td>$tanggungan / $jumTrue</td>
    <td>$tanggungan2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Rumah</td>
    <td>$rumah / $jumTrue</td>
    <td>$rumah2 / $jumFalse</td>
  </tr>
  <tr>
    <td>prestasi</td>
    <td>$prestasi / $jumTrue</td>
    <td>$prestasi2 / $jumFalse</td>
  </tr>
</table>
";

echo "<br>
  <table class='table table-bordered' style='font-size:18px;text-align:center;'>
    <tr style='background-color:#17a2b8;color:#fff'>
      <th>Presentasi Diterima</th>
      <th>Presentasi Ditolak</th>
    </tr>
    <tr>
      <td>$paT</td>
      <td>$paF</td>
    </tr>
  </table>
";

$result = $obj->perbandingan($paT, $paF);

if ($paT > $paF) {
  echo "<br>
  <h3 class='tebal'>PRESENTASI <span class='badge badge-success' style='padding:10px'><b>DITERIMA</b></span> LEBIH BESAR DARI PADA PRESENTASI DITOLAK</h3><br>";
  echo "<h4><br>Presentasi diterima sebanyak : <b>" . round($result[1], 2) . " %</b> <br>Presentasi ditolak sebanyak : <b>" . round($result[2], 2) . " % </b></h4>";
} else if ($paF > $paT) {
  echo "<br>
  <h3 class='tebal'>PRESENTASI <span class='badge badge-danger' style='padding:10px'><b>DITOLAK</b></span> LEBIH BESAR DARI PADA PRESENTASI DITERIMA</h3><br>";
  echo "<h4><br>Presentasi ditolak sebanyak : <b>" . round($result[1], 2) . " %</b> <br>Presentasi diterima sebanyak : <b>" . round($result[2], 2) . " % </b></h4>";
}


if ($result[0] == "DITERIMA") {
  echo "
  <div class='alert alert-success mt-5' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Selamat ! berdasarkan hasil prediksi , anda dinyatakan <b>diterima!</b></p>
    <hr>
    <p class='mb-0'>- Have a nice day -</p>
  </div>";
} else {
  echo "
  <div class='alert alert-danger mt-5' role='aler'>
  <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
  <p>Maaf, berdasarkan hasil prediksi , anda dinyatakan <b>ditolak!</p>
  <hr>
  <p class='mb-0'>- Don't give up ! -</p>
  </div>";
}
