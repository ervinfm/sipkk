<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Tahun Ajaran</h2>
            </div>
            <div class="col-sm-3">
                <a href="#" class="btn btn-sm btn-success float-right mr-1" data-toggle="modal" data-target="#modal-insert"><i class="fa fa-plus"></i> Tambah </a>
                <div class="modal fade" id="modal-insert">
                    <div class="modal-dialog">
                        <form action="<?= site_url('admin/ta/proses') ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Tahun Ajaran</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tahun Ajaran - Semester</label>
                                        <input type="text" name="ta_insert" class="form-control" id="exampleInputEmail1" placeholder="ex. 2019-2020 Gasal" required>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="insert" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/ta/proses') ?>" method="post" id="form">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="3%">No</th>
                                <th>Tahun Ajaran</th>
                                <th width="20%">Status Tahun Ajaran</th>
                                <th width="12%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td class="text-center"><?= $key + 1 ?></td>
                                    <td><?= $data->nama_ta ?></td>
                                    <td class="text-center">
                                        <?php if ($data->status_ta == 0) { ?>
                                            <a href="<?= site_url('admin/ta/change/' . $data->id_ta) ?>" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Non-Aktif</a>
                                        <?php } else if ($data->status_ta == 1) { ?>
                                            <a href="<?= site_url('admin/ta/change/' . $data->id_ta) ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Berjalan</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-<?= $data->id_ta ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?= site_url('admin/ta/delete/' . $data->id_ta) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus data Tahun Ajaran ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-<?= $data->id_ta ?>">
                                    <div class="modal-dialog">
                                        <form action="<?= site_url('admin/ta/proses') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $data->id_ta ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Tahun Ajaran</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tahun Ajaran - Semester</label>
                                                        <input type="text" name="ta_update" class="form-control" value="<?= $data->nama_ta ?>" id="exampleInputEmail1" placeholder="ex. 2019-2020 Gasal" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>