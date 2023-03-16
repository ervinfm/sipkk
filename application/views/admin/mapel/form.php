<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Data Mata Pelajaran</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/mapel') ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Mata Pelajaran </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/mapel/proses') ?>" method="post">
            <input type="hidden" name="id" value="<?= @$row->id_mapel ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Mata Pelajaran *</label>
                        <input type="number" name="m_kode" class="form-control" id="exampleInputEmail1" value="<?= @$row->kode_mapel ?>" placeholder="ex. 127" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelompok Mata Pelajaran *</label>
                        <input type="text" name="m_kelompok" class="form-control" id="exampleInputEmail1" value="<?= @$row->kelompok_mapel ?>" placeholder="ex. A" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Mata Pelajaran *</label>
                        <input type="text" name="m_nama" class="form-control" id="exampleInputEmail1" value="<?= @$row->nama_mapel ?>" placeholder="ex. Bahasa Indonesia" required>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plane"></i> <?= $this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui' ?> Data Mata Pelajaran</button>
                </div>
            </div>
        </form>
    </div>
</div>