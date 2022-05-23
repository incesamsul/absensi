<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?= bin2hex(random_bytes(32)); ?>" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASEURL ?>/public/assets/css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Absensi!</title>
</head>

<body>

    <div class="button-wrapper container mt-5 d-flex align-items-center justify-content-center flex-column">
        <div class="ilustration mb-5 mt-5">
            <img src="./detail.svg" alt="detail" width="230">
        </div>
        <div class="button mt-5">
            <div class="form-group mb-3">
                <input type="date" name="" id="tgl" class="form-control" value="<?= $data['tgl'] ?>">
            </div>
            <button class="tombol terlambat shadow-red mb-3"> Terlambat</button>
            <button class="tombol datang_cepat shadow-yellow mb-3"> Datang cepat</button>
            <button class="tombol tidak_absen_pagi shadow-blue mb-3"> Tidak absen pagi</button>
            <button class="tombol cepat_pulang shadow-red mb-3"> Cepat Pulang</button>
            <button class="tombol tidak_absen_pulang shadow-blue mb-3"> Tidak Absen Pulang</button>
            <button class="tombol cuti shadow-blue mb-3"> Cuti</button>
            <button class="tombol sakit shadow-red mb-3"> Sakit</button>
            <button class="tombol dinas_luar shadow-blue mb-3"> Dinas Luar</button>
            <button class="tombol tanpa_keterangan shadow-red mb-3"> Tanpa Keterangan</button>
        </div>
    </div>



    <?= count($data['absensi']); ?>


    <!-- <a href="http://127.0.0.1:8001/save_absen/<?= json_encode($data['absensi']); ?>">send</a> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.terlambat').on('click', function() {
            document.location.href = '/absensi/Absensi/perhari/terlambat/' + $('#tgl').val();
        })
        $('.datang_cepat').on('click', function() {
            document.location.href = '/absensi/Absensi/perhari/datang_cepat/' + $('#tgl').val();
        })
        $('.tidak_absen_pagi').on('click', function() {
            document.location.href = '/absensi/Absensi/perhari/tidak_absen_pagi/' + $('#tgl').val();
        })
        $('.cepat_pulang').on('click', function() {
            document.location.href = '/absensi/Absensi/perhari/cepat_pulang/' + $('#tgl').val();
        })
        $('.tidak_absen_pulang').on('click', function() {
            document.location.href = '/absensi/Absensi/perhari/tidak_absen_pulang/' + $('#tgl').val();
        })
        $('.cuti').on('click', function() {
            document.location.href = '/absensi/Absensi/cuti/';
        })

        $.ajax({
            // url: 'http://localhost/absensi_online/absensi/saveabsenfromlocal',
            url: 'https://absensi.alterga.com/absensi/saveabsenfromlocal',
            data: {
                dataAbsen: <?php echo json_encode($data['absensi']) ?>
            },
            method: 'post',
            success: function(data) {
                console.log(data);
            },
            error: function(err) {
                console.log(err);
            }
        })
    </script>
</body>

</html>