<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Pengguna Sistem</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/user?level=3') ?>" class="btn btn-sm btn-<?= @$_GET['level'] == '3' ? '' : 'dark' ?> float-right mr-1"><i class="fa fa-user-graduate"></i> Siswa </a>
                <a href="<?= site_url('admin/user?level=2') ?>" class="btn btn-sm btn-<?= @$_GET['level'] == '2' ? '' : 'dark' ?> float-right mr-1"><i class="fa fa-user-tie"></i> Guru </a>
                <a href="<?= site_url('admin/user') ?>" class="btn btn-sm btn-<?= @$_GET['level'] == '' ? '' : 'dark' ?> float-right mr-1"><i class="fa fa-user-secret"></i> Admin </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (@$_GET['level'] == '') { ?>
                <div class="col-sm-12 mb-2">
                    <a href="<?= site_url('admin/user/insert') ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle"></i> Tambah </a>
                </div>
            <?php } ?>
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Pengguna</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Akun</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $user) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $user->nama_user ?></td>
                                <td><?= $user->username_user ?></td>
                                <td><?= $user->email_user == null ? '<i>belum di setting</i>' : $user->email_user  ?></td>
                                <td>
                                    <?php
                                    if ($user->status_user == 1) { ?>
                                        <a href="<?= site_url('admin/user/status_akun/' . $user->id_user) ?>" class="btn btn-sm btn-success"><i class="fa fa-power-off"></i> Aktif</a>
                                    <?php } else { ?>
                                        <a href="<?= site_url('admin/user/status_akun/' . $user->id_user) ?>" class="btn btn-sm btn-danger"><i class="fa fa-power-off"></i> Non-Aktif</a>
                                    <?php } ?>
                                </td>
                                <td><?= $user->is_online == 1 ? '<span class="text-success"><i class="fa fa-unlock "></i> Online</span>' : '<span class="text-danger"><i class="fa fa-lock"></i> Offline</span>' ?></td>
                                <td>
                                    <?php if ($user->id_user != $this->session->userdata('user_id')) { ?>
                                        <a href="<?= site_url('admin/user/update/' . $user->id_user) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <?php if ($user->level_user == 1) { ?>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-dark" onclick="return alert('Akun tidak dapat dihapus!')"><i class="fa fa-trash"></i></a>
                                        <?php }
                                    } else { ?>
                                        <small><i>Akun Anda...</i></small>
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