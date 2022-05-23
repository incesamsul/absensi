<?php

class Absensi extends Controller
{
    public function index($tgl = null)
    {
        if (!$tgl) {
            $tgl = date('Y-m-d');
        } else {
            $tgl = $tgl;
        }
        $data = [];
        $data['tgl'] = $tgl;
        $data['absensi'] = $this->model('AbsensiModel')->getDataAbsensiAll();
        $this->view('absensi/index', $data);
    }

    public function perHari($jenisData = null, $tgl = null)
    {
        if (!$jenisData || !$tgl) {
            header('location: ' . BASEURL);
        }
        $data['absensi_perhari'] = $this->model('AbsensiModel')->getAbsenPerHari($tgl);
        $data['jenis_data'] = $jenisData;
        $this->view('absensi/perhari', $data);
    }


    public function detail($id, $bulan)
    {
        $data['user'] = $this->model('AbsensiModel')->getDataUser();
        $data['detail_absensi'] = $this->model('AbsensiModel')->getDataAbsensiById($id, $bulan);
        $data['jmlHariPerBulan'] = $this->model('AbsensiModel')->getDataJumlahHariPerBulan($bulan);
        $this->view('absensi/detail', $data);
    }

    public function detailMalam($id, $bulan)
    {
        $data['user'] = $this->model('AbsensiModel')->getDataUser();
        $data['detail_absensi'] = $this->model('AbsensiModel')->getDataAbsensiById($id, $bulan);
        $data['jmlHariPerBulan'] = $this->model('AbsensiModel')->getDataJumlahHariPerBulan($bulan);
        $this->view('absensi/detailMalam', $data);
    }

    public function ajaxDetail()
    {
        $id = $_POST['idUser'];
        $bulan = $_POST['numBulan'];
        echo json_encode($this->model('AbsensiModel')->getDataAbsensiById($id, $bulan));
        // $data['jmlHariPerBulan'] = $this->model('AbsensiModel')->getDataJumlahHariPerBulan($bulan);
    }
}
