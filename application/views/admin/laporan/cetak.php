<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $perihal ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Laporan SIPKK</title>
    <link href="https://fonts.googleapis.com/css2?family=Macondo+Swash+Caps&family=Orbitron:wght@700&display=swap" rel="stylesheet">
    <style>
        .titles1 {
            font-size: 14px;
            font-family: 'Inconsolata', monospace;
        }

        .titles2 {
            font-size: 25px;
            font-family: 'Krona One', sans-serif;
        }

        .titles3 {
            font-size: 8px;
            font-family: 'Roboto', sans-serif;
        }

        .segment {
            font-size: 15px;
            font-family: 'Orbitron', sans-serif;
            padding-top: 10px;
            padding-left: 5px;
        }

        .close {
            font-size: 13px;
            font-family: 'Orbitron', sans-serif;
            padding-top: 10px;
            padding-left: 5px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td class="titles1">
                <B>SISTEM PENDUKUNG KEPUTUSAN KENAIKAN KELAS</B>
            </td>
        </tr>
        <tr>
            <td class="titles2">
                <b>MTS AL-INAYAH MANADO</b>
            </td>
        </tr>
        <tr>
            <td class="titles3">
                <b>Jl. Asrama H., Buha, Kec. Mapanget, Kota Manado, Sulawesi Utara</b>
            </td>
        </tr>
    </table>


    <hr style="height:3px; background-color:black; border:none">
    <center>
        <span style="font-family: sans-serif; font-size:14px;"> <b> <?= strtoupper($row == 'nilai' ? 'REKAPITULASI PENILAIAN MATA PELAJARAN PESERTA DIDIK' : 'REKAPITULASI REKOMENDASI KENAIKAN KELAS') ?></b> </span>
    </center>
    <hr style="height:3px; background-color:black; border:none">

    <table width="100%" border="0" style="font-family: 'Orbitron', sans-serif; font-size:12px; border-collapse: collapse;">
        <tr>
            <td style="padding:5px" width="20%"><b>Nomor Cetak</b></td>
            <td style="padding:5px" width="2%"><b>:</b></td>
            <td style="padding:5px"><b><?= random_string('numeric', 15) ?></b></td>
        </tr>
        <tr>
            <td style="padding:5px"><b>Tanggal Cetak</b></td>
            <td style="padding:5px"><b>:</b></td>
            <td style="padding:5px"><b><?= date('d') . ' ' . date('m') . ' ' . date('Y')  ?></b></td>
        </tr>
        <tr>
            <td style="padding:5px"><b>Jam Cetak</b></td>
            <td style="padding:5px"><b>:</b></td>
            <td style="padding:5px"><b><?= date('H:i:s')  ?></b></td>
        </tr>
    </table>

    <?php if ($row == 'nilai') { ?>
        <h5>A. Data Permohonan Proposal <i></i></h5>
        <table width="100%" border="1" style="margin-left:5px; margin-top:10px; font-family: 'Orbitron', sans-serif; font-size:12px; border-collapse: collapse;">
            <thead>
                <tr>
                    <td width="3%" style="padding:5px">No</td>
                    <td style="padding:5px" width="8%">NISN Siswa</td>
                    <td style="padding:5px">Nama Siswa</td>
                    <td style="padding:5px">Penilaian</td>
                    <td style="padding:5px">Total</td>
                    <td style="padding:5px">Catatan Proposal</td>
                    <td style="padding:5px">Tanggal Pengajuan</td>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($proposal->num_rows() == 0) { ?>
                    <tr>
                        <td colspan="7" align="center" style="padding:5px"><i><b> tidak ada data proposal pada rentang tanggal tersebut </b></i></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    <?php } else if ($row == 'spk') { ?>
        <table width="100%" border="1" style="margin-left:5px; margin-top:10px; font-family: 'Orbitron', sans-serif; font-size:12px; border-collapse: collapse;">
            <thead>
                <tr>
                    <td width="3%" style="padding:5px">No</td>
                    <td style="padding:5px" width="8%">NIK Pemohon</td>
                    <td style="padding:5px">No. KK Pemohon</td>
                    <td style="padding:5px">Nama Pemohon</td>
                    <td style="padding:5px">Telepon Pemohon</td>
                    <td style="padding:5px">Lembaga Pemohon</td>
                    <td style="padding:5px">Alamat Lembaga</td>
                    <td style="padding:5px">Tanggal Terdaftar</td>

                </tr>
            </thead>
            <tbody>
                <!-- <?php

                        if ($pemohon->num_rows() == 0) { ?>
                    <tr>
                        <td colspan="8" align="center" style="padding:5px"><i><b> tidak ada data pemohon </b></i></td>
                    </tr>
                <?php } ?> -->
            </tbody>
        </table>
    <?php } ?>

</body>

</html>