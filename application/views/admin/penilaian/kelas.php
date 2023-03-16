<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-9">
                        <h2 class="card-title">Penilaian Mata Pelajaran</h2>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('admin/penilaian') ?>" class="btn btn-sm btn-info float-right"><i class="fa fa-table"></i> Data Kelas</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="callout callout-warning">
                            <table class="table">
                                <tr>
                                    <td width="30%">Nama Kelas</td>
                                    <td width="5%">:</td>
                                    <td><?= get_kelas_all($row->row()->id_kelas)->row()->nama_kelas ?></td>
                                </tr>
                                <tr>
                                    <td>Wali Kelas</td>
                                    <td>:</td>
                                    <td><?= get_guru_all(get_kelas_all($row->row()->id_kelas)->row()->id_guru)->row()->nama_guru ?></td>
                                </tr>
                                <tr>
                                    <td>Tahun Ajaran</td>
                                    <td>:</td>
                                    <td><?= get_ta('id_ta', $row->row()->id_ta)->row()->nama_ta ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="callout callout-danger">
                            <table class="table table-bordered table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>NISN Siswa</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th width="15%">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= get_siswa_all($data->id_siswa)->row()->nisn_siswa ?></td>
                                            <td><?= get_siswa_all($data->id_siswa)->row()->nama_siswa ?></td>
                                            <td><?= get_siswa_all($data->id_siswa)->row()->gender_siswa == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
                                            <td align="center">
                                                <a href="<?= site_url('admin/penilaian/siswa/' . $data->id_siswa . '/' . $this->uri->segment(4) . '/'  . $this->uri->segment(5)) ?>" class="btn btn-sm btn-info text-white">
                                                    <i class="fa fa-eye"></i> Nilai
                                                </a>
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