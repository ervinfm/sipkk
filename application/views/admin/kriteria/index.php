<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Kriteria Kenaikan kelas</h2>
            </div>
            <div class="col-sm-3">
                <!-- <a href="<?= site_url('admin/kriteria/insert/') ?>" class="btn btn-sm btn-success float-right mr-1"><i class="fa fa-plus"></i> Tambah </a> -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Kode Kriteria</th>
                            <th>Kriteria</th>
                            <th>Bobot Kriteria</th>
                            <th width="12%">Sub Kriteria</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $data->kode_kriteria ?></td>
                                <td><?= $data->nama_kriteria ?></td>
                                <td><?= $data->bobot_kriteria ?>%</td>
                                <td class="text-center">
                                    <a href="<?= site_url('admin/kriteria/sub_kriteria/' . $data->id_kriteria) ?>" class="btn btn-sm btn-info"><i class="fa fa-table"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('admin/kriteria/update/' . $data->id_kriteria) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('admin/kriteria/delete/' . $data->id_kriteria) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus data Mata Pelajaran ?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>