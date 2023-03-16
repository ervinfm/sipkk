<div class="row">
    <div class="col-sm-8">
        <div class="callout callout-info">
            <div class="row">
                <div class="col-sm-12">
                    <h5><b>Proses Penilaian Kenaikan Kelas dengan Model <i>Simple Additive Weighting</i> (SAW)</b></h5>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                        Untuk Hasil Penilaian SPK yang optimal, pastikan nilai mata pelajaran seluruh siswa sudah di masukkan ke sistem!
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="row">
                        <div class="col-sm-3 mt-3">
                            <label>Progres Penilaian</label>
                        </div>
                        <div class="col-sm-6">
                            <input id="range_5" type="text" name="range_5" value="">
                        </div>
                        <div class="col-sm-3 mt-3">
                            <span class="badge bg-<?= get_all_task_penilaian('task_done') >= get_all_task_penilaian('all_task') ? 'success' : 'warning' ?> float-right"><?= get_all_task_penilaian('task_done') . ' dari ' . get_all_task_penilaian('all_task') ?> Penilaian</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="callout callout-success">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td width="35%">Tahun Ajaran</td>
                                <td width="3%">:</td>
                                <td><?= get_ta('status_ta', 1)->row()->nama_ta ?></td>
                            </tr>
                            <tr>
                                <td>Total Kelas</td>
                                <td>:</td>
                                <td><?= get_kelas_all()->num_rows() ?> Kelas</td>
                            </tr>
                            <tr>
                                <td>Status Data</td>
                                <td>:</td>
                                <td><?= get_all_task_penilaian('task_done') >= get_all_task_penilaian('all_task') ? '<span class="badge bg-success">Optimal</span>' : '<span class="badge bg-warning">Tidak Optimal</span>' ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <select name="tingkat" class="form-control">
                                                <option value="">- pilih tingakat -</option>
                                                <option value="1" <?= @$_GET['tingkat'] == 1 ? 'selected' : '' ?>>Tingkat 1</option>
                                                <option value="2" <?= @$_GET['tingkat'] == 2 ? 'selected' : '' ?>>Tingkat 2</option>
                                            </select>
                                            <div class="input-group-prepend">
                                                <button type="submit" class="btn btn-danger">Pilih</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (@$_GET['tingkat']) { ?>
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Perhitungan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Rekomendasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="true">Rincian Rekomendasi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h3 class="card-title">
                                        <b> A. Analisis dan Konversi Data Nilai</b>
                                    </h3>
                                </div>
                                <div class="col-sm-8">
                                    <span class="badge bg-dark float-right">
                                        Persentase :
                                        <?php foreach (get_kriteria()->result() as $key => $crie) {
                                            echo $crie->kode_kriteria . ' : ' . $crie->bobot_kriteria . '%| ';
                                        } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cord-body table-responsive">
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover" id="example2">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="3%" rowspan="2">No</th>
                                                <th rowspan="2">NISN Siswa</th>
                                                <th rowspan="2">Nama Siswa</th>
                                                <th rowspan="2" width="10%">Kelas</th>
                                                <th colspan="5">Rata-rata Penilaian Mata Pelajaran</th>
                                                <th rowspan="2" width="5%">Total</th>
                                            </tr>
                                            <tr>
                                                <th width="5%">UTS</th>
                                                <th width="5%">UAS</th>
                                                <th width="5%">UH</th>
                                                <th width="5%">Tugas</th>
                                                <th width="5%">Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($saw['analisis'] as $key => $nilai) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= get_siswa_all($nilai[0])->row()->nisn_siswa ?></td>
                                                    <td><?= get_siswa_all($nilai[0])->row()->nama_siswa ?></td>
                                                    <td><?= get_kelas_by_siswa($nilai[0], get_ta('status_ta', 1)->row()->id_ta)->nama_kelas ?></td>
                                                    <td><?= $nilai[1] ?></td>
                                                    <td><?= $nilai[2] ?></td>
                                                    <td><?= $nilai[3] ?></td>
                                                    <td><?= $nilai[4] ?></td>
                                                    <td><?= $nilai[5] ?></td>
                                                    <td><?= $nilai[1] + $nilai[2] + $nilai[3] + $nilai[4] + $nilai[5] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h3 class="card-title">
                                        <b> B. Normalisasi Data Nilai</b>
                                    </h3>
                                </div>
                                <div class="col-sm-8">
                                    <span class="badge bg-dark float-right">
                                        Persentase :
                                        <?php foreach (get_kriteria()->result() as $key => $crie) {
                                            echo $crie->kode_kriteria . ' : ' . $crie->bobot_kriteria . '%| ';
                                        } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cord-body table-responsive">
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover" id="example22">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="3%" rowspan="2">No</th>
                                                <th rowspan="2">NISN Siswa</th>
                                                <th rowspan="2">Nama Siswa</th>
                                                <th rowspan="2" width="10%">Kelas</th>
                                                <th colspan="5">Penilaian</th>
                                                <th rowspan="2" width="5%">Total</th>
                                            </tr>
                                            <tr>
                                                <th width="5%">UTS</th>
                                                <th width="5%">UAS</th>
                                                <th width="5%">UH</th>
                                                <th width="5%">Tugas</th>
                                                <th width="5%">Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($saw['normalisasi'] as $key => $nilai) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= get_siswa_all($nilai[0])->row()->nisn_siswa ?></td>
                                                <td><?= get_siswa_all($nilai[0])->row()->nama_siswa ?></td>
                                                <td><?= get_kelas_by_siswa($nilai[0], get_ta('status_ta', 1)->row()->id_ta)->nama_kelas ?></td>
                                                <td><?= $nilai[1] ?></td>
                                                <td><?= $nilai[2] ?></td>
                                                <td><?= $nilai[3] ?></td>
                                                <td><?= $nilai[4] ?></td>
                                                <td><?= $nilai[5] ?></td>
                                                <td><?= $nilai[1] + $nilai[2] + $nilai[3] + $nilai[4] + $nilai[5] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h3 class="card-title">
                                        <b> C. Akumulasi Bobot Kepentingan</b>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="cord-body table-responsive">
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover" id="example23">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="3%" rowspan="2">No</th>
                                                <th rowspan="2">NISN Siswa</th>
                                                <th rowspan="2">Nama Siswa</th>
                                                <th rowspan="2" width="10%">Kelas</th>
                                                <th colspan="5">Penilaian</th>
                                                <th rowspan="2" width="5%">Total</th>
                                            </tr>
                                            <tr>
                                                <th width="5%">UTS</th>
                                                <th width="5%">UAS</th>
                                                <th width="5%">UH</th>
                                                <th width="5%">Tugas</th>
                                                <th width="5%">Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($saw['rank'] as $key => $nilai) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= get_siswa_all($nilai[0])->row()->nisn_siswa ?></td>
                                                <td><?= get_siswa_all($nilai[0])->row()->nama_siswa ?></td>
                                                <td><?= get_kelas_by_siswa($nilai[0], get_ta('status_ta', 1)->row()->id_ta)->nama_kelas ?></td>
                                                <td><?= $nilai[1] ?></td>
                                                <td><?= $nilai[2] ?></td>
                                                <td><?= $nilai[3] ?></td>
                                                <td><?= $nilai[4] ?></td>
                                                <td><?= $nilai[5] ?></td>
                                                <td><?= $nilai[1] + $nilai[2] + $nilai[3] + $nilai[4] + $nilai[5] ?></td>

                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h3 class="card-title">
                                        <b> Perangkingan dan Rekomendasi</b>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="cord-body table-responsive">
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover" id="example24">
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
                                        $no = 1;
                                        foreach ($saw['short'] as $key => $nilai) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
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
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="card card-dark card-outline">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h3 class="card-title">
                                            <b> Rincian Kenaikan</b>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="cord-body table-responsive">
                                <div class="row m-2">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-striped table-hover" id="example25">
                                            <thead class="text-center">
                                                <tr>
                                                    <th width="5%">Peringkat</th>
                                                    <th>NISN Siswa</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $peringkat = 1;
                                            $no = 1;
                                            foreach ($saw['short'] as $key => $nilai) { 
                                                $detail = cek_rekomendasi(get_ta('status_ta',1)->row()->id_ta, $nilai[1]);?>
                                                <tr>
                                                    <td class="text-center" <?= get_bgcolor_by_predikat($nilai[0]) ?>>Peringkat <?= $peringkat++ ?></td>
                                                    <td><?= get_siswa_all($nilai[1])->row()->nisn_siswa ?></td>
                                                    <td><?= get_siswa_all($nilai[1])->row()->nama_siswa ?></td>
                                                    <td class="text-center"><?= $detail['status'] ?></td>
                                                    <td> <?= $detail['catatan ']?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak Menampilkan Data!</h5>
                Silahkan pilih tingkatan kelas sebelum diproses oleh sistem!
            </div>
        </div>
    <?php } ?>
</div>