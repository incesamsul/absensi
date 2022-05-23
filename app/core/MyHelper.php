<?php

class MyHelper
{
    public static function totalSun($month, $year)
    {
        $sundays = 0;
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($i = 1; $i <= $total_days; $i++)
            if (date('N', strtotime($year . '-' . $month . '-' . $i)) == 7)
                $sundays++;
        return $sundays;
    }

    public static function totalSat($month, $year)
    {
        $sundays = 0;
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($i = 1; $i <= $total_days; $i++)
            if (date('N', strtotime($year . '-' . $month . '-' . $i)) == 6)
                $sundays++;
        return $sundays;
    }


    public static function dayID($tanggal)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $num = date('N', strtotime($tanggal));
        return $hari[$num];
    }


    public static function dateID($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }


    public static function generateAbsensi($detailAbsen, $tahunBulan, $jmlHariPerBulan)
    {
        for ($i = 0; $i < count($detailAbsen); $i++) {
            $checktime = explode(" ", $detailAbsen[$i]['checktime']);
            if ($checktime[0] == $tahunBulan . '-01') {
                $dataAbsensi[$tahunBulan . '-01']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-01']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-02') {
                $dataAbsensi[$tahunBulan . '-02']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-02']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-03') {
                $dataAbsensi[$tahunBulan . '-03']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-03']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-04') {
                $dataAbsensi[$tahunBulan . '-04']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-04']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-05') {
                $dataAbsensi[$tahunBulan . '-05']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-05']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-06') {
                $dataAbsensi[$tahunBulan . '-06']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-06']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-07') {
                $dataAbsensi[$tahunBulan . '-07']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-07']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-08') {
                $dataAbsensi[$tahunBulan . '-08']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-08']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-09') {
                $dataAbsensi[$tahunBulan . '-09']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-09']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-10') {
                $dataAbsensi[$tahunBulan . '-10']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-10']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-11') {
                $dataAbsensi[$tahunBulan . '-11']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-11']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-12') {
                $dataAbsensi[$tahunBulan . '-12']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-12']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-13') {
                $dataAbsensi[$tahunBulan . '-13']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-13']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-14') {
                $dataAbsensi[$tahunBulan . '-14']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-14']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-15') {
                $dataAbsensi[$tahunBulan . '-15']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-15']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-16') {
                $dataAbsensi[$tahunBulan . '-16']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-16']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-17') {
                $dataAbsensi[$tahunBulan . '-17']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-17']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-18') {
                $dataAbsensi[$tahunBulan . '-18']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-18']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-19') {
                $dataAbsensi[$tahunBulan . '-19']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-19']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-20') {
                $dataAbsensi[$tahunBulan . '-20']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-20']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-21') {
                $dataAbsensi[$tahunBulan . '-21']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-21']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-22') {
                $dataAbsensi[$tahunBulan . '-22']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-22']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-23') {
                $dataAbsensi[$tahunBulan . '-23']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-23']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-24') {
                $dataAbsensi[$tahunBulan . '-24']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-24']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-25') {
                $dataAbsensi[$tahunBulan . '-25']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-25']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-26') {
                $dataAbsensi[$tahunBulan . '-26']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-26']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-27') {
                $dataAbsensi[$tahunBulan . '-27']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-27']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-28') {
                $dataAbsensi[$tahunBulan . '-28']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-28']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-29') {
                $dataAbsensi[$tahunBulan . '-29']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-29']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-30') {
                $dataAbsensi[$tahunBulan . '-30']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-30']['arr_jam'][] = "-";
            }
            if ($checktime[0] == $tahunBulan . '-31') {
                $dataAbsensi[$tahunBulan . '-31']['arr_jam'][] = $checktime[1];
            } else {
                $dataAbsensi[$tahunBulan . '-31']['arr_jam'][] = '-';
            }
        }

        return $dataAbsensi;
    }
}
