<p class="login-box-msg">Masukkan Email untuk Pemulihan.</p>

<form action="<?= site_url('proses') ?>" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Email pemulihan" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-users"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" name="forgot" class="btn btn-primary btn-block">Kirim</button>
        </div>
    </div>
</form>

<p class="mb-1 mt-2">
    <a href="<?= site_url('login') ?>">Kembali Login ?</a>
</p>
<p class="mb-0">
    <a href="<?= site_url('register') ?>" class="text-center">Daftarkan Akun Pengguna</a>
</p>