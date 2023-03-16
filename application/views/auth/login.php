<p class="login-box-msg">Masuk Untuk Memulai Sesi Anda.</p>

<form action="<?= site_url('proses') ?>" method="post">
    <div class="input-group mb-3">
        <input type="text" name="u_name" class="form-control" value="<?= $this->session->flashdata('User') ?>" placeholder="Email atau username" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-users"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="u_pass" class="form-control" value="<?= $this->session->flashdata('Pass') ?>" placeholder="Password" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Ingatkan Saya
                </label>
            </div>
        </div>
        <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </div>
    </div>
</form>

<p class="mb-1 mt-2">
    <a href="<?= site_url('forgot') ?>">Lupa Password ?</a>
</p>
<p class="mb-0">
    <a href="<?= site_url('register') ?>" class="text-center">Daftarkan Akun Pengguna</a>
</p>