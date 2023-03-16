<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h4><?= get_ta('status_ta', 1)->row()->nama_ta ?></h4>
                <p>Tahun Ajaran</p>
            </div>
            <div class="icon">
                <i class="fa fa-calendar"></i>
            </div>
            <a href="<?= site_url('admin/ta') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h4><?= get_siswa_all()->num_rows() ?> Siswa</h4>
                <p>Peserta Didik</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= site_url('admin/siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h4><?= get_guru_all()->num_rows() ?> Guru</h4>

                <p>Tenaga Pendidik</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-tie"></i>
            </div>
            <a href="<?= site_url('admin/guru') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>