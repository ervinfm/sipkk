<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header p-0 pt-1 p-3">
                <h2 class="card-title"><b><i class="fa fa-edit"></i> Penilaian Mata Pelajaran </b> </h2>
                <a href="<?= site_url('guru/pengampu') ?>" class="btn btn-sm btn-info float-right"><i class="fa fa-table"></i> Data Pengampu </a>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="callout callout-danger">
            <div class="row">
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <td width="30%">Mata Pelajaran</td>
                            <td width="5%">:</td>
                            <td><?= get_mapel('id_mapel', $row->id_mapel)->row()->kode_mapel . ' - ' . get_mapel('id_mapel', $row->id_mapel)->row()->nama_mapel ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= get_kelas_byid_kelas($row->id_kelas)->nama_kelas ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <td width="30%">Pengampu</td>
                            <td width="5%">:</td>
                            <td><?= get_guru_all($row->id_guru)->row()->nama_guru ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>:</td>
                            <td><?= get_ta('id_ta', $row->id_ta)->row()->nama_ta ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="callout callout-success">
            <div class="table-responsive">

                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <td rowspan="10%"><b>NISN Siswa</b></td>
                            <td rowspan="20%"><b>Nama Siswa</b></td>
                            <td colspan="5"><b>Penilaian Peserta Didik</b></td>
                            <td widtth="3%" rowspan="2">Aksi</td>
                        </tr>
                        <tr>
                            <td width="10%"><b>UTS</b></td>
                            <td width="10%"><b>UAS</b></td>
                            <td width="10%"><b>UH</b></td>
                            <td width="10%"><b>Tugas</b></td>
                            <td width="10%"><b>Kehadiran</b></td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach (get_pesert_byid_kelas($row->id_kelas, $row->id_ta)->result() as $key => $data) {
                            $nilai = get_nilai_siswa_id($data->id_siswa, $row->id_mapel, get_ta('status_ta', 1)->row()->id_ta); ?>
                            <form action="<?= site_url('guru/pengampu/proses') ?>" method="post">
                                <tr>
                                    <td><?= get_siswa_all($data->id_siswa)->row()->nisn_siswa ?></td>
                                    <td><?= get_siswa_all($data->id_siswa)->row()->nama_siswa ?></td>
                                    <td>
                                        <input type="number" name="uts" value="<?= @$nilai->nilai_uts ?>" step="0.1" min="0" max="100" placeholder="100" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="uas" value="<?= @$nilai->nilai_uas ?>" step="0.1" min="0" max="100" placeholder="100" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="uh" value="<?= @$nilai->nilai_uh ?>" step="0.1" min="0" max="100" placeholder="100" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="tugas" value="<?= @$nilai->nilai_tugas ?>" step="0.1" min="0" max="100" placeholder="100" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="kehadiran" value="<?= @$nilai->nilai_kehadiran ?>" step="0.1" min="0" max="100" placeholder="100" class="form-control">
                                    </td>
                                    <td class="text-center ">
                                        <?php if (@$nilai) { ?>
                                            <input type="hidden" name="id" value="<?= $nilai->id_nilai ?>">
                                            <input type="hidden" name="id_pengampu" value="<?= $row->id_pengampu ?>">
                                            <button type="submit" name="update" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                        <?php } else { ?>
                                            <input type="hidden" name="id_pengampu" value="<?= $row->id_pengampu ?>">
                                            <input type="hidden" name="ta" value="<?= $row->id_ta ?>">
                                            <input type="hidden" name="mapel" value="<?= $row->id_mapel ?>">
                                            <input type="hidden" name="siswa" value="<?= $data->id_siswa ?>">
                                            <button type="submit" name="insert" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i></button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>