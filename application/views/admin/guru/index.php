<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Guru</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/guru/insert') ?>" class="btn btn-sm btn-success float-right mr-1"><i class="fa fa-plus"></i> Tambah </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-exclamation-triangle"></i> Akun Pengguna Guru Dibuat otomatis oleh sistem ketika menambahkan data guru!
                </div>
            </div>
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>NIP/NIY Guru</th>
                            <th>Nama Guru</th>
                            <th>Pendidikan Guru</th>
                            <th>Tugas Guru</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->nip_guru ?></td>
                                <td><?= $data->nama_guru ?></td>
                                <td><?= $data->pendidikan_guru ?></td>
                                <td><?= $data->tugas_guru ?></td>
                                <td>
                                    <a href="<?= site_url('admin/guru/update/' . $data->id_guru) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('admin/guru/delete/' . $data->id_guru) ?>" onclick="return confirm('Yakin Menghapus data Guru ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    <?php if ($data->id_user != null) { ?>
                                        <a class="btn btn-sm btn-dark" onclick="return alert('Akun Pengguna sudah ada!')"><i class="fa fa-user"></i></a>
                                    <?php } else { ?>
                                        <a href="<?= site_url('admin/guru/akun/' . $data->id_guru) ?>" class="btn btn-sm btn-info" onclick="return confirm('Yakin buat akun pengguna Guru ?')"><i class="fa fa-user"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>