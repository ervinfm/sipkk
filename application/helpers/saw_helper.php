<?php
// Metode SAW

function artisan($type, $value)
{
    $peserta = array();
    if ($type == 'tingkat') {
        foreach (get_kelas_spesifik('tingkat_kelas', $value)->result() as $key => $kelas) {
            foreach (get_pesert_byid_kelas($kelas->id_kelas, get_ta('status_ta', 1)->row()->id_ta)->result() as $key => $siswa) {
                array_push($peserta, $siswa->id_siswa);
            }
        }
    } else if ($type == 'kelas') {
        foreach (get_pesert_byid_kelas($value, get_ta('status_ta', 1)->row()->id_ta)->result() as $key => $siswa) {
            array_push($peserta, $siswa->id_siswa);
        }
    }

    $analisis = analisis($peserta);
    $normalisasi = normalisasi($analisis);
    $rank = rank($normalisasi);
    $short = short($rank);

    $artisans = [
        'analisis' => $analisis,
        'normalisasi' => $normalisasi,
        'rank' => $rank,
        'short' => $short,
    ];
    return $artisans;
}

//  Mulai
function analisis($data)
{
    $temp = array(); // 
    foreach ($data as $key => $peserta) {
        $uts = $uas = $tugas = $kehadiran = $uh = 0;
        $nilais = get_nilai_siswa_for_rekap($peserta, get_ta('status_ta', 1)->row()->id_ta);
        foreach ($nilais->result() as $key => $nilai) {
            if ($key > 0) {
                $uts = $nilai->nilai_uts;
                $uas = $nilai->nilai_uas;
                $uh = $nilai->nilai_uh;
                $kehadiran = $nilai->nilai_kehadiran;
                $tugas = $nilai->nilai_tugas;
            } else {
                $uts = $uts + $nilai->nilai_uts;
                $uas = $uas + $nilai->nilai_uas;
                $uh = $uh + $nilai->nilai_uh;
                $kehadiran = $kehadiran + $nilai->nilai_kehadiran;
                $tugas = $tugas + $nilai->nilai_tugas;
            }
        }

        $all = [round($uts), round($uas), round($uh), round($tugas), round($kehadiran)];

        foreach (get_kriteria()->result() as $no => $kriteria) {
            $point = round($all[$no] * ($kriteria->bobot_kriteria / 100), 0);
            foreach (get_sub_kriteria($kriteria->id_kriteria)->result() as $key => $sub) {
                if ($point <= $sub->max_sub_kriteria && $point >= $sub->min_sub_kriteria) {
                    $all[$no] = $sub->bobot_sub_kriteria;
                }
            }
        }

        array_unshift($all, $peserta);
        array_push($temp, $all);
    }
    return $temp;
}

function normalisasi($data) 
{
    $temp = array();
    foreach ($data as $key => $nilai) {
        $no = 1;
        foreach (get_kriteria()->result() as $key => $kriteria) {
            $nilai[$no] = $nilai[$no] / get_sub_kriteria($kriteria->id_kriteria)->num_rows();
            $no++;
        }
        array_push($temp, $nilai);
    }
    return $temp;
}

function rank($data) // fungsi untuk akumulasi nilai normalisasi
{
    $temp = array();
    foreach ($data as $key => $nilai) {
        $no = 1;
        $total = 0;
        foreach (get_kriteria()->result() as $key => $kriteria) {
            $nilai[$no] = round($nilai[$no] * $kriteria->bobot_kriteria);
            $total = $total +  $nilai[$no];
            $no++;
        }
        array_push($nilai, $total);
        array_push($temp, $nilai);
    }
    return $temp;
}

function short($data) // fungsi untuk mengurutkan ranking berdasarkan nilai akumulasi
{
    $temp = array();
    foreach ($data as $key => $nilai) {
        array_push($temp, array($nilai[6], $nilai[0]));
    }
    arsort($temp);
    return $temp;
}
