<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Pengampu Mata Pelajaran <?= @$_GET['ta'] ?></h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/pengampu/insert?ta=' . @$_GET['ta']) ?>" data-toggle="modal" data-target="#modal-insert" class="btn btn-sm btn-success float-right mr-1"><i class="fa fa-plus"></i> Tambah </a>
                <div class="modal fade" id="modal-insert">
                    <div class="modal-dialog">
                        <form action="<?= site_url('admin/pengampu/insert') ?>" method="get">
                            <input type="hidden" name="ta" value="<?= @$_GET['ta'] ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Pengampu</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Tentukan Jumlah Data yang akan ditambahkan *</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="sum" min="1" max="10" class="form-control" required>
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="btn btn-danger">Kirim</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (@$_GET['ta']) { ?>
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th>Nama Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru Pengampu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= get_kelas_byid_kelas($data->id_kelas)->id_kelas . ' - ' . get_kelas_byid_kelas($data->id_kelas)->nama_kelas ?></td>
                                    <td><?= get_mapel('id_mapel', $data->id_mapel)->row()->kode_mapel . ' - ' . get_mapel('id_mapel', $data->id_mapel)->row()->nama_mapel ?></td>
                                    <td><?= get_guru_all($data->id_guru)->row()->nama_guru ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/pengampu/update/' . $data->id_pengampu) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="<?= site_url('admin/pengampu/delete/' . $data->id_pengampu) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus data pengampu Mata Pelajaran ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="col-sm-6 offset-sm-3 mb-2">
                    <form action="" method="get">
                        <label for="">Pilih Tahun Ajaran *</label>
                        <div class="input-group input-group-sm">
                            <select name="ta" class="form-control" required>
                                <?php foreach (get_ta()->result() as $key => $ta) {
                                    if (@$_GET['ta']) { ?>
                                        <option value="<?= $ta->nama_ta ?>" <?= @$_GET['ta'] == $ta->nama_ta ? 'selected' : '' ?>><?= $ta->nama_ta ?> <?= get_ta('status_ta', 1)->row()->id_ta == $ta->id_ta ? ' (berjalan)' : '' ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $ta->nama_ta ?>" <?= get_ta('status_ta', 1)->row()->nama_ta == $ta->nama_ta ? 'selected' : '' ?>><?= $ta->nama_ta ?> <?= get_ta('status_ta', 1)->row()->id_ta == $ta->id_ta ? ' (berjalan)' : '' ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat">Pilih</button>
                            </span>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>