<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="card-title">Manajemen Sub Kriteria Kenaikan kelas</h2>
            </div>
            <div class="col-sm-3">
                <a href="<?= site_url('admin/kriteria/sub_kriteria/' . $this->uri->segment(4)) ?>" class="btn btn-sm btn-info float-right mr-1"><i class="fa fa-table"></i> Data Sub Kriteria </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/kriteria/sub_proses') ?>" method="post">
            <input type="hidden" name="id_kriteria" value="<?= $this->uri->segment(3) == 'sub_insert' ? $this->uri->segment(4) : @$row->id_kriteria  ?>">
            <input type="hidden" name="id" value="<?= @$row->id_sub_kriteria ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Kriteria *</label>
                        <input type="text" name="sk_kriteria" class="form-control" id="exampleInputEmail1" value="<?= @$row->sub_kriteria ?>" placeholder="ex. 50" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bobot Sub Kriteria *</label>
                        <input type="number" name="sk_bobot" class="form-control" id="exampleInputEmail1" value="<?= @$row->bobot_sub_kriteria ?>" placeholder="ex. 25" required>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plane"></i> <?= $this->uri->segment(3) == 'sub_insert' ? 'Tambah' : 'Perbaharui' ?> Data Kriteria</button>
                </div>
            </div>
        </form>
    </div>
</div>