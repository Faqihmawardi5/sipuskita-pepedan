function printJumlahData(buku, anggota, pinjam, kembali, pengunjung) {

    let html = `
    <html>
    <head>
        <title>Laporan Jumlah Data</title>
        <style>
            body {
                font-family: "Times New Roman", Times, serif;
                font-size: 12px;
                margin: 30px;
            }

            .kop {
                width: 100%;
                border-bottom: 3px solid #000;
                padding-bottom: 10px;
                margin-bottom: 20px;
            }

            .kop table {
                width: 100%;
            }

            .kop td {
                text-align: center;
                vertical-align: middle;
            }

            .kop img {
                width: 80px;
            }

            table.data {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table.data th, table.data td {
                border: 1px solid #000;
                padding: 6px;
            }

            h3 {
                text-align: center;
                margin: 15px 0;
            }

            .ttd {
                margin-top: 50px;
            }
        </style>
    </head>

    <body onload="window.print();window.close();">

        <!-- KOP SURAT -->
        <div class="kop">
            <table>
                <tr>
                    <td width="20%">
                        <img src="${baseUrl()}assets_style/image/logo_desa.png">
                    </td>
                    <td width="60%">
                        <strong>PERPUSTAKAAN "PUSTAKA KITA"</strong><br>
                        DESA PEPEDAN KECAMATAN TONJONG<br>
                        <small>
                            Jl. KH. Anshor Pepedan, Tonjong, Brebes, Jawa Tengah 52271<br>
                            Email: kantordesapepedan2018@gmail.com
                        </small>
                    </td>
                    <td width="20%">
                        <img src="${baseUrl()}assets_style/image/logo_perpus.png">
                    </td>
                </tr>
            </table>
        </div>

        <h3>LAPORAN JUMLAH DATA PERPUSTAKAAN</h3>

        <!-- DATA -->
        <table class="data">
            <tr><th>Jumlah Buku</th><td>${buku}</td></tr>
            <tr><th>Jumlah Anggota</th><td>${anggota}</td></tr>
            <tr><th>Buku Dipinjam</th><td>${pinjam}</td></tr>
            <tr><th>Buku Dikembalikan</th><td>${kembali}</td></tr>
            <tr><th>Jumlah Pengunjung</th><td>${pengunjung}</td></tr>
        </table>

        <!-- TTD -->
        <table class="ttd" width="100%">
            <tr>
                <td width="60%"></td>
                <td style="text-align:center;">
                    Pepedan, ${tanggalIndonesia()}<br>
                    Kepala Perpustakaan<br><br><br><br>
                    <strong><u>ADE NURDIYAN, MH.</u></strong>
                </td>
            </tr>
        </table>

    </body>
    </html>
    `;

    let win = window.open('', '_blank');
    win.document.write(html);
    win.document.close();
}
