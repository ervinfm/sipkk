<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Siswa</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/siswa') ?>" class="btn btn-sm btn-info float-right"><i class="fa fa-table"></i> Data Siswa </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/siswa/proses') ?>" method="post">
            <input type="hidden" name="id" value="<?= @$row->id_siswa ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">NISN/NIS Siswa *</label>
                        <input type="number" name="s_nisn" class="form-control" value="<?= @$row->nisn_siswa ?>" id="nisn" placeholder="Nomor Induk Siswa Nasional" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">Nama Siswa *</label>
                        <input type="text" name="s_nama" class="form-control" value="<?= @$row->nama_siswa ?>" id="nisn" placeholder="Adam Smith" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">Tempat, Tanggal Lahir Siswa *</label>
                        <input type="text" name="s_ttl" class="form-control" value="<?= @$row->ttl_siswa ?>" id="nisn" placeholder="Manado, 10 September 2010" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="nisn">Jenis Kelamin *</label>
                        <select name="s_gender" class="form-control" required>
                            <option value="">- pilih jenis kelamin -</option>
                            <option value="1" <?= @$row->gender_siswa == '1' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="0" <?= @$row->gender_siswa == '0' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="nisn">Agama Siswa *</label>
                        <select name="s_agama" class="form-control" required>
                            <option value="">- pilih Agama -</option>
                            <option value="ISLAM" <?= @$row->agama_siswa == 'ISLAM' ? 'selected' : '' ?>>ISLAM</option>
                            <option value="KATOLIK" <?= @$row->agama_siswa == 'KATOLIK' ? 'selected' : '' ?>>KATOLIK</option>
                            <option value="PROTESTAN" <?= @$row->agama_siswa == 'PROTESTAN' ? 'selected' : '' ?>>PROTESTAN</option>
                            <option value="HINDU" <?= @$row->agama_siswa == 'HINDU' ? 'selected' : '' ?>>HINDU</option>
                            <option value="BUDHA" <?= @$row->agama_siswa == 'BUDHA' ? 'selected' : '' ?>>BUDHA</option>
                            <option value="KONGHUCU" <?= @$row->agama_siswa == 'KONGHUCU' ? 'selected' : '' ?>>KONGHUCU</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nisn">Asal Sekolah *</label>
                        <input type="text" name="s_asal" class="form-control" id="nisn" value="<?= @$row->asal_siswa ?>" placeholder="SDN 1 Manado" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nisn">Nama Orang Tua *</label>
                        <input type="text" name="s_ortu" class="form-control" id="nisn" value="<?= @$row->orang_tua_siswa ?>" placeholder="Sudirman" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nisn">Pekerjaan Orang Tua *</label>
                        <input type="text" name="s_kerja" class="form-control" id="nisn" value="<?= @$row->pekerjaan_ortu_siswa ?>" placeholder="PNS" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nisn">Telepon Orang Tua *</label>
                        <input type="number" name="s_telp" class="form-control" id="nisn" value="<?= @$row->telp_ortu_siswa ?>" placeholder="xxxx xxxx xxxx" required>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="nisn">Alamat *</label>
                        <input type="text" name="s_alamat" class="form-control" id="nisn" value="<?= @$row->alamat_siswa ?>" placeholder="jl. xxxxxx" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-pen-fancy"></i> <?= $this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui' ?> Data Siswa</button>
                </div>
            </div>
        </form>
    </div>
</div>