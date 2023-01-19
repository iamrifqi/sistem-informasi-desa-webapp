<main id="main">

    <!-- ======= BUMDes Section ======= -->
    <section id="bumdes" class="features">

        <div class="container">

            <div class="section-header">
                <h2>Badan Usaha Milik Desa</h2>
                <p>Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
            </div>

        </div>

        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row gy-4 d-flex">

                <li class="nav-item col-lg-3 col-md-4">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-3">
                        <i class="bi bi-diagram-3 color-grey"></i>
                        <h4>Pengurus BUMDes</h4>
                    </a>
                </li>

                <?php foreach ($bumdes as $b) : ?>
                    <li class="nav-item col-lg-3 col-md-4">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-<?= $b['id']; ?>">
                            <i class="<?= $b['simbol']; ?> color-grey"></i>
                            <h4><?= $b['nama']; ?></h4>
                        </a>
                    </li>
                <?php endforeach; ?>

                <li class="nav-item col-lg-3 col-md-4">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                        <i class="bi bi-bank color-grey"></i>
                        <h4>Unit Usaha BUMDes</h4>
                    </a>
                </li>

            </ul>

            <div class="tab-content" style="text-align: justify;">

                <div class="tab-pane active show" id="tab-3">
                    <div class="row gy-4">
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-center mb-3">Pengurus BUMDes</h3>

                            <div class="row gy-5">
                                <?php if (empty($pengurus)) : ?>
                                    <div class="col-lg-12 text-center">
                                        <div class="alert alert-danger" role="alert">
                                            Informasi pengurus belum ditambahkan.
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php foreach ($pengurus as $p) : ?>
                                    <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                                        <div class="features-member">
                                            <div class="member-img">
                                                <img src="<?= base_url('assets/img/perangkatdesa/') . $p['gambar']; ?>" class="img-fluid">
                                            </div>
                                            <div class="member-info">
                                                <h4><?= $p['nama']; ?></h4>
                                                <span><?= $p['jabatan']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>

                <?php foreach ($bumdes as $b) : ?>
                    <div class="tab-pane" id="tab-<?= $b['id']; ?>">
                        <div class="row gy-4">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                                <h3 class="text-center mb-3"><?= $b['nama']; ?></h3>
                                <p>
                                    <?= $b['isi']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="tab-pane" id="tab-4">
                    <div class="row gy-4">
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-center mb-3">Unit Usaha BUMDes</h3>

                            <?php if (empty($unitusaha)) : ?>
                                <div class="col-lg-12 text-center">
                                    <div class="alert alert-danger" role="alert">
                                        Informasi belum ditambahkan.
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($unitusaha as $uu) : ?>
                                <p>
                                <h5><?= $uu['nama']; ?></h5>
                                </p>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> <?= $uu['isi']; ?></li>
                                </ul>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End BUMDes Section -->

</main>