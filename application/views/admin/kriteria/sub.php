<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Sub Kriteria Kenaikan Kelas</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/kriteria') ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Kriteria </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <a href="<?= site_url('admin/kriteria/sub_insert/' . $this->uri->segment(4)) ?>" class="btn btn-sm btn-success float-right mr-1"><i class="fa fa-plus"></i> Tambah </a>
            </div>
            <div class="col-sm-12 mt-2">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Sub Kriteria</th>
                            <th>Bobot Sub Kriteria</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $data->sub_kriteria ?></td>
                                <td><?= $data->bobot_sub_kriteria ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('admin/kriteria/sub_update/' . $data->id_sub_kriteria) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('admin/kriteria/sub_delete/' . $data->id_sub_kriteria . '/' . $data->id_kriteria) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus data Sub Kriteria ?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>