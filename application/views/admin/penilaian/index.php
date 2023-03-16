<?php if (@$_GET['ta'] == TRUE) {
    $ta_temp = get_ta('nama_ta', $_GET['ta'])->row();
} else {
    $ta_temp = get_ta('status_ta', 1)->row();
} ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 class="card-title">Penilaian Mata Pelajaran</h2>
                    </div>
                    <div class="col-sm-4">
                        <form action="" method="get">
                            <div class="input-group input-group-sm">
                                <select name="ta" class="form-control" required>
                                    <?php foreach (get_ta()->result() as $key => $ta) {
                                        if (@$_GET['ta']) { ?>
                                            <option value="<?= $ta->nama_ta ?>" <?= @$_GET['ta'] == $ta->nama_ta ? 'selected' : '' ?>><?= $ta->nama_ta ?> <?= get_ta('status_ta', 1)->row()->id_ta == $ta->id_ta ? ' (berjalan)' : '' ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $ta->nama_ta ?>" <?= get_ta('status_ta', 1)->row()->nama_ta == $ta->nama_ta ? 'selected' : '' ?>><?= $ta->nama_ta ?> <?= get_ta('status_ta', 1)->row()->id_ta == $ta->id_ta ? ' (berjalan)' : '' ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat">Pilih</button>
                                </span>
                                <span class="input-group-append">
                                    <a href="<?= site_url('admin/penilaian/rekapitulasi/' . $ta_temp->id_ta) ?>" class="btn btn-success btn-flat">Rekapitulasi</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($row->result() as $key => $kelas) { ?>
        <div class="col-sm-4">
            <div class="callout callout-<?= get_random_color($key + 1) ?>">
                <div class="card-body pt-0 pb-0">
                    <div class="row">
                        <div class="col-8">
                            <h2 class="lead"><b>Kelas <?= $kelas->nama_kelas ?></b></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user-tie"></i></span> <?= get_guru_all($kelas->id_guru)->row()->nama_guru ?></li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-users"></i></span> <?= get_pesert_byid_kelas($kelas->id_kelas, $ta_temp->id_ta)->num_rows() ?> Siswa</li>
                            </ul>
                        </div>
                        <div class="col-sm-4 text-center">
                            <?php if (get_pesert_byid_kelas($kelas->id_kelas, $ta_temp->id_ta)->num_rows() > 0) { ?>
                                <a href="<?= site_url('admin/penilaian/kelas/' . $kelas->id_kelas . '/' . $ta_temp->id_ta) ?>">
                                    <img src="<?= base_url() ?>assets/images/sistem/ass.jpg" alt="user-avatar" class="img-circle img-fluid" style="width: 80%;">
                                </a>
                            <?php } else { ?>
                                <a href="#" onclick="return alert('Peserta Kelas tidak ada, Silahkan Tambahkan Peserta kelas!')">
                                    <img src="<?= base_url() ?>assets/images/sistem/ass.jpg" alt="user-avatar" class="img-circle img-fluid" style="width: 80%;">
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>
</div>