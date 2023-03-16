<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header p-0 pt-1 p-3">
                <h2 class="card-title"><b><i class="fa fa-edit"></i> Pengampu Mata Pelajaran</b> </h2>
            </div>
        </div>
    </div>
    <?php
    if ($ampu->num_rows() > 0) {
        foreach ($ampu->result() as $key => $pengampu) { ?>
            <div class="col-sm-4">
                <div class="callout callout-<?= get_random_color($key + 1) ?>">
                    <div class="card-header text-muted border-bottom-0">
                        <?= get_mapel('id_mapel', $pengampu->id_mapel)->row()->kode_mapel . ' - ' . get_mapel('id_mapel', $pengampu->id_mapel)->row()->nama_mapel; ?>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="lead"><b>Kelas <?= get_kelas_byid_kelas($pengampu->id_kelas)->nama_kelas ?></b></h2>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user-tie"></i></span> <?= get_guru_all(get_kelas_byid_kelas($pengampu->id_kelas)->id_guru)->row()->nama_guru ?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-users"></i></span> <?= get_pesert_byid_kelas($pengampu->id_kelas, $pengampu->id_ta)->num_rows() ?> Siswa</li>
                                </ul>
                            </div>
                            <div class="col-sm-4 text-center">
                                <a href="<?= site_url('guru/pengampu/nilai/' . $pengampu->id_pengampu) ?>">
                                    <img src="<?= base_url() ?>assets/images/sistem/ass.jpg" alt="user-avatar" class="img-circle img-fluid" style="width: 80%;">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php }
    } else { ?>
        <div class="col-sm-10 offset-sm-1">
            <div class="callout callout-danger">
                <h5><i class="icon fas fa-ban"></i> Pengampu Kelas Mata Pelajaran Kosong</h5>

                <p>Silahkan untuk menghubungi admin SIPKK untuk ditambahkan sebagai pengampu mata pelajaran...</p>
            </div>
        </div>
    <?php } ?>
</div>