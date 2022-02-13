<?php
class Bayes
{
  private $mahasiswa = "data.json";
  // private $jumTrue = 0;
  // private $jumFalse = 0;
  // private $jumData = 0;

  function __construct()
  {
  }

  /*================================================================
  FUNCTION SUM TRUE DAN FALSE
  =================================================================*/
  function sumTrue()
  {
    $data = file_get_contents($this->mahasiswa);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['status'] == 1) {
        $t += 1;
      }
    }

    return $t;
  }

  function sumFalse()
  {
    $data = file_get_contents($this->mahasiswa);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['status'] == 0) {
        $t += 1;
      }
    }
    return $t;
  }

  function sumData()
  {
    $data = file_get_contents($this->mahasiswa);
    $hasil = json_decode($data, true);
    return count($hasil);
  }

  //=================================================================

  /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
  // function probpekerjaan($pekerjaan, $status)
  // {
  //   $data = file_get_contents($this->mahasiswa);
  //   $hasil = json_decode($data, true);

  //   $t = 0;
  //   foreach ($hasil as $hasil) {
  //     if ($hasil['pekerjaan'] == $pekerjaan && $hasil['status'] == $status) {
  //       $t += 1;
  //     } else if ($hasil['pekerjaan'] == $pekerjaan && $hasil['status'] == $status) {
  //       $t += 1;
  //     }
  //   }
  //   return $t;
  // }

  function probpenghasilan($penghasilan, $status)
  {
    $data = file_get_contents($this->mahasiswa);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['penghasilan'] == $penghasilan && $hasil['status'] == $status) {
        $t += 1;
      } else if ($hasil['penghasilan'] == $penghasilan && $hasil['status'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probrumah($rumah, $status)
  {
    $data = file_get_contents($this->mahasiswa);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['rumah'] == $rumah && $hasil['status'] == $status) {
        $t += 1;
      } else if ($hasil['rumah'] == $rumah && $hasil['status'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probprestasi($prestasi, $status)
  {
    $data = file_get_contents($this->mahasiswa);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['prestasi'] == $prestasi && $hasil['status'] == $status) {
        $t += 1;
      } else if ($hasil['prestasi'] == $prestasi && $hasil['status'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probtanggungan($tanggungan, $status)
  {
    $data = file_get_contents($this->mahasiswa);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['tanggungan'] == $tanggungan && $hasil['status'] == $status) {
        $t += 1;
      } else if ($hasil['tanggungan'] == $tanggungan && $hasil['status'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }
  //=================================================================

  /*=================================================================
  MARI BERHITUNG
  keterangan parameter :
  $sT   : jumlah data yang bernilai true ( sumTrue )
  $sF   : jumlah data yang bernilai false ( sumFalse )
  $sD   : jumlah data pada data latih ( sumData )
  $pPK  : jumlah probabilitas pekerjaan wali / orang tua ( probpekerjaan )
  $pH   : jumlah probabilitas penghasilan ( probpengHasilan )
  $pR  : jumlah probabilitas rumah ( probRumah )
  $pT   : jumlah probabilitas tanggungan ( probtanggungan )
  $pA   : jumlah probabilitas prestasi (probprestasi )
  ==================================================================*/

  function hasilTrue($sT = 0, $sD = 0, $pH = 0, $pR = 0, $pT = 0, $pA = 0)
  {
    $pATrue = $sT / $sD;
    $p1 = $pH / $sT;
    $p2 = $pR / $sT;
    $p3 = $pT / $sT;
    $p4 = $pA / $sT;
    $hsl = $pATrue * $p1 * $p2 * $p3 * $p4;
    return $hsl;
  }

  function hasilFalse($sF = 0, $sD = 0, $pH = 0, $pR = 0, $pT = 0, $pA = 0)
  {
    $pAFalse = $sF / $sD;
    $p1 =  $pH / $sF;
    $p2 = $pR / $sF;
    $p3 = $pT / $sF;
    $p4 = $pA / $sF;
    $hsl = $pAFalse * $p1 * $p2 * $p3 * $p4;
    return $hsl;
  }

  function perbandingan($pATrue, $pAFalse)
  {
    $stt = "";
    $hitung = 0;
    $diterima = 0;
    if ($pATrue > $pAFalse) {
      $stt = "DITERIMA";
      $hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
      $diterima = 100 - $hitung;
    } elseif ($pAFalse > $pATrue) {
      $stt = "DITOLAK";
      $hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
      $diterima = 100 - $hitung;
    }

    $hsl = array($stt, $hitung, $diterima);
    return $hsl;
  }
  //=================================================================
}
