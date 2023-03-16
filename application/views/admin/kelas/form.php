<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Kelas</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/kelas') ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Kelas </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/kelas/proses') ?>" method="post">
            <input type="hidden" name="id" value="<?= @$row->id_kelas ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kelas *</label>
                        <input type="text" name="k_nama" class="form-control" id="exampleInputEmail1" value="<?= @$row->nama_kelas ?>" placeholder="ex. VII A" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Wali Kelas *</label>
                        <select class="form-control selectpicker" name="k_guru" aria-label="Default select example" data-live-search="true" required>
                            <option selected>- pilih wali kelas -</option>
                            <?php foreach (get_guru_all()->result() as $key => $guru) {
                                if (cek_wali_kelas($guru->id_guru)->num_rows() == 0) { ?>
                                    <option value="<?= $guru->id_guru ?>" <?= @$row->id_guru == $guru->id_guru ? 'selected' : '' ?>><?= $guru->nip_guru . ' - ' . $guru->nama_guru ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tingkat Kelas *</label>
                        <select name="k_tingkat" class="form-control" required>
                            <option value="">- pilih tingkat kelas -</option>
                            <option value="1" <?= @$row->tingkat_kelas == 1 ? 'selected' : '' ?>>Tingkat 1</option>
                            <option value="2" <?= @$row->tingkat_kelas == 2 ? 'selected' : '' ?>>Tingkat 2</option>
                            <option value="3" <?= @$row->tingkat_kelas == 3 ? 'selected' : '' ?>>Tingkat 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plane"></i> <?= $this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui' ?> Data Kelas</button>
                </div>
            </div>
        </form>
    </div>
</div>