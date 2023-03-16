<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Mata Pelajaran</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/mapel/insert') ?>" class="btn btn-sm btn-success float-right mr-1"><i class="fa fa-plus"></i> Tambah </a>
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
                            <th>Kode Mata Pelajaran</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Kelompok Mata Pelajaran</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $data->kode_mapel ?></td>
                                <td><?= $data->nama_mapel ?></td>
                                <td>Kelompok <?= $data->kelompok_mapel ?></td>
                                <td>
                                    <a href="<?= site_url('admin/mapel/update/' . $data->id_mapel) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('admin/mapel/delete/' . $data->id_mapel) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus data Mata Pelajaran ?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>