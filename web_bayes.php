<?php
require_once 'autoload.php';

$obj = new Bayes();

// echo $obj->sumData()."<br>";
// echo $obj->sumTrue()."<br>";
// echo $obj->sumFalse()."<br>";
// echo $obj->probPekerjaan(21,0)."<br>";

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

// $a1 = "PNS";
$a2 = "p3";
$a3 = "sendiri";
$a4 = "t2";
$a5 = "pp1";

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

echo "
======================================<br>
penghasilan : $a2<br>
rumah : $a3<br>
tanggungan : $a4<br>
prestasi : $a5<br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan true : <br>
jumlah true : $jumTrue <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan false : <br>
jumlah false : $jumFalse <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
pATrue : $jumTrue / $jumData<br>
penghasilan true : $penghasilan / $jumTrue <br>
rumah true : $rumah / $jumTrue <br>
tanggungan true : $tanggungan / $jumTrue <br>
prestasi true : $prestasi / $jumTrue <br><br>
=======================================<br><br>
";

echo "
======================================<br>
pAFalse : $jumFalse / $jumData<br>
penghasilan false : $penghasilan2 / $jumFalse <br>
rumah false : $rumah2 / $jumFalse <br>
tanggungan false : $tanggungan2 / $jumFalse <br>
prestasi false : $prestasi2 / $jumFalse <br>
=======================================<br><br>
";

echo "
======================================<br>
presentasi yes : $paT<br>
presentasi no : $paF<br>
=======================================<br><br>
";

if ($paT > $paF) {
  echo "
  ======================================<br>
  PRESENTASI YES LEBIH BESAR DARI PADA PRESENTASI NO<br>
  =======================================
  <br><br>";
} else if ($paF > $paT) {
  echo "
  ======================================<br>
  PRESENTASI NO LEBIH BESAR DARI PADA PRESENTASI YES<br>
  =======================================
  <br><br>";
}

// echo $obj->hasilTrue($jumTrue,$jumData,$pekerjaan,$penghasilan,$rumah,$tanggungan,$prestasi)."<br>";
// echo $obj->hasilFalse($jumTrue,$jumData,$pekerjaan2,$penghasilan2,$rumah2,$tanggungan2,$prestasi2)."<br><br>";

$result = $obj->perbandingan($paT, $paF);
echo " Status : $result[0] <br>Presentasi diterima sebanyak : " . round($result[1], 2) . " % <br>Presentasi diolak sebanyak : " . round($result[2], 2) . " % ";
