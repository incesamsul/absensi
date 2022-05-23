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
                <!-- <?= "Jumlah Hari = " . $data['jmlHariPerBulan']; ?> -->
                <?= "Absensi pada " . date('M Y', strtotime($data['absensi'][0]['checktime'])) ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Jumlah Masuk</th>
                            <th>Jumlah Wajib Masuk</th>
                            <th>Minus Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        function totalSun($month, $year)
                        {
                            $sundays = 0;
                            $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                            for ($i = 1; $i <= $total_days; $i++)
                                if (date('N', strtotime($year . '-' . $month . '-' . $i)) == 7)
                                    $sundays++;
                            return $sundays;
                        }

                        function totalSat($month, $year)
                        {
                            $sundays = 0;
                            $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                            for ($i = 1; $i <= $total_days; $i++)
                                if (date('N', strtotime($year . '-' . $month . '-' . $i)) == 6)
                                    $sundays++;
                            return $sundays;
                        }


                        $jmlMasukFitrah = ['name' => 'fitrah', 'user_id' => '',  'jmlMasuk' => [], 'jmlWajibMasuk' => 0];
                        $jmlMasukInce = ['name' => 'ince', 'user_id' => '',  'jmlMasuk' => [], 'jmlWajibMasuk' => 0];
                        $jmlMasukHamkah = ['name' => 'hamkah', 'user_id' => '',  'jmlMasuk' => [], 'jmlWajibMasuk' => 0];
                        $jmlMasukIsrar = ['name' => 'israr', 'user_id' => '',  'jmlMasuk' => [], 'jmlWajibMasuk' => 0];
                        for ($i = 0; $i < count($data['absensi']); $i++) {
                            $data['absensi'][$i]['checktime'] = explode(' ', $data['absensi'][$i]['checktime']);


                            if ($data['absensi'][$i]['name'] == 'fitrah') {
                                $jmlMasukFitrah['user_id'] = $data['absensi'][$i]['userid'];
                                $jmlMasukFitrah['jmlMasuk'][] = $data['absensi'][$i]['checktime'][0];
                            } else if ($data['absensi'][$i]['name'] == 'ince') {
                                $jmlMasukInce['user_id'] = $data['absensi'][$i]['userid'];
                                $jmlMasukInce['jmlMasuk'][] = $data['absensi'][$i]['checktime'][0];
                            } else if ($data['absensi'][$i]['name'] == 'hamkah') {
                                $jmlMasukHamkah['user_id'] = $data['absensi'][$i]['userid'];
                                $jmlMasukHamkah['jmlMasuk'][] = $data['absensi'][$i]['checktime'][0];
                            } else if ($data['absensi'][$i]['name'] == 'israr') {
                                $jmlMasukIsrar['user_id'] = $data['absensi'][$i]['userid'];
                                $jmlMasukIsrar['jmlMasuk'][] = $data['absensi'][$i]['checktime'][0];
                            }
                        }
                        $jmlMasukFitrah['jmlMasuk'] = array_unique($jmlMasukFitrah['jmlMasuk']);
                        $jmlMasukInce['jmlMasuk'] = array_unique($jmlMasukInce['jmlMasuk']);
                        $jmlMasukHamkah['jmlMasuk'] = array_unique($jmlMasukHamkah['jmlMasuk']);
                        $jmlMasukIsrar['jmlMasuk'] = array_unique($jmlMasukIsrar['jmlMasuk']);



                        $jmlHariMinggu = totalSun(date('m', strtotime($data['absensi'][1]['checktime'][0])), date('y', date('m', strtotime($data['absensi'][1]['checktime'][0]))));
                        $jmlHariSabtu = totalSat(date('m', strtotime($data['absensi'][1]['checktime'][0])), date('y', date('m', strtotime($data['absensi'][1]['checktime'][0]))));

                        $jmlMasukFitrah['jmlWajibMasuk'] = ((int)$data['jmlHariPerBulan'] - $jmlHariMinggu);
                        $jmlMasukInce['jmlWajibMasuk'] = ((int)$data['jmlHariPerBulan'] - $jmlHariMinggu) - $jmlHariSabtu;
                        $jmlMasukHamkah['jmlWajibMasuk'] = ((int)$data['jmlHariPerBulan'] - $jmlHariMinggu) - $jmlHariSabtu;
                        $jmlMasukIsrar['jmlWajibMasuk'] = ((int)$data['jmlHariPerBulan'] - $jmlHariMinggu);

                        $dataJmlMasukPegawai = [$jmlMasukFitrah, $jmlMasukInce, $jmlMasukHamkah, $jmlMasukIsrar];
                        ?>
                        <?php foreach ($dataJmlMasukPegawai as $djmp) : ?>
                            <tr>
                                <td><?= $djmp['user_id'] ?></td>
                                <td><?= $djmp['name']; ?></td>
                                <td><?= count($djmp['jmlMasuk']); ?></td>
                                <td><?= $djmp['jmlWajibMasuk'] ?></td>
                                <td><?= $djmp['jmlWajibMasuk'] - count($djmp['jmlMasuk'])  ?></td>
                                <td><a href="Absensi/detail/<?= $djmp['user_id']; ?>" class="btn btn-success">Detail</a></td>
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