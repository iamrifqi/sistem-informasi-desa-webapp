        <section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
            <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
                <h2>Selamat Datang Di Website Resmi</h2>
                <p>Pemerintah Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
                <div class="d-flex">
                    <a href="#about" class="btn-get-started scrollto">Jelajah</a>
                    <a href="https://www.youtube.com/watch?v=RMCc-KqQsjo" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Profil Desa</span></a>
                </div>
            </div>
        </section>

        <main id="index">

            <!-- ======= Papan Informasi Section ======= -->
            <section id="featured-services" class="featured-services">
                <div class="container text-center">

                    <div class="row gy-4">
                        <?php foreach ($papaninformasi as $pi) : ?>
                            <div class="col-lg-4 col-md-6" data-aos="zoom-out">
                                <div class="service-item position-relative">
                                    <div class="icon"><i class="<?= $pi['simbol']; ?> icon"></i></div>
                                    <h4><?= $pi['nama']; ?></h4>
                                    <p><?= $pi['isi']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </section>
            <!-- End Papan Informasi Section -->

            <!-- ======= Sambutan Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Sambutan Kepala Desa</h2>
                        <?php echo CI_VERSION; ?>
                        <p>Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
                    </div>

                    <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                        <?php foreach ($kepaladesa as $kd) : ?>
                            <div class="col-lg-4">
                                <div class="about-img">
                                    <img src="<?= base_url('assets/img/perangkatdesa/') . $kd['gambar']; ?>" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-8" style="text-align: justify;">
                                <p class="text-center">
                                    Assalamualaikum warahmatullahi wabarakatuh
                                </p>
                                <p>
                                    &nbsp; &nbsp; &nbsp; Puji syukur kami panjatkan kehadirat ALLAH SWT atas limpahan rahmat dan karunia-Nya sehingga Desa Sutapranan berhasil membangun website. Kehadiran Website Desa Sutapranan diharapkan dapat memudahkan penyampaian informasi secara terbuka kepada warga Sutapranan dan masyarakat umum serta instansi lain yang terkait.
                                </p>
                                <p>
                                    &nbsp; &nbsp; &nbsp; Sehubungan dengan hal tersebut maka semua warga desa harus mau untuk belajar menggunakan internet, agar dapat mengakses segala informasi yang berhubungan dengan desa Sutapranan dan pengetahuan di internet.
                                </p>
                                <p>
                                    &nbsp; &nbsp; &nbsp; Semoga dengan kehadiran Website ini akan terjalin komunikasi antar perangkat desa dan warga desa, dan sebagai salah satu upaya desa dalam memberikan informasi kepada warga desa.
                                </p>
                                <p class="text-center">
                                    Wassalamualaikum warahmatullahi wabarakatuh
                                </p>
                                <p class="text-center"><?= $kd['jabatan']; ?> Sutapranan</p>
                                <p class="text-center"><strong><?= $kd['nama']; ?></strong></p>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </section>
            <!-- End Sambutan Section -->

            <!-- ======= Team Section ======= -->
            <section id="team" class="team">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Perangkat Desa</h2>
                        <p>Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
                    </div>

                    <div class="row gy-5">

                        <?php foreach ($perangkatdesa as $pd) : ?>
                            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                                <div class="team-member">
                                    <div class="member-img">
                                        <img src="<?= base_url('assets/img/perangkatdesa/') . $pd['gambar']; ?>" class="img-fluid">
                                    </div>
                                    <div class="member-info">
                                        <h4><?= $pd['nama']; ?></h4>
                                        <span><?= $pd['jabatan']; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </section>
            <!-- End Team Section -->

        </main>