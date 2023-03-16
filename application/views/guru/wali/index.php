<?php
$saw = artisan('kelas', $kelas->id_kelas);
?>
<div class="card direct-chat direct-chat-primary">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h2 class="card-title"><b><i class="fa fa-building"></i> Portal Wali Kelas</b></h2>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row p-3">
            <?php if (@$kelas) { ?>
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a href="<?= site_url('guru/wali') ?>" class="nav-link <?= $this->uri->segment(3) == '' ? 'active' : '' ?>">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('guru/wali/penilaian') ?>" class="nav-link <?= $this->uri->segment(3) == 'penilaian' ? 'active' : '' ?>">Penilaian</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('guru/wali/rekomendasi') ?>" class="nav-link <?= $this->uri->segment(3) == 'rekomendasi' ? 'active' : '' ?>">Rekomendasi SPK</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <div class="tab-content" id="custom-content-above-tabContent">
                        <div class="tab-pane fade <?= $this->uri->segment(3) == '' ? 'active show' : '' ?>">
                            <div class="row">
                                <div class="col-sm-5 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="callout callout-danger">
                                                <table class="table">
                                                    <tr>
                                                        <td><b>Nama Kelas</b></td>
                                                        <td>:</td>
                                                        <td> <?= $kelas->nama_kelas ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Wali Kelas</b></td>
                                                        <td>:</td>
                                                        <td> <?= $kelas->nama_guru ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jumlah Siswa</b></td>
                                                        <td>:</td>
                                                        <td> <?= get_pesert_byid_kelas($kelas->id_kelas, $ta->id_ta)->num_rows() ?> Peserta</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tahun Ajaran</b></td>
                                                        <td>:</td>
                                                        <td> <?= $ta->nama_ta ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="callout callout-warning">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th width="3%">No</th>
                                                                <th>NISN</th>
                                                                <th>Nama</th>
                                                                <th>Jenis Kelamin</th>
                                                                <th>Orang Tua</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach (get_pesert_byid_kelas($kelas->id_kelas, $ta->id_ta)->result() as $key => $siswa) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= get_siswa_all($siswa->id_siswa)->row()->nisn_siswa ?></td>
                                                                    <td><?= get_siswa_all($siswa->id_siswa)->row()->nama_siswa ?></td>
                                                                    <td><?= get_siswa_all($siswa->id_siswa)->row()->gender_siswa == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
                                                                    <td><?= get_siswa_all($siswa->id_siswa)->row()->orang_tua_siswa ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade <?= $this->uri->segment(3) == 'penilaian' ? 'active show' : '' ?>">
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <div class="callout callout-info">
                                        <form action="" method="get">
                                            <label for="">Pilih Peserta Didik *</label>
                                            <div class="input-group input-group-sm">
                                                <select name="siswa" class="form-control">
                                                    <option value="">- pilih siswa -</option>
                                                    <?php foreach (get_peserta_join_siswa($kelas->id_kelas, get_ta('status_ta', 1)->row()->id_ta)->result() as $key => $siswa) { ?>
                                                        <option value="<?= $siswa->id_siswa ?>" <?= @$_GET['siswa'] == $siswa->id_siswa ? 'selected' : '' ?>><?= $siswa->nisn_siswa . ' - ' . $siswa->nama_siswa ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-info btn-flat">Pilih</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div class="callout callout-danger">
                                        <?php if (@$_GET['siswa']) { ?>
                                            <div class="table-reponsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th rowspan="2">Mata Pelajaran</th>
                                                            <th width="10%" colspan="2">UTS</th>
                                                            <th width="10%" colspan="2">UAS</th>
                                                            <th width="10%" colspan="2">UH</th>
                                                            <th width="10%" colspan="2">Tugas</th>
                                                            <th width="10%" colspan="2">Kehadiran</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Nilai</th>
                                                            <th>Konversi</th>
                                                            <th>Nilai</th>
                                                            <th>Konversi</th>
                                                            <th>Nilai</th>
                                                            <th>Konversi</th>
                                                            <th>Nilai</th>
                                                            <th>Konversi</th>
                                                            <th>Nilai</th>
                                                            <th>Konversi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach (get_mapel()->result() as $key => $mapel) {
                                                            $nilai = get_nilai_siswa_id($_GET['siswa'], $mapel->id_mapel, get_ta('status_ta', 1)->row()->id_ta); ?>
                                                            <tr>
                                                                <td><?= $mapel->nama_mapel ?></td>
                                                                <td><?= @$nilai->nilai_uts == 0 ? 0 : @$nilai->nilai_uts ?></td>
                                                                <td><?= konversi_nilai_100_to_4(@$nilai->nilai_uts) ?></td>
                                                                <td><?= @$nilai->nilai_uas == 0 ? 0 : @$nilai->nilai_uas ?></td>
                                                                <td><?= konversi_nilai_100_to_4(@$nilai->nilai_uas) ?></td>
                                                                <td><?= @$nilai->nilai_uas == 0 ? 0 : @$nilai->nilai_uh ?></td>
                                                                <td><?= konversi_nilai_100_to_4(@$nilai->nilai_uh) ?></td>
                                                                <td><?= @$nilai->nilai_tugas == 0 ? 0 : @$nilai->nilai_tugas  ?></td>
                                                                <td><?= konversi_nilai_100_to_4(@$nilai->nilai_tugas) ?></td>
                                                                <td><?= @$nilai->nilai_kehadiran == 0 ? 0 : @$nilai->nilai_kehadiran ?></td>
                                                                <td><?= konversi_nilai_100_to_4(@$nilai->nilai_kehadiran) ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } else { ?>
                                            <h5>Tidak ada data yang ditampilkan!</h5>
                                            <p>Silahkan Pilih peserta didik untuk menampilkan data nilai mata pelajaran!</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade <?= $this->uri->segment(3) == 'rekomendasi' ? 'active show' : '' ?>">
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover" id="example2">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="3%">No</th>
                                                <th>NISN Siswa</th>
                                                <th>Nama Siswa</th>
                                                <th width="7%">Kelas</th>
                                                <th width="7%">Nilai</th>
                                                <th width="7%">Konversi</th>
                                                <th width="7%">Predikat</th>
                                                <th>Peringkat</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $peringkat = 1;
                                        foreach ($saw['short'] as $key => $nilai) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= get_siswa_all($nilai[1])->row()->nisn_siswa ?></td>
                                                <td><?= get_siswa_all($nilai[1])->row()->nama_siswa ?></td>
                                                <td><?= get_kelas_by_siswa($nilai[1], get_ta('status_ta', 1)->row()->id_ta)->nama_kelas ?></td>
                                                <td class="text-center"><?= $nilai[0] ?></td>
                                                <td class="text-center"><?= konversi_nilai_100_to_4($nilai[0]) ?></td>
                                                <td class="text-center"><?= predikat_nilai(konversi_nilai_100_to_4($nilai[0])) ?></td>
                                                <td class="text-center" <?= get_bgcolor_by_predikat($nilai[0]) ?>>Peringkat <?= $peringkat++ ?></td>
                                                <td class="text-center"> <?= klasifikasi_nilai($nilai[0]) ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-sm-10 offset-sm-1">
                    <div class="callout callout-danger">
                        <h5><i class="icon fas fa-ban"></i> Anda Bukan Wali Kelas</h5>

                        <p>Anda tidak terdaftar sebagai Wali Kelas, Silahkan hubungi admin SIPKK untuk mengakses fitur ini...</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>