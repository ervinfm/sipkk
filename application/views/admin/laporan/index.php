<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="card-title">Generate Laporan Sistem</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/laporan/cetak') ?>" method="post" target="_blank">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3"><b>Konfigurasi Cetak Laporan</b></td>
                                </tr>
                                <tr>
                                    <td width="25%">Jenis Data Laporan</td>
                                    <td width="5%">:</td>
                                    <td>
                                        <select name="l_jenis" class="form-control" required>
                                            <option value="">- pilih jenis laporan -</option>
                                            <option value="nilai">Laporan Data Penilaian</option>
                                            <option value="spk">Laporan Data Rekomendasi</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ukuran Kertas</td>
                                    <td>:</td>
                                    <td>
                                        <select name="l_ukuran" class="form-control" required>
                                            <option value="">- pilih ukuran kertas -</option>
                                            <option value="A4">A4</option>
                                            <option value="Legal">Legal</option>
                                            <option value="Letter">Letter</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tindakan</td>
                                    <td>:</td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak Laporan </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>