<main id="main">

    <!-- ======= Galeri Section ======= -->
    <section id="galeri" class="portfolio" data-aos="fade-up">

        <div class="container">

            <div class="section-header">
                <h2>Galeri</h2>
                <p>Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
            </div>

        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                <ul class="portfolio-flters">
                    <li data-filter="*" class="filter-active">Semua</li>
                    <?php foreach ($filter as $f) : ?>
                        <li data-filter=".filter-<?= $f['filter']; ?>"><?= $f['nama']; ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="row g-0 portfolio-container mb-5 justify-content-center">

                    <?php if (empty($galeri)) : ?>
                        <div class="col-xl-9 col-lg-9 col-md-6 col-12 text-center">
                            <div class="alert alert-danger" role="alert">
                                Galeri desa belum ditambahkan.
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($galeri as $g) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-<?= $g['filter']; ?>">
                            <img src="<?= base_url('assets/img/galeri/') . $g['gambar']; ?>" class="img-fluid">
                            <div class="portfolio-info">
                                <h4><?= $g['judul']; ?></h4>
                                <p class="text-light"><?= format_indo(date('Y-m-d', $g['tanggal'])); ?></p>
                                <a href="<?= base_url('assets/img/galeri/') . $g['gambar']; ?>" title="<?= $g['judul']; ?> (<?= format_indo(date('Y-m-d', $g['tanggal'])); ?>)" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

        </div>
    </section>
    <!-- End Galeri Section -->

</main>