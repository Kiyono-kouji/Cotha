@extends('layout.default-layout')

@section('title', 'About COTHA')

@section('main_content')
<div class="container my-5 px-4 px-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <h1 class="fw-bold mb-4 text-center" style="color: #4fc3f7;">About COTHA</h1>
            <p class="fs-5 text-dark mb-4">
                <b>COTHA</b> (baca: KOTA) adalah singkatan dari <b>COmputational THinking Academy</b> yang berfokus pada pendidikan teknologi untuk anak-anak. 
                Berbasis kurikulum dari <b>Jerman</b> dan <b>India</b>, serta didukung oleh tim pengajar dengan belasan tahun pengalaman di bidang IT, COTHA menawarkan pendidikan teknologi yang berkualitas dan menyenangkan.
            </p>
            <p class="fs-5 text-dark mb-4">
                COTHA dirancang untuk meningkatkan kemampuan <b>Computational Thinking</b>, yang berguna untuk mengembangkan kecerdasan dan kreativitas anak. 
                Materi pembelajaran di COTHA menggunakan sistem <b>Project Based Learning</b> yang menarik, sehingga siswa dapat belajar melalui pembuatan game, animasi, aplikasi, dan berbagai proyek digital lainnya.
            </p>
            <p class="fs-5 text-dark mb-4">
                Dengan dukungan kurikulum internasional dan pengajar berpengalaman, COTHA bertujuan untuk membekali anak-anak dengan keterampilan teknologi yang relevan di era digital, sekaligus menumbuhkan minat dan kreativitas mereka dalam bidang IT.
            </p>
            <div class="my-5 text-center">
                <img src="{{ asset('images/AboutResources/EnhanceCT.jpg') }}"
                     alt="Enhance Computational Thinking"
                     class="img-fluid rounded-4 shadow mb-4"
                     style="max-width: 500px; width: 100%; height: auto; object-fit: contain;">
            </div>
            <div>
                <h3 class="fw-bold mb-3" style="color: #f48acb;">Mengapa Coding Efektif untuk Melatih Otak Anak?</h3>
                <p class="fs-5 text-dark mb-3">
                    Coding itu sebenarnya adalah salah satu <b>cara paling efektif untuk melatih otak anak</b>. Banyak hal lain yang bisa digunakan untuk melatih kemampuan berpikir, tapi coding sangat baik untuk melatih hal-hal berikut:
                </p>
                <ol class="fs-5 text-dark mb-4" style="line-height: 1.7;">
                    <li>
                        <b>Logical Thinking:</b> coding identik dengan logika berpikir yang terstruktur, sehingga sangat cocok untuk melatih kemampuan berpikir logis pada anak dari usia dini.
                    </li>
                    <li>
                        <b>Problem Solving:</b> coding identik dengan keterampilan pemecahan masalah contohnya pada saat harus membuat program untuk menyelesaikan suatu permasalahan.
                    </li>
                    <li>
                        <b>Critical Thinking:</b> coding menuntut untuk berpikir kritis menentukan langkah yang paling efektif dalam menyelesaikan masalah.
                    </li>
                    <li>
                        <b>Computational Thinking:</b> coding melatih kemampuan computational dimana harus melakukan analisa, pengenalan pola, membuat rumusan dan menentukan algoritma.
                    </li>
                </ol>
            </div>
            
            <div class="my-5">
                <h3 class="fw-bold mb-3" style="color: #4fc3f7; font-size: 2.5rem; text-align: justify;">Apa yang dipelajari dalam Coding?</h3>
                <p class="fs-5 text-dark mb-4" style="text-align: justify;">
                    Di kelas coding akan dipelajari konsep pemrograman dari <b>basic</b> hingga <b>advanced</b>. Anak akan diminta untuk menerapkan konsep yang telah dipelajari tersebut dalam proyek yang mereka buat. Dengan kurikulum yang dibuat khusus sesuai minat dan bakat anak, COTHA menawarkan berbagai jenis kelas sesuai usia anak.
                </p>
                <div class="mb-4">
                    <img src="{{ asset('images/AboutResources/ThingsYouLearn.png') }}"
                         alt="Things You Learn in Coding Class"
                         class="img-fluid rounded-4 shadow d-block mx-auto"
                         style="max-width: 600px; width: 100%; height: auto; object-fit: contain;">
                </div>
                <div class="mt-5 mb-4">
                    <img src="{{ asset('images/AboutResources/CothaCurriculum.png') }}"
                         alt="COTHA Curriculum"
                         class="img-fluid rounded-4 shadow d-block mx-auto"
                         style="max-width: 600px; width: 100%; height: auto; object-fit: contain;">
                </div>
            </div>
            <div class="my-5">
                <h3 class="fw-bold mb-3 text-center" style="color: #4fc3f7; font-size: 2.5rem;">Bagaimana sistem belajar di Cotha?</h3>
                <ul class="fs-5 text-dark mb-4" style="max-width: 600px; margin: 0 auto; line-height: 1.7;">
                    <li>Durasi per level : 6 bulan</li>
                    <li>Jadwal : 1x seminggu</li>
                    <li>Waktu : 75 menit</li>
                    <li>Tempat : online Zoom</li>
                    <li>Group : 5-10 orang</li>
                    <li>
                        Biaya : mulai dari Rp 245.000/bulan, tergantung jenis kelas yang diikuti dan promo.
                        <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang+sistem+belajar&app_absent=0"
                           target="_blank"
                           class="fw-semibold text-primary text-decoration-underline">
                            Hubungi kami untuk info lebih lanjut
                        </a>
                    </li>
                </ul>
                <div class="text-center mt-4">
                    <img src="{{ asset('images/AboutResources/SistemBelajar.png') }}"
                        alt="Sistem Belajar di Cotha"
                        class="img-fluid rounded-4 shadow"
                        style="max-width: 600px; width: 100%; height: auto; object-fit: contain;">
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/courses') }}" class="btn btn-primary btn-lg px-5 py-3 fw-semibold rounded-pill shadow animated-btn" style="background-color: #4fc3f7; border: none;">
                    Explore Our Courses
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection