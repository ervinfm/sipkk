<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Kelas</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/kelas/insert') ?>" class="btn btn-sm btn-success float-right mr-1"><i class="fa fa-plus"></i> Tambah </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Kelas</th>
                            <th>Wali kelas</th>
                            <th>Peserta</th>
                            <th>Tingkat Kelas</th>
                            <th>Kelola</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $data->nama_kelas ?></td>
                                <td><?= get_guru_all($data->id_guru)->num_rows() > 0 ? get_guru_all($data->id_guru)->row()->nama_guru : 'undifined' ?></td>
                                <td><?= get_pesert_byid_kelas($data->id_kelas, get_ta('status_ta', 1)->row()->id_ta)->num_rows() ?> Siswa</td>
                                <td>Tingkat <?= $data->tingkat_kelas ?></td>
                                <td class="text-center"><a href="<?= site_url('admin/kelas/peserta/' . $data->id_kelas . '?ta=' . get_ta('status_ta', 1)->row()->nama_ta) ?>" class="btn btn-sm btn-info"><i class="fa fa-users"></i> Peserta </a></td>
                                <td>
                                    <a href="<?= site_url('admin/kelas/update/' . $data->id_kelas) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('admin/kelas/delete/' . $data->id_kelas) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus data Kelas ?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>