<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Privacy Policy</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.webp') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto';
            background-color: #f8f9fa;
            color: #212529;
        }

        .webpage-header {
            top: 0;
            padding: 10px 5px;
            z-index: 1000;
        }

        .webpage-logo {
            max-height: 54px;
        }

        .main-title {
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }

        .webpage-content ul {
            padding-left: 1.25rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-lg-5">
        <div class="webpage-header mb-4 d-flex align-items-center gap-3">
            <a href="/">
                <img class="webpage-logo img-fluid" src="{{ asset('assets/img/logo.webp') }}" alt="Logo">
            </a>
            <a href="{{ route('homepage.notice') }}" class="btn-link ms-auto text-dark d-none d-lg-block" style="font-size: 22px; font-weight:900">Peringatan Penggunaan</a>
        </div>

        <div class="webpage-content">
            <h4 class="main-title">Kebijakan Privasi</h4>
            <div class="row">
                <div class="col-lg-9">
                    <p>
                        Masuk tidak bertanggung jawab atas konten yang ditampilkan jika Anda menuju ke website pihak
                        lain dari hasil pencarian yang ditampilkan di halaman Masuk. Website yang Anda tuju mungkin
                        memiliki kebijakan privasi yang berbeda, dan Anda wajib memeriksanya secara langsung di situs
                        tersebut.
                    </p>

                    <h4>Jenis Data</h4>
                    <p>Masuk mencatat data yang berhubungan dengan pelanggan melalui metode berikut:</p>
                    <ul>
                        <li>Metode pencatatan data otomatis seperti (namun tidak terbatas pada) protokol komunikasi,
                            alamat IP, cookies, dan lainnya.</li>
                        <li>Korespondensi email.</li>
                        <li>Komunikasi online dan offline.</li>
                        <li>Sumber informasi dari pihak ketiga.</li>
                    </ul>

                    <h4>Penggunaan Data</h4>
                    <p>Jenis-jenis data di atas digunakan oleh Masuk untuk:</p>
                    <ul>
                        <li>Melakukan komunikasi dalam rangka penyediaan layanan.</li>
                        <li>Melakukan pertanggungjawaban atas layanan kepada pelanggan maupun pihak berwenang.</li>
                        <li>Melakukan penagihan terhadap layanan yang digunakan.</li>
                        <li>Mengakui sebagai salah satu aset tak berwujud.</li>
                        <li>Mempublikasikan dalam rangka promosi (jika relevan dan anonim).</li>
                    </ul>

                    <h4>Keamanan Data</h4>
                    <p>
                        Masuk berupaya semaksimal mungkin menjaga data pribadi/perusahaan pelanggan dari akses pihak
                        yang tidak berwenang, kecuali untuk keperluan yang telah disebutkan dalam bagian "Penggunaan
                        Data".
                    </p>

                    <h4>Batasan Kerahasiaan Data</h4>
                    <p>
                        Data dianggap bukan rahasia dan Masuk dibebaskan dari kewajiban untuk melindunginya apabila
                        data tersebut telah menjadi bagian dari domain publik dan diketahui secara umum akibat kebijakan
                        dari pihak yang berwenang untuk mempublikasikannya, seperti pada data WHOIS domain dan
                        lainnya.### 4. Peringatan Penggunaan Deskripsi: Daftar aturan yang melarang konten negatif
                        seperti SARA, hoaks, pornografi, dll. Manfaat: Menjaga reputasi layanan dan kepatuhan hukum.
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('homepage.notice') }}" class="btn-link ms-auto text-dark font-bold d-lg-none float-end pb-4" style="font-size: 22px; font-weight:900">Peringatan Penggunaan</a>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
