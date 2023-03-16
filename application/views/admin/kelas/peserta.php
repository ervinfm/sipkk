<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Kelas <?= get_kelas_byid_kelas($this->uri->segment(4))->nama_kelas ?></h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/kelas') ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Kelas </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="3">
                                <form action="" method="get">
                                    <div class="input-group input-group-sm">
                                        <select name="ta" class="form-control" required>
                                            <?php foreach (get_ta()->result() as $key => $ta) { ?>
                                                <option value="<?= $ta->nama_ta ?>" <?= @$_GET['ta'] == $ta->nama_ta ? 'selected' : '' ?>><?= $ta->nama_ta ?> <?= get_ta('status_ta', 1)->row()->id_ta == $ta->id_ta ? ' (berjalan)' : '' ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat">Pilih</button>
                                        </span>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Nama Kelas</td>
                            <td width="5%">:</td>
                            <td><?= get_kelas_byid_kelas($this->uri->segment(4))->nama_kelas ?></td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>:</td>
                            <td>
                                <?php
                                $tmp = get_kelas_byid_kelas($this->uri->segment(4))->id_guru;
                                if (get_guru_all($tmp)->num_rows() > 0) {
                                    echo get_guru_all($tmp)->row()->nama_guru;
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Total Peserta</td>
                            <td>:</td>
                            <td><?= get_pesert_byid_kelas($this->uri->segment(4), get_ta('nama_ta', $_GET['ta'])->row()->id_ta)->num_rows() ?> Peserta</td>
                        </tr>
                    </table>
                </div>
                <a href="#" class="btn btn-sm btn-success btn-block" data-toggle="modal" data-target="#insertModal"><i class="fa fa-plus"></i> Tambah Peserta Kelas</a>
                <div class="modal fade" id="insertModal">
                    <form action="<?= site_url('admin/kelas/proses') ?>" method="post">
                        <input type="hidden" name="id_kelas" value="<?= $this->uri->segment(4) ?>">
                        <input type="hidden" name="id_ta" value="<?= get_ta('nama_ta', $_GET['ta'])->row()->id_ta ?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Kelas <?= get_kelas_byid_kelas($this->uri->segment(4))->nama_kelas ?></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered " id="example4">
                                            <thead>
                                                <tr>
                                                    <th width="5%">Pilih</th>
                                                    <th>NISN Siswa</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Jenis Kelamin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (get_siswa_all()->result() as $key => $siswa) {
                                                    if (cek_siswa_peserta($siswa->id_siswa, get_ta('nama_ta', $_GET['ta'])->row()->id_ta)->num_rows() == 0) { ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="member[]" value="<?= $siswa->id_siswa ?>">
                                                            </td>
                                                            <td><?= $siswa->nisn_siswa ?></td>
                                                            <td><?= $siswa->nama_siswa ?></td>
                                                            <td><?= $siswa->gender_siswa == '1' ? 'Laki-laki' : 'Perempuan' ?></td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="tambah_peserta" class="btn btn-primary">Simpan Perubahan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>NISN Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th width="10%">Aksi</th>
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
                                        <a href="<?= site_url('admin/kelas/peserta_delete/' . $data->id_peserta . '/' . $this->uri->segment(4) . '?ta=' . $_GET['ta']) ?>" class="text-danger" style="border-radius:50%">
                                            <i class="fa fa-times-circle" style="font-size: 20px;"></i>
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