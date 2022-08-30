<main id="main">

    <!-- ======= Kontak Section ======= -->
    <section id="kontak" class="contact">
        <div class="container">

            <div class="section-header">
                <h2>Kontak</h2>
                <p>Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
            </div>

        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.919840383418!2d109.1334077143672!3d-6.9001900694433305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9a5b185145f%3A0x51bad9984d075d62!2sBalai%20desa%20sutapranan!5e0!3m2!1sid!2sid!4v1658853375612!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-4">

                    <div class="info">
                        <h3>Kontak Desa</h3>
                        <p>Dibawah ini adalah kontak desa yang bisa dihubungi:</p>

                        <?php foreach ($kontak as $k) : ?>
                            <div class="info-item d-flex">
                                <i class="<?= $k['simbol']; ?> flex-shrink-0"></i>
                                <div>
                                    <h4><?= $k['nama']; ?></h4>
                                    <p><?= $k['isi']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="col-lg-8">

                    <h4 class="text-center">Layanan Pengaduan Masyarakat</h4>

                    <?= $this->session->flashdata('pesan'); ?>

                    <form action="<?= base_url('user/kontak'); ?>" method="post" class="form-message">
                        <div class="form-group mt-3">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama anda">
                            <?= form_error('nama', '<small class="text-danger ps-2">', '</small>'); ?>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat rumah anda">
                            <?= form_error('alamat', '<small class="text-danger ps-2">', '</small>'); ?>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="isi" id="isi" rows="5" placeholder="Pesan, kritik atau saran."></textarea>
                            <?= form_error('isi', '<small class="text-danger ps-2">', '</small>'); ?>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-secondary">Kirim</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- End Kontak Section -->

</main>