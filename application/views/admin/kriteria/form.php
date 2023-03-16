<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Kriteria Kenaikan kelas</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/kriteria') ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Kriteria </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/kriteria/proses') ?>" method="post">
            <input type="hidden" name="id" value="<?= @$row->id_kriteria ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Kriteria *</label>
                        <input type="text" name="k_kode" class="form-control" id="exampleInputEmail1" value="<?= @$row->kode_kriteria ?>" placeholder="ex. C1" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bobot Kriteria *</label>
                        <input type="number" name="k_bobot" class="form-control" id="exampleInputEmail1" value="<?= @$row->bobot_kriteria ?>" placeholder="ex. 25" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kriteria *</label>
                        <input type="text" name="k_nama" class="form-control" id="exampleInputEmail1" value="<?= @$row->nama_kriteria ?>" placeholder="ex. UAS" required>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plane"></i> <?= $this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui' ?> Data Kriteria</button>
                </div>
            </div>
        </form>
    </div>
</div>