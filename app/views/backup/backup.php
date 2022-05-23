<?php


// $jamMasuk = [
//     'tgl' => '',
// ]
// for ($i = 0; $i < count($data['detail_absensi']); $i++) {
//     $data['detail_absensi'][$i]['checktime'] = explode(" ", $data['detail_absensi'][$i]['checktime']);

//     if ($data['detail_absensi'][$i]['checktime'][0] == '2020-03-02') {
//         var_dump($data['detail_absensi'][$i]);
//     }
// }


$dataAbsensi = [];

for ($i = 0; $i < count($data['detail_absensi']); $i++) {
    $data['detail_absensi'][$i]['name'];
    $checktime = explode(" ", $data['detail_absensi'][$i]['checktime']);
    if ($checktime[0] == '2020-03-01') {
        $dataAbsensi['2020-03-01']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-02') {
        $dataAbsensi['2020-03-02']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-03') {
        $dataAbsensi['2020-03-03']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-04') {
        $dataAbsensi['2020-03-04']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-05') {
        $dataAbsensi['2020-03-05']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-06') {
        $dataAbsensi['2020-03-06']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-07') {
        $dataAbsensi['2020-03-07']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-08') {
        $dataAbsensi['2020-03-08']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-09') {
        $dataAbsensi['2020-03-09']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-10') {
        $dataAbsensi['2020-03-10']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-11') {
        $dataAbsensi['2020-03-11']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-12') {
        $dataAbsensi['2020-03-12']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-13') {
        $dataAbsensi['2020-03-13']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-14') {
        $dataAbsensi['2020-03-14']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-15') {
        $dataAbsensi['2020-03-15']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-16') {
        $dataAbsensi['2020-03-16']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-17') {
        $dataAbsensi['2020-03-17']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-18') {
        $dataAbsensi['2020-03-18']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-19') {
        $dataAbsensi['2020-03-19']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-20') {
        $dataAbsensi['2020-03-20']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-21') {
        $dataAbsensi['2020-03-21']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-22') {
        $dataAbsensi['2020-03-22']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-23') {
        $dataAbsensi['2020-03-23']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-24') {
        $dataAbsensi['2020-03-24']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-25') {
        $dataAbsensi['2020-03-25']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-26') {
        $dataAbsensi['2020-03-26']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-27') {
        $dataAbsensi['2020-03-27']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-28') {
        $dataAbsensi['2020-03-28']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-29') {
        $dataAbsensi['2020-03-29']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-30') {
        $dataAbsensi['2020-03-30']['arr_jam'][] = $checktime[1];
    } else if ($checktime[0] == '2020-03-31') {
        $dataAbsensi['2020-03-31']['arr_jam'][] = $checktime[1];
    }
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
    // if ($key == '2020-03-09') {
    //     $dataAbsensi[$key]['arr_jam'] = array_values($dataAbsensi[$key]['arr_jam']);
    // }

    // $dataAbsensi[$key]['arr_jam'] = array_values($dataAbsensi[$key]['arr_jam'])[0];

}

var_dump($dataAbsensi);


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASEURL ?>/public/assets/plugins/sweetalert2/sweetalert2.min.css">
    <link id="base-url" rel="stylesheet" href="<?= BASEURL ?>/public/assets/css/style.css">
    <title>Hello, world!</title>
</head>

<body>
    <?php





    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>this is the data</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Jam Masuk</th>
                            <th> Jam Keluar</th>
                            <th> Jam Masuk Lembur</th>
                            <th> Jam Pulang Lembur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($dataAbsensi as $key => $value) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $key; ?></td>
                                <td>
                                    <?php

                                    if (isset($value['jam_masuk'])) {
                                        if (!$value['jam_masuk']) {
                                            echo "tidak ada";
                                        } else {
                                            echo $value['jam_masuk'][0];
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
        </div>
    </div>
    <script src="<?= BASEURL ?>/public/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= BASEURL ?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= BASEURL ?>/public/assets/js/script.js"></script>
</body>

</html>