<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link id="base-url" rel="stylesheet" href="<?= BASEURL ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Absensi</title>
</head>

<body>


    <nav class="navigasi">
        <div class="nav-name">
            <a href="/Absensi/<?php echo isset($data['absensi_perhari'][0]) ? $data['absensi_perhari'][0]['tanggal'] : '' ?>"><i class="mx-2 fa-solid fa-arrow-left text-white"></i></a> Data Pegawai
        </div>
        <div class="nav-button">
            <span id="search-button"><i class="fa-solid fa-magnifying-glass"></i></span>
            <div class="input-search-wrapper">
                <input type="text" id="searchbox" class="form-control">
                <div class="close-button-wrapper">
                    <i id="close-search" class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </div>
    </nav>
    <?php if ($data['jenis_data'] == 'terlambat') : ?>
        <h4 class="text-center mt-5 mb-5">Terlambat</h4>
    <?php elseif ($data['jenis_data'] == 'tidak_absen_pagi') : ?>
        <h4 class="text-center mt-5 mb-5">Tidak absen pagi</h4>
    <?php elseif ($data['jenis_data'] == 'datang_cepat') : ?>
        <h4 class="text-center mt-5 mb-5">Datang Cepat</h4>
    <?php elseif ($data['jenis_data'] == 'cepat_pulang') : ?>
        <h4 class="text-center mt-5 mb-5">Cepat Pulang</h4>
    <?php elseif ($data['jenis_data'] == 'tidak_absen_pulang') : ?>
        <h4 class="text-center mt-5 mb-5">Tidak Absen Pulang</h4>
    <?php else : ?>
        <h4 class="text-center mt-5 mb-5">.......-----........{}f3f--</h4>
    <?php endif; ?>
    <table class="table mt-3" id="myTable">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($data['jenis_data'] == 'terlambat') : ?>
                <?php foreach ($data['absensi_perhari'] as $key => $value) : ?>
                    <?php if ($value['jam'] >= '08:01' && $value['jam'] <= '11:00') : ?>
                        <tr>
                            <td style="width: 0; text-align:center;">
                                <img src="<?= BASEURL; ?>/public/assets/img/avatar.png" alt="" class="img-profile">
                            </td>
                            <td>
                                <p><?= $value['name']; ?></p>
                                <!-- <p><?= $value['tanggal']; ?></p> -->
                                <p class="mb-1"><?= $value['jam']; ?></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php elseif ($data['jenis_data'] == 'datang_cepat') : ?>
                <?php foreach ($data['absensi_perhari'] as $key => $value) : ?>
                    <?php if ($value['jam'] <= '07:00') : ?>
                        <tr>
                            <td style="width: 0; text-align:center;">
                                <img src="<?= BASEURL; ?>/public/assets/img/avatar.png" alt="" class="img-profile">
                            </td>
                            <td>
                                <p><?= $value['name']; ?></p>
                                <!-- <p><?= $value['tanggal']; ?></p> -->
                                <p class="mb-1"><?= $value['jam']; ?></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php elseif ($data['jenis_data'] == 'tidak_absen_pagi') : ?>
                <?php foreach ($data['absensi_perhari'] as $key => $value) : ?>
                    <?php if ($value['jam'] >= '11:00' && $value['jam'] <= '14:30') : ?>
                        <tr>
                            <td style="width: 0; text-align:center;">
                                <img src="<?= BASEURL; ?>/public/assets/img/avatar.png" alt="" class="img-profile">
                            </td>
                            <td>
                                <p><?= $value['name']; ?></p>
                                <!-- <p><?= $value['tanggal']; ?></p> -->
                                <p class="mb-1"><?= $value['jam']; ?></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php elseif ($data['jenis_data'] == 'cepat_pulang') : ?>
                <?php foreach ($data['absensi_perhari'] as $key => $value) : ?>
                    <?php if ($value['jam'] >= '15:00' && $value['jam'] <= '16:29') : ?>
                        <tr>
                            <td style="width: 0; text-align:center;">
                                <img src="<?= BASEURL; ?>/public/assets/img/avatar.png" alt="" class="img-profile">
                            </td>
                            <td>
                                <p><?= $value['name']; ?></p>
                                <!-- <p><?= $value['tanggal']; ?></p> -->
                                <p class="mb-1"><?= $value['jam']; ?></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php elseif ($data['jenis_data'] == 'tidak_absen_pulang') : ?>
                <?php foreach ($data['absensi_perhari'] as $key => $value) : ?>
                    <?php if ($value['jam'] >= '18:00' && $value['jam'] <= '18:01') : ?>
                        <tr>
                            <td style="width: 0; text-align:center;">
                                <img src="<?= BASEURL; ?>/public/assets/img/avatar.png" alt="" class="img-profile">
                            </td>
                            <td>
                                <p><?= $value['name']; ?></p>
                                <!-- <p><?= $value['tanggal']; ?></p> -->
                                <p class="mb-1"><?= $value['jam']; ?></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <script src=" https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        oTable = $('#myTable').DataTable({
            // "searching": false,
            "info": false,
            "ordering": false,
            "lengthChange": false,
            "paging": false,
        }); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
        $('#searchbox').keyup(function() {
            oTable.search($(this).val()).draw();
        })
        $("#myTable_filter").hide(); // hidden search input

        $('#search-button').on('click', function() {
            $('.input-search-wrapper').show();
            $('.nav-name').hide();
            $(this).hide();
        });

        $('.close-button-wrapper').on('click', function() {
            $('.input-search-wrapper').hide();
            $('.nav-name').show();
            $('#search-button').show();
        })
    </script>
</body>

</html>

<?php

// var_dump($data['absensi_perhari']);
?>