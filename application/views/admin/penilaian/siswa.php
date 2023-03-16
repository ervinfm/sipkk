<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-9">
                        <h2 class="card-title">Penilaian Mata Pelajaran</h2>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('admin/penilaian/kelas/' . $this->uri->segment(5) . '/' . $this->uri->segment(6)) ?>" class="btn btn-sm btn-info float-right"><i class="fa fa-table"></i> Data Kelas</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="callout callout-warning">
                            <table class="table">
                                <tr>
                                    <td width="30%">NISN Siswa</td>
                                    <td width="5%">:</td>
                                    <td><?= $siswa->nisn_siswa ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Siswa</td>
                                    <td>:</td>
                                    <td><?= $siswa->nama_siswa ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="callout callout-info">
                            <table class="table">
                                <tr>
                                    <td width="30%">Kelas</td>
                                    <td width="5%">:</td>
                                    <td><?= get_kelas_all($this->uri->segment(5))->row()->nama_kelas ?></td>
                                </tr>
                                <tr>
                                    <td>Tahun Ajaran</td>
                                    <td>:</td>
                                    <td><?= get_ta('id_ta', $this->uri->segment(6))->row()->nama_ta ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="callout callout-danger">
                            <table class="table table-bordered table-striped" id="example2">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%" rowspan="2">No</th>
                                        <th rowspan="2">Mata Pelajaran</th>
                                        <th colspan="5">Penilaian Mata Pelajaran</th>
                                        <th width="10%" rowspan="2">Status</th>
                                    </tr>
                                    <tr>
                                        <th width="10%">Kehadiran</th>
                                        <th width="10%">Tugas</th>
                                        <th width="10%">Ulangan Harian</th>
                                        <th width="10%">UTS</th>
                                        <th width="10%">UAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach (get_mapel()->result() as $key => $mapel) {
                                        $nilai = get_nilai_siswa_id($siswa->id_siswa, $mapel->id_mapel, $this->uri->segment(6)); ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $mapel->kode_mapel . ' - ' . $mapel->nama_mapel ?></td>
                                            <td class="text-center"><?= @$nilai->nilai_kehadiran == false ? '0' : @$nilai->nilai_kehadiran ?></td>
                                            <td class="text-center"><?= @$nilai->nilai_tugas == false ? '0' : @$nilai->nilai_tugas ?></td>
                                            <td class="text-center"><?= @$nilai->nilai_tugas == false ? '0' : @$nilai->nilai_uh ?></td>
                                            <td class="text-center"><?= @$nilai->nilai_uts == false ? '0' : @$nilai->nilai_uts ?></td>
                                            <td class="text-center"><?= @$nilai->nilai_uas == false ? '0' : @$nilai->nilai_uas ?></td>
                                            <td class="text-center">
                                                <?php if (@$nilai->nilai_tugas == TRUE && @$nilai->nilai_kehadiran == TRUE &&  @$nilai->nilai_uts == TRUE && @$nilai->nilai_uas == TRUE && @$nilai->nilai_uh == TRUE) { ?>
                                                    <span class="badge bg-success">Selesai</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Belum</span>
                                                <?php } ?>
                                            </td>
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