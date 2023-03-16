<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Siswa</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/user' . (@$row->level_user != 1 ? '?level=' . @$row->level_user : '')) ?>" class="btn btn-sm btn-info float-right"><i class="fa fa-table"></i> Data Pengguna </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/user/proses') ?>" method="post">
            <input type="hidden" name="id" value="<?= @$row->id_user ?>">
            <input type="hidden" name="level" value="<?= @$row->level_user ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">Email <?= $this->uri->segment(3) == 'insert' ? 'Admin' : 'Pengguna' ?> *</label>
                        <input type="email" name="u_mail" class="form-control" value="<?= @$row->email_user ?>" placeholder="admin@mail.com" <?= $this->uri->segment(3) == 'insert' ? 'required' : '' ?>>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">Nama <?= $this->uri->segment(3) == 'insert' ? 'Admin' : 'Pengguna' ?> *</label>
                        <input type="text" name="u_nama" class="form-control" value="<?= @$row->nama_user ?>" placeholder="Adam Smith" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">Username <?= $this->uri->segment(3) == 'insert' ? 'Admin' : 'Pengguna' ?> *</label>
                        <input type="text" name="u_user" class="form-control" value="<?= @$row->username_user ?>" placeholder="admin123" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">Password <?= $this->uri->segment(3) == 'insert' ? 'Admin' : 'Pengguna' ?> <?= $this->uri->segment(3) == 'insert' ? '*' : '<small>(Kosongkan jika tak diubah)</small>' ?></label>
                        <input type="password" name="u_pass" class="form-control" placeholder="*********" <?= $this->uri->segment(3) == 'insert' ? 'required' : '' ?>>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-pen-fancy"></i> <?= $this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui' ?> Akun Admin</button>
                </div>
            </div>
        </form>

    </div>
</div>