<?php

function admin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id')) {
        if ($ci->session->userdata('level') != 1) {
            $ci->session->set_flashdata('warning', 'Anda tidak dapat mengakses fitur administrator!');
            redirect(($ci->session->userdata('level') == 1 ? 'admin' : ($ci->session->userdata('level') == 2 ? 'guru' : 'siswa')) . '/beranda');
        }
    } else {
        $ci->session->set_flashdata('warning', 'Silahkan Login untuk Mengakses sistem!');
        redirect('login');
    }
}

function guru()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id')) {
        if ($ci->session->userdata('level') != 2) {
            $ci->session->set_flashdata('warning', 'Anda tidak dapat mengakses fitur Guru!');
            redirect(($ci->session->userdata('level') == 1 ? 'admin' : ($ci->session->userdata('level') == 2 ? 'guru' : 'siswa')) . '/beranda');
        }
    } else {
        $ci->session->set_flashdata('warning', 'Silahkan Login untuk Mengakses sistem!');
        redirect('login');
    }
}

function siswa()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id')) {
        if ($ci->session->userdata('level') != 3) {
            $ci->session->set_flashdata('warning', 'Anda tidak dapat mengakses fitur Siswa!');
            redirect(($ci->session->userdata('level') == 1 ? 'admin' : ($ci->session->userdata('level') == 2 ? 'guru' : 'siswa')) . '/beranda');
        }
    } else {
        $ci->session->set_flashdata('warning', 'Silahkan Login untuk Mengakses sistem!');
        redirect('login');
    }
}

function already()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id')) {
        $ci->session->set_flashdata('warning', 'Sesi Login anda Masih Berlaku!');
        if ($ci->session->userdata('level') == 1) {
            redirect('admin/beranda');
        } else  if ($ci->session->userdata('level') == 2) {
            redirect('guru/beranda');
        } else  if ($ci->session->userdata('level') == 3) {
            redirect('beranda');
        }
    }
}

function profil()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') == 1) {
        $ci->db->from('tbl_user');
        $ci->db->where('id_user', $ci->session->userdata('user_id'));
    } else if ($ci->session->userdata('level') == 2) {
        $ci->db->from('tbl_user');
        $ci->db->join('tbl_guru', 'tbl_user.id_user=tbl_guru.id_user');
        $ci->db->where('tbl_user.id_user', $ci->session->userdata('user_id'));
    } else if ($ci->session->userdata('level') == 3) {
        $ci->db->from('tbl_user');
        $ci->db->join('tbl_siswa', 'tbl_user.id_user=tbl_siswa.id_user');
        $ci->db->where('tbl_user.id_user', $ci->session->userdata('user_id'));
    }
    $query = $ci->db->get();
    return $query->row();
}

function get_user_by_id($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where('id_user', $id);
    $query = $ci->db->get();
    return $query;
}

function logged($val)
{
    $ci = &get_instance();
    $params['is_online'] = $val;
    $ci->db->where('id_user', $ci->session->userdata('user_id'));
    $ci->db->update('tbl_user', $params);
}

// Other Function

function get_guru_all($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_guru');
    if (@$id != null) {
        $ci->db->where('id_guru', $id);
    } else {
        $ci->db->order_by('nama_guru', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function get_pesert_byid_kelas($id_kelas, $id_ta = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_peserta');
    $ci->db->where('id_kelas', $id_kelas);
    $ci->db->where('id_ta', $id_ta);
    $query = $ci->db->get();
    return $query;
}

function get_peserta_join_siswa($id_kelas, $id_ta)
{
    $ci = &get_instance();
    $ci->db->from('tbl_siswa');
    $ci->db->join('tb_peserta', 'tbl_siswa.id_siswa=tb_peserta.id_siswa');
    $ci->db->where('tb_peserta.id_kelas', $id_kelas);
    $ci->db->where('id_ta', $id_ta);
    $query = $ci->db->get();
    return $query;
}

function get_kelas_byid_kelas($id_kelas)
{
    $ci = &get_instance();
    $ci->db->from('tbl_kelas');
    $ci->db->where('id_kelas', $id_kelas);
    $query = $ci->db->get();
    return $query->row();
}

function get_kelas_by_siswa($id_siswa, $id_ta = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_peserta');
    $ci->db->join('tbl_kelas', 'tb_peserta.id_kelas=tbl_kelas.id_kelas');
    $ci->db->where('tb_peserta.id_ta', $id_ta);
    $ci->db->where('tb_peserta.id_siswa', $id_siswa);
    $query = $ci->db->get();
    return $query->row();
}

function get_kelas_all()
{
    $ci = &get_instance();
    $ci->db->from('tbl_kelas');
    $ci->db->order_by('nama_kelas', 'ASC');
    $query = $ci->db->get();
    return $query;
}

function get_kelas_spesifik($atribut, $condition)
{
    $ci = &get_instance();
    $ci->db->from('tbl_kelas');
    $ci->db->where($atribut, $condition);
    $query = $ci->db->get();
    return $query;
}

function get_siswa_all($id_siswa = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_siswa');
    if (@$id_siswa != null) {
        $ci->db->where('id_siswa', $id_siswa);
    } else {
        $ci->db->order_by('nama_siswa', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function cek_siswa_peserta($id_siswa, $id_ta)
{
    $ci = &get_instance();
    $ci->db->from('tb_peserta');
    $ci->db->where('id_siswa', $id_siswa);
    $ci->db->where('id_ta', $id_ta);
    $query = $ci->db->get();
    return $query;
}

function delete_peserta_with_kelas($id_kelas)
{
    $ci = &get_instance();
    $ci->db->where('id_kelas', $id_kelas);
    $ci->db->delete('tb_peserta');
}


function update_user_insiswa($id_siswa, $id_user)
{
    $ci = &get_instance();
    $params['id_user'] = $id_user;
    $ci->db->where('id_siswa', $id_siswa);
    $ci->db->update('tbl_siswa', $params);
}

function delete_user_siswa($id)
{
    $ci = &get_instance();
    $ci->db->where('id_user', $id);
    $ci->db->delete('tbl_user');
}

function cek_ta_already($val)
{
    $ci = &get_instance();
    $ci->db->from('tbl_tahun_ajaran');
    $ci->db->where('nama_ta', $val);
    $query = $ci->db->get();
    return $query;
}

function get_ta($atribut = null, $value = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_tahun_ajaran');
    if ($atribut != null && $value != null) {
        $ci->db->where($atribut, $value);
    } else {
        $ci->db->order_by('nama_ta', 'DESC');
    }
    $query = $ci->db->get();
    return $query;
}

function get_mapel($atribut = null, $value = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_mapel');
    if ($atribut != null && $value != null) {
        $ci->db->where($atribut, $value);
    } else {
        $ci->db->order_by('nama_mapel', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function cek_wali_kelas($id_guru)
{
    $ci = &get_instance();
    $ci->db->from('tbl_kelas');
    $ci->db->where('id_guru', $id_guru);
    $query = $ci->db->get();
    return $query;
}

function get_random_color($val)
{
    if ($val > 4) {
        $val = rand(1, 4);
    }
    switch ($val) {
        case 1:
            return 'danger';
            break;
        case 2:
            return 'warning';
            break;
        case 3:
            return 'success';
            break;
        case 4:
            return 'info';
            break;
    }
}

function get_nilai_siswa_id($id_siswa, $id_mapel, $id_ta)
{
    $ci = &get_instance();
    $ci->db->from('tb_nilai');
    $ci->db->where('id_siswa', $id_siswa);
    $ci->db->where('id_mapel', $id_mapel);
    $ci->db->where('id_ta', $id_ta);
    $query = $ci->db->get();
    return $query->row();
}

function get_nilai_siswa_detail_id($id_siswa, $id_ta)
{
    $ci = &get_instance();
    $ci->db->from('tb_nilai_detail');
    $ci->db->where('id_siswa', $id_siswa);
    $ci->db->where('id_ta', $id_ta);
    $query = $ci->db->get();
    return $query;
}

function get_nilai_siswa_for_rekap($id_siswa, $ta)
{
    $ci = &get_instance();
    $ci->db->from('tb_nilai');
    $ci->db->where('id_siswa', $id_siswa);
    $ci->db->where('id_ta', $ta);
    $query = $ci->db->get();
    return $query;
}

function konversi_nilai_100_to_4($nilai)
{
    $temp = ($nilai / 100) * 4;
    return round($temp, 2);
}

function predikat_nilai($nilai)
{
    if ($nilai == 0.00) {
        return 'E';
    } else if ($nilai > 0.00 && $nilai <= 1.00) {
        return 'D';
    } else if ($nilai > 1.00 && $nilai <= 1.33) {
        return 'D+';
    } else if ($nilai > 1.33 && $nilai <= 1.66) {
        return 'C-';
    } else if ($nilai > 1.66 && $nilai <= 2.00) {
        return 'C';
    } else if ($nilai > 2.00 && $nilai <= 2.33) {
        return 'C+';
    } else if ($nilai > 2.33 && $nilai <= 2.66) {
        return 'B-';
    } else if ($nilai > 2.66 && $nilai <= 3.00) {
        return 'B';
    } else if ($nilai > 3.00 && $nilai <= 3.33) {
        return 'B+';
    } else if ($nilai > 3.33 && $nilai <= 3.66) {
        return 'A-';
    } else if ($nilai > 3.66 && $nilai <= 4.00) {
        return 'A';
    } else {
        return '-';
    }
}

function klasifikasi_nilai($nilai)
{
    if ($nilai <= 100 && $nilai > 80) {
        return '<span class="badge bg-success">Terbaik</span>';
    } else if ($nilai <= 80 && $nilai > 65) {
        return '<span class="badge bg-warning">Baik</span>';
    } else if ($nilai <= 65 && $nilai > 50) {
        return '<span class="badge text-white" style="background-color: #EE5A24;">Cukup</span>';
    } else if ($nilai <= 50 && $nilai >= 0) {
        return '<span class="badge bg-danger">Kurang</span>';
    }
}

function get_bgcolor_by_predikat($nilai)
{
    if ($nilai <= 100 && $nilai > 80) {
        return 'style="background-color: #009432;color:#FFFFFF"';
    } else if ($nilai <= 80 && $nilai > 65) {
        return 'style="background-color: #FFC312;color:#FFFFFF"';
    } else if ($nilai <= 65 && $nilai > 50) {
        return 'style="background-color: #EE5A24;color:#FFFFFF"';
    } else if ($nilai <= 50 && $nilai >= 0) {
        return 'style="background-color: #EA2027;color:#FFFFFF"';
    }
}


function get_all_task_penilaian($type)
{
    $all_task = get_mapel()->num_rows() * get_siswa_all()->num_rows();
    $task_done = 0;
    foreach (get_mapel()->result() as $key => $mapel) {
        foreach (get_siswa_all()->result() as $key => $siswa) {
            $data = get_nilai_siswa_id($siswa->id_siswa, $mapel->id_mapel, get_ta('status_ta', 1)->row()->id_ta);
            if ($data) {
                $task_done = $task_done + 1;
            }
        }
    }

    if ($type == 'all_task') {
        return $all_task;
    } else if ($type == 'task_done') {
        return $task_done;
    } else {
        return 0;
    }
}

function get_kriteria($id_kriteria = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_kriteria');
    if (@$id_kriteria) {
        $ci->db->where('id_kriteria', $id_kriteria);
    } else {
        $ci->db->order_by('kode_kriteria', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function get_sub_kriteria($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_sub_kriteria');
    $ci->db->where('id_kriteria', $id);
    $query = $ci->db->get();
    return $query;
}

function cek_rekomendasi($id_ta, $id_siswa)
{
    $n_siswa = get_nilai_siswa_for_rekap($id_siswa, $id_ta);
    $val_failed = 0;
    foreach ($n_siswa->result() as $key => $n) {
        $val = [$n->nilai_uts, $n->nilai_uas, $n->nilai_uh, $n->nilai_tugas, $n->nilai_kehadiran];
        foreach (get_kriteria()->result() as $tos => $value) {
            $val[$tos] = $val[$tos] * ($value->bobot_kriteria / 100);
        }
        $total = 0;
        foreach ($val as $con) {
            $total = $total + $con;
        }
        if($total < 75){
            $val_failed +=1;
        }
    }

    if($val_failed > 3){
        $params = [
            'status' => 'Tinggal Kelas',
            'catatan '=> 'Terdapat lebih dari 3 Mata Pelajaran dengan nilai dibawah KKM',
        ];
    }else if($val_failed > 0 && $val_failed <=3 ){
        $params = [
            'status' => 'Naik Bersyarat',
            'catatan '=> 'Terdapat '.$val_failed.' Mata Pelajaran dengan nilai dibawah KKM',
        ];
    }else{
        $params = [
            'status' => 'Naik Kelas',
            'catatan '=> 'Siswa Memenuhi Kriteria Kenaikan Kelas',
        ];
    }

    return $params;
}
