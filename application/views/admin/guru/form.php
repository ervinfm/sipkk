<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Guru</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/guru') ?>" class="btn btn-sm btn-info float-right"><i class="fa fa-table"></i> Data Guru </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if ($this->uri->segment(3) == 'update') { ?>
            <form action="<?= site_url('admin/guru/proses') ?>" method="post">
                <input type="hidden" name="id" value="<?= @$row->id_guru ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nisn">NIP/NIY Guru *</label>
                            <input type="number" name="s_nisn" class="form-control" value="<?= @$row->nip_guru ?>" id="nisn" placeholder="Nomor Induk Pegawai / Nomor Induk Yayasan" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nisn">Nama Guru *</label>
                            <input type="text" name="s_nama" class="form-control" value="<?= @$row->nama_guru ?>" id="nisn" placeholder="Adam Smith" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nisn">Pendidikan Guru *</label>
                            <input type="text" name="s_ttl" class="form-control" value="<?= @$row->pendidikan_guru ?>" id="nisn" placeholder="S1 Pendidikan Matematika" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nisn">Tugas Guru *</label>
                            <input type="text" name="s_asal" class="form-control" id="nisn" value="<?= @$row->tugas_guru ?>" placeholder="Guru Matematika" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-pen-fancy"></i> <?= $this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui' ?> Data Guru</button>
                    </div>
                </div>
            </form>
            <?php } else {
            if (@$_GET['n']) { ?>
                <form action="<?= site_url('admin/guru/proses') ?>" method="post">
                    <?php for ($i = 1; $i <= $_GET['n']; $i++) { ?>
                        <input type="hidden" name="id[]" value="<?= random_string('alnum', 25) ?>">
                        <div class="row">
                            <div class="col-sm-2 mt-3">
                                <h5>Tambah Guru Ke-<?= $i ?></h5>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <hr>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nisn">NIP/NIY Guru *</label>
                                    <input type="number" name="g_nip[]" class="form-control" id="nisn" placeholder="Nomor Induk Pegawai / Nomor Induk Yayasan" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nisn">Nama Guru *</label>
                                    <input type="text" name="g_nama[]" class="form-control" id="nisn" placeholder="Adam Smith" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nisn">Pendidikan Guru *</label>
                                    <input type="text" name="g_pendidikan[]" class="form-control" id="nisn" placeholder="S1 Pendidikan Matematika" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nisn">Tugas Guru *</label>
                                    <input type="text" name="g_tugas[]" class="form-control" id="nisn" placeholder="Guru Matematika" required>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-sm-12">
                        <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-pen-fancy"></i> <?= $this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui' ?> Data Guru</button>
                    </div>
                </form>
            <?php } else { ?>
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <form action="" method="get">
                            <label> Jumlah Guru yang akan ditambah *</label>
                            <div class="input-group input-group-sm">
                                <input type="number" name="n" min="1" max="10" value="1" class="form-control" required>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat">Go!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
        <?php   }
        } ?>
    </div>
</div>