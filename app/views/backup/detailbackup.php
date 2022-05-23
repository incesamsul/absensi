<?php


// $jamMasuk = [
//     'tgl' => '',
// ]
// for ($i = 0; $i < count($data['detail_absensi']); $i++) {
//     $data['detail_absensi'][$i]['checktime'] = explode(" ", $data['detail_absensi'][$i]['checktime']);

//     if ($data['detail_absensi'][$i]['checktime'][0] == $tahunBulan.'-02') {
//         var_dump($data['detail_absensi'][$i]);
//     }
// }


$dataAbsensi = [];
$bulan = date('m', strtotime($data['detail_absensi'][0]['checktime']));
$tahun = date('Y', strtotime($data['detail_absensi'][0]['checktime']));
$tahunBulan = $tahun . "-" . $bulan;

$jmlHSabtu = MyHelper::totalSat($bulan, $tahun);
$jmlHMinggu = MyHelper::totalSun($bulan, $tahun);


$dataAbsensi = MyHelper::generateAbsensi($data['detail_absensi'], $tahunBulan, $data['jmlHariPerBulan']);
// var_dump($dataAbsensi);

$jmlLembur = 0;
$jmlTerlambat = 0;
$jmlMasuk = 0;
$nama = $data['detail_absensi'][0]['name'];

if ($nama == 'fitrah' || $nama == 'israr') {
    $jmlWajibMasuk = $data['jmlHariPerBulan'] - $jmlHMinggu;
} else {
    $jmlWajibMasuk = $data['jmlHariPerBulan'] - $jmlHMinggu - $jmlHSabtu;
}



foreach ($dataAbsensi as $key => $value) {


    $dataAbsensi[$key]['arr_jam'] = $dataAbsensi[$key]['arr_jam'];



    for ($i = 0; $i < count($dataAbsensi[$key]['arr_jam']); $i++) {
        if (strtotime($dataAbsensi[$key]['arr_jam'][$i]) >= strtotime('05:30') && strtotime($dataAbsensi[$key]['arr_jam'][$i]) <= strtotime('08:30')) {
            $dataAbsensi[$key]['jam_masuk'][] = $dataAbsensi[$key]['arr_jam'][$i];
        }
        if (strtotime($dataAbsensi[$key]['arr_jam'][$i]) >= strtotime('16:30') && strtotime($dataAbsensi[$key]['arr_jam'][$i]) <= strtotime('16:40')) {
            $dataAbsensi[$key]['jam_pulang'][] = $dataAbsensi[$key]['arr_jam'][$i];
        }
        if (strtotime($dataAbsensi[$key]['arr_jam'][$i]) >= strtotime('19:30') && strtotime($dataAbsensi[$key]['arr_jam'][$i]) <= strtotime('20:15')) {
            $dataAbsensi[$key]['jam_masuk_lembur'][] = $dataAbsensi[$key]['arr_jam'][$i];
        }
        if (strtotime($dataAbsensi[$key]['arr_jam'][$i]) >= strtotime('23:00') && strtotime($dataAbsensi[$key]['arr_jam'][$i]) <= strtotime('23:15')) {
            $dataAbsensi[$key]['jam_pulang_lembur'][] = $dataAbsensi[$key]['arr_jam'][$i];
        }
    }
    // if ($key == $tahunBulan.'-09') {
    //     $dataAbsensi[$key]['arr_jam'] = array_values($dataAbsensi[$key]['arr_jam']);
    // }

    // $dataAbsensi[$key]['arr_jam'] = array_values($dataAbsensi[$key]['arr_jam'])[0];

}

// var_dump($dataAbsensi);


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= BASEURL ?>/public/assets/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/assets/css/adminlte.min.css">
    <link id="base-url" rel="stylesheet" href="<?= BASEURL ?>/public/assets/css/style.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASEURL ?>/public/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASEURL ?>/public/assets/dist/css/adminlte.min.css">


    <title>Hello, world!</title>
</head>

<body>
    <?php





    ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="card collapsed-card">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Data absensi <?= $data['detail_absensi'][0]['name']; ?>
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th> Jam Keluar</th>
                                    <th> Jam Masuk Lembur</th>
                                    <th> Jam Pulang Lembur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($dataAbsensi as $key => $value) : ?>
                                    <tr <?php if (($i) > $data['jmlHariPerBulan']) {
                                            echo "hidden";
                                        } else {
                                            echo "";
                                        }
                                        ?> class="<?php
                                                    if (isset($value['jam_masuk'])) {
                                                        if ($value['jam_masuk'][0] >= '07:30') {
                                                            echo "red";
                                                            $jmlTerlambat++;
                                                        } else {
                                                            echo "";
                                                        }
                                                    } else {
                                                        echo "-";
                                                    }

                                                    ?>">
                                        <td><?= $i++; ?></td>
                                        <td>
                                            <?php

                                            echo MyHelper::dayID($key) . " " . MyHelper::dateID($key);

                                            ?>

                                        </td>
                                        <td>
                                            <?php

                                            if (isset($value['jam_masuk'])) {
                                                if (!$value['jam_masuk']) {
                                                    echo "tidak ada";
                                                } else {
                                                    echo $value['jam_masuk'][0];
                                                    $jmlMasuk++;
                                                }
                                            } else {
                                                echo "-";
                                            }


                                            ?>
                                        </td>
                                        <td>
                                            <?php

                                            if (isset($value['jam_pulang'])) {
                                                if (!$value['jam_pulang']) {
                                                    echo "tidak ada";
                                                } else {
                                                    echo $value['jam_pulang'][0];
                                                }
                                            } else {
                                                echo "-";
                                            }


                                            ?>
                                        </td>
                                        <td>
                                            <?php

                                            if (isset($value['jam_masuk_lembur'])) {
                                                if (!$value['jam_masuk_lembur']) {
                                                    echo "tidak ada";
                                                } else {
                                                    echo $value['jam_masuk_lembur'][0];
                                                    $jmlLembur++;
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        <td>
                                            <?php

                                            if (isset($value['jam_pulang_lembur'])) {
                                                if (!$value['jam_pulang_lembur']) {
                                                    echo "tidak ada";
                                                } else {
                                                    echo $value['jam_pulang_lembur'][0];
                                                }
                                            } else {
                                                echo "-";
                                            }


                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>


                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card ">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Hasil Hitung absen <?= $data['detail_absensi'][0]['name']; ?>
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>Jumlah Masuk</td>
                                <td><?= $jmlMasuk; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Wajib Masuk</td>
                                <td><?= $jmlWajibMasuk; ?></td>
                            </tr>
                            <tr>
                                <td>Minus Masuk</td>
                                <td><?= $jmlWajibMasuk - $jmlMasuk; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Lembur</td>
                                <td><?= $jmlLembur; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Terlambat</td>
                                <td><?= $jmlTerlambat; ?></td>
                            </tr>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
    </div>
    <script src="<?= BASEURL ?>/public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= BASEURL ?>/public/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script src="<?= BASEURL ?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= BASEURL ?>/public/assets/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->

    <script src="<?= BASEURL ?>/public/assets/js/script.js"></script>
</body>

</html>