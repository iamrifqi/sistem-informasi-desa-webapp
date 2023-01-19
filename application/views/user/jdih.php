<main id="main">

    <!-- ======= JDIH Section ======= -->
    <section id="jdih" class="features">

        <div class="container">

            <div class="section-header">
                <h2>Jaringan Dokumentasi dan Informasi Hukum</h2>
                <p>Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
            </div>

        </div>

        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row gy-4 d-flex">

                <li class="nav-item col-md-4 col-lg-6">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                        <i class="bi bi-journal-text color-grey"></i>
                        <h4>PERDES</h4>
                    </a>
                </li>

                <li class="nav-item col-md-4 col-lg-6">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                        <i class="bi bi-journal-text color-grey"></i>
                        <h4>PERKADES</h4>
                    </a>
                </li>

            </ul>

            <div class="tab-content" style="text-align: justify;">

                <div class="tab-pane active show" id="tab-1">
                    <div class="row gy-4">
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="mb-3">PERDES</h3>
                        </div>

                        <?php if (empty($perdes)) : ?>
                             <div class="col-lg-12 text-center">
                                <div class="alert alert-danger" role="alert">
                                    Informasi belum ditambahkan.
                                </div>
                            </div>
                        <?php endif; ?>

                        <ul>
                            <?php foreach ($perdes as $pd) : ?>
                                <li><i class="bi bi-check-circle-fill"></i> PERDES TAHUN <?= $pd['tahun']; ?> <a href="<?= $pd['link']; ?>">DOWNLOAD</a></li>
                            <?php endforeach; ?>
                        </ul>
                        
                    </div>
                </div>

                <div class="tab-pane" id="tab-2">
                    <div class="row gy-4">
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="mb-3">PERKADES</h3>
                        </div>
                        
                        <?php if (empty($perkades)) : ?>
                             <div class="col-lg-12 text-center">
                                <div class="alert alert-danger" role="alert">
                                    Informasi belum ditambahkan.
                                </div>
                            </div>
                        <?php endif; ?>

                         <ul>
                            <?php foreach ($perkades as $pkd) : ?>
                                <li><i class="bi bi-check-circle-fill"></i> PERDES TAHUN <?= $pkd['tahun']; ?> <a href="<?= $pkd['link']; ?>">DOWNLOAD</a></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End JDIH Section -->

</main>