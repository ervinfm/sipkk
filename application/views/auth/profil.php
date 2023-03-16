<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>assets/templates/dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= profil()->nama_user ?></h3>

                <p class="text-muted text-center"><?= profil()->level_user == 1 ? 'Administrator' : 'Tenaga Pendidik' ?></p>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Pengguna</a></li>
                    <?php if (profil()->level_user == 2) { ?>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Data Tenaga Pendidik</a></li>
                    <?php } ?>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nama *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="<?= profil()->nama_user ?>" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Email *</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" value="<?= profil()->email_user ?>" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail" value="<?= profil()->username_user ?>" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputName2" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if (profil()->level_user == 2) { ?>
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">NIP/NIY</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputName" value="<?= profil()->nip_guru ?>" placeholder="NIP/NIY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Nama Guru</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail" value="<?= profil()->nama_guru ?>" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" value="<?= profil()->pendidikan_guru ?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Tugas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" value="<?= profil()->tugas_guru ?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>