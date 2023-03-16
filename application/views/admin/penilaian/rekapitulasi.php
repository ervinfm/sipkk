<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 class="card-title">Rekapitulasi Penilaian Mata Pelajaran</h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="<?= site_url('admin/penilaian?ta=' . (get_ta('id_ta', $this->uri->segment(4))->row()->nama_ta)) ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Mata Pelajaran </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example2">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th width="15%">NISN Siswa</th>
                                    <th width="25%">Nama Siswa</th>
                                    <th width="10%">Total Nilai</th>
                                    <th width="10%">Konversi</th>
                                    <th width="10%">Predikat</th>
                                    <th width="15%">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach (get_siswa_all()->result() as $key => $siswa) {
                                    $total = 0;
                                    $nilai = get_nilai_siswa_for_rekap($siswa->id_siswa, $this->uri->segment(4));
                                    if ($nilai->num_rows() > 0) {
                                        foreach ($nilai->result() as $key => $val) {
                                            $total = $total + ((($val->nilai_tugas + $val->nilai_kehadiran) / 2) + $val->nilai_uts + $val->nilai_uas);
                                            $total = $total / 4;
                                        }
                                    } else {
                                        $total = 0;
                                    } ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $siswa->nisn_siswa ?></td>
                                        <td><?= $siswa->nama_siswa ?></td>
                                        <td><?= round($total, 2) ?></td>
                                        <td><?= konversi_nilai_100_to_4($total) ?></td>
                                        <td><?= predikat_nilai(konversi_nilai_100_to_4($total)) ?></td>
                                        <td>
                                            <?php if ($nilai->num_rows() < get_mapel()->num_rows()) { ?>
                                                <span class="badge bg-warning"><?= $nilai->num_rows() . ' dari ' . get_mapel()->num_rows() ?> Mapel</span>
                                            <?php } else { ?>
                                                <span class="badge bg-success"><?= $nilai->num_rows() . ' dari ' . get_mapel()->num_rows() ?> Mapel</span>
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