<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Siswa</h2>
            </div>
            <div class="col-sm-3">
                <a href="#" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modal_upload"><i class="fa fa-upload"></i> Upload </a>
                <a href="<?= site_url('admin/siswa/insert') ?>" class="btn btn-sm btn-success float-right mr-1"><i class="fa fa-plus"></i> Tambah </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th>NISN/NIS</th>
                    <th>Nama Lengkap</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->nisn_siswa ?></td>
                        <td><?= $data->nama_siswa ?></td>
                        <td><?= $data->ttl_siswa ?></td>
                        <td><?= $data->gender_siswa == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
                        <td><?= $data->alamat_siswa ?></td>
                        <td>
                            <a href="<?= site_url('admin/siswa/update/' . $data->id_siswa) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="<?= site_url('admin/siswa/delete/' . $data->id_siswa) ?>" onclick="return confirm('Yakin Menghapus data siswa ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            <?php if ($data->id_user != null) { ?>
                                <a class="btn btn-sm btn-dark" onclick="return alert('Akun Pengguna sudah ada!')"><i class="fa fa-user"></i></a>
                            <?php } else { ?>
                                <a href="<?= site_url('admin/siswa/akun/' . $data->id_siswa) ?>" class="btn btn-sm btn-info" onclick="return confirm('Yakin buat akun pengguna siswa ?')"><i class="fa fa-user"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal_upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unggah Data Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/siswa/proses') ?>" method="post" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="callout callout-info">
                                <h5>Aturan Unggah Data Siswa!</h5>
                                <ol>
                                    <li>Format Dokument yang diizinkan adalah xlsx atau xls</li>
                                    <li>Format isian dokument dapat didownload <a href="">disini</a></li>
                                    <li>Maksimal Ukuran File adalah 10 MB</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-12">

                            <div class="form-group">
                                <label for="exampleInputFile">Data Siswa *</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="upload_file" class="custom-file-input" id="exampleInputFile" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" name="upload" class="input-group-text">Upload</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="create_akun" value="1" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Generate Akun Pengguna Siswa</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>