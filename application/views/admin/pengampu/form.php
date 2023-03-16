<?php if ($this->uri->segment(3) == 'insert') { ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="card-title">Manajemen Data Pengampu Mata Pelajaran <?= @$_GET['ta'] ?></h2>
                </div>
                <div class="col-sm-3">
                    <a href="<?= site_url('admin/pengampu?ta=' . @$_GET['ta']) ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Pengampu </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/pengampu/proses') ?>" method="post">
                <input type="hidden" name="id_ta" value="<?= get_ta('nama_ta', $_GET['ta'])->row()->id_ta ?>">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <td width="3%">No</td>
                                    <td>Kelas</td>
                                    <td>Mata Pelajaran</td>
                                    <td>Guru Pengampu</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i <= $_GET['sum']; $i++) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <select name="p_kelas[]" class="form-control selectpicker" data-live-search="true">
                                                <option value="">- pilih kelas -</option>
                                                <?php foreach (get_kelas_all()->result() as $key => $kelas) { ?>
                                                    <option value="<?= $kelas->id_kelas ?>"><?= $kelas->nama_kelas ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="p_mapel[]" class="form-control selectpicker" data-live-search="true">
                                                <option value="">- pilih mata pelajaran -</option>
                                                <?php foreach (get_mapel()->result() as $key => $mapel) { ?>
                                                    <option value="<?= $mapel->id_mapel ?>"><?= $mapel->kode_mapel . ' - ' . $mapel->nama_mapel ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="p_guru[]" class="form-control selectpicker" data-live-search="true">
                                                <option value="">- pilih kelas -</option>
                                                <?php foreach (get_guru_all()->result() as $key => $guru) { ?>
                                                    <option value="<?= $guru->id_guru ?>"><?= $guru->nama_guru . ' [' . $guru->tugas_guru . ']' ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" name="insert" class="btn btn-sm btn-success float-right btn-block"><i class="fa fa-edit"></i> Tambah Daftar Pengampu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } else if ($this->uri->segment(3) == 'update') {
    $ta = get_ta('id_ta', $row->id_ta)->row(); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="card-title">Manajemen Data Pengampu Mata Pelajaran <?= $ta->nama_ta ?></h2>
                </div>
                <div class="col-sm-3">
                    <a href="<?= site_url('admin/pengampu?ta=' . $ta->nama_ta) ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Pengampu </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/pengampu/proses') ?>" method="post">
                <input type="hidden" name="id" value="<?= $row->id_pengampu ?>">
                <input type="hidden" name="ta" value="<?= get_ta('id_ta', $row->id_ta)->row()->nama_ta ?>">
                <div class=" col-sm-12">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <td>Kelas</td>
                                <td>Mata Pelajaran</td>
                                <td>Guru Pengampu</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="p_kelas" class="form-control selectpicker" data-live-search="true">
                                        <option value="">- pilih kelas -</option>
                                        <?php foreach (get_kelas_all()->result() as $key => $kelas) { ?>
                                            <option value="<?= $kelas->id_kelas ?>" <?= $kelas->id_kelas == $row->id_kelas ? 'selected' : '' ?>><?= $kelas->nama_kelas ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="p_mapel" class="form-control selectpicker" data-live-search="true">
                                        <option value="">- pilih mata pelajaran -</option>
                                        <?php foreach (get_mapel()->result() as $key => $mapel) { ?>
                                            <option value="<?= $mapel->id_mapel ?>" <?= $mapel->id_mapel == $row->id_mapel ? 'selected' : '' ?>><?= $mapel->kode_mapel . ' - ' . $mapel->nama_mapel ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="p_guru" class="form-control selectpicker" data-live-search="true">
                                        <option value="">- pilih kelas -</option>
                                        <?php foreach (get_guru_all()->result() as $key => $guru) { ?>
                                            <option value="<?= $guru->id_guru ?>" <?= $guru->id_guru == $row->id_guru ? 'selected' : '' ?>><?= $guru->nama_guru . ' [' . $guru->tugas_guru . ']' ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-sm btn-success float-right btn-block"><i class="fa fa-edit"></i> Perbaharui Data Pengampu</button>
                </div>
        </div>
        </form>
    </div>
    </div>
<?php } ?>