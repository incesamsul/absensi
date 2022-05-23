<?php

class AbsensiModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataUser()
    {
        $query = "SELECT * FROM userinfo";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDataAbsensi($bulan)
    {
        $query = "SELECT userinfo.userid,name,checktime
        -- min(checktime) as jam_masuk, 
        -- max(checktime) as jam_keluar 
        from USERINFO left JOIN checkinout 
        on userinfo.userid = checkinout.userid 
        
        AND month(checktime) = $bulan
		
		group by userinfo.userid,name,checktime


";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDataAbsensiAll()
    {
        $query  = "SELECT top 1000 userinfo.userid,name,checktime
        -- min(checktime) as jam_masuk, 
        -- max(checktime) as jam_keluar 
        from USERINFO left JOIN checkinout 
        on userinfo.userid = checkinout.userid 
		
		group by userinfo.userid,name,checktime
		order by checktime desc";

        // $query = "SELECT userinfo.userid,name,checktime
        // -- min(checktime) as jam_masuk, 
        // -- max(checktime) as jam_keluar 
        // from USERINFO left JOIN checkinout 
        // on userinfo.userid = checkinout.userid 

        // group by userinfo.userid,name,checktime";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAbsenPerHari($tgl)
    {
        $query = "SELECT name, CONVERT(date, checktime) [tanggal], convert(char(5), CHECKTIME, 108) [jam]
        FROM CHECKINOUT join userinfo on CHECKINOUT.USERID = userinfo.userid where cast (datediff (day, 0, checktime) as datetime) = '$tgl'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDataAbsensiById($id, $bulan)
    {

        $query = "SELECT userinfo.userid,name,checktime
        -- min(checktime) as jam_masuk, 
        -- max(checktime) as jam_keluar 
        from USERINFO left JOIN checkinout 
        on userinfo.userid = checkinout.userid 
        AND month(checktime) = $bulan
		where userinfo.userid = '$id'
		group by userinfo.userid,name,checktime";
        $this->db->query($query);
        return $this->db->resultSet();
    }


    public function getDataJumlahHariPerBulan($bulan)
    {
        $query = "SELECT eomonth(checktime) as last_day from checkinout where month(checktime) = $bulan";
        $this->db->query($query);
        return date('d', strtotime($this->db->single()['last_day']));
    }
}
