<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/mainlogo.webp') }}">
    <title>Carikami - Peringatan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto';
            background-color: #f8f9fa;
            color: #212529;
        }

        .webpage-logo {
            max-height: 54px;
        }

        .webpage-header {
            top: 0;
            padding: 10px 5px;
            z-index: 1000;
        }
    </style>

</head>

<body>

    <div class="container-fluid px-lg-5">
        <div class="webpage-header mb-4 d-flex align-items-center gap-3">
            <a href="/">
                <img class="webpage-logo img-fluid" src="{{ asset('assets/images/icons.webp') }}" alt="Logo">
            </a>
            <a href="{{ route('homepage.privacy') }}" class="btn-link ms-auto text-dark d-none d-lg-block" style="font-size: 22px; font-weight:900">Kebijakan Privasi</a>
        </div>

        <h4>Peringatan Penggunaan</h4>
        <div>
            <p class="">Dengan hormat kami sampaikan bahwa Carikami tidak mendukung dan tidak bertanggung jawab atas
                website/blog/forum yang mengandung atau terindikasi memiliki konten sebagai berikut:</p>
            <ul>
                <li>Pornografi</li>
                <li>Perjudian</li>
                <li>Fitnah/Pencemaran Nama Baik</li>
                <li>Penipuan</li>
                <li>SARA (Suku, Agama, Ras, dan Antargolongan)</li>
                <li>Kekerasan / Kekerasan Terhadap Anak</li>
                <li>Perdagangan Produk dengan aturan khusus</li>
                <li>Terorisme / Radikalisme</li>
                <li>Separatisme / Organisasi Terlarang</li>
                <li>Hak Kekayaan Intelektual (HKI)</li>
                <li>Pelanggaran Hak Kekayaan Intelektual (HKI)</li>
                <li>Pelanggaran Keamanan Informasi</li>
                <li>Konten negatif yang direkomendasikan instansi resmi, termasuk namun tidak terbatas pada:
                    <ul>
                        <li>Narkoba</li>
                        <li>Investasi ilegal</li>
                        <li>Pinjaman online ilegal</li>
                        <li>Penjualan uang palsu</li>
                        <li>Obat, makanan, dan kosmetik ilegal</li>
                        <li>Forex ilegal</li>
                        <li>Penyelenggara Umroh ilegal</li>
                        <li>Penjualan satwa langka dan tanaman dilindungi</li>
                    </ul>
                </li>
                <li>Konten yang melanggar nilai sosial dan budaya</li>
                <li>Berita bohong / HOAKS</li>
                <li>Pemerasan</li>
                <li>Konten yang memfasilitasi akses ke konten negatif</li>
            </ul>

            <p>Apabila kami menemukan pelanggaran terhadap daftar di atas, Carikami tidak segan-segan untuk melaporkan
                website/blog/forum tersebut kepada TrustPositif Kominfo dan Google </p>

            <p>Marilah kita terapkan internet yang sehat dan aman sejak dini demi kemajuan bangsa dan negara.</p>

            <p>Hormat kami,</p>
            <p><strong>Tim Carikami</strong></p>
        </div>
        <a href="{{ route('homepage.privacy') }}" class="btn-link ms-auto text-dark  d-lg-none float-end pb-4" style="font-size: 22px; font-weight:900">Kebijakan Privasi</a>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.carikita.id/assets/update-browser.js"></script>
    <script src="//browser-update.org/update.min.js"></script>

</body>

</html>
