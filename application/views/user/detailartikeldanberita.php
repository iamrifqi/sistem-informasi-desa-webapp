<main id="main">

    <!-- ======= Detail Artikel dan Berita Section ======= -->
    <section id="artikeldanberita" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8 order-2 order-lg-1">

                    <article class="blog-details">

                        <div class="post-img">
                            <img src="<?= base_url('assets/img/artikeldanberita/') . $artikeldanberita['gambar']; ?>" class="img-fluid">
                        </div>

                        <h2 class="title"><?= $artikeldanberita['judul']; ?></h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <?= format_indo(date('Y-m-d', $artikeldanberita['tanggal'])); ?></li>
                            </ul>
                        </div>

                        <div class="content">
                            <p>
                                <?= $artikeldanberita['isi']; ?>
                            </p>

                        </div>

                        <div class="meta-bottom">
                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <?php
                                $adbtag = $this->uri->segment(3);
                                $queryTag = "SELECT `kategori`.`id`, `kategori` FROM `kategori` JOIN `artikeldanberita` ON `kategori`.`id` = `artikeldanberita`.`id_kategori` WHERE `artikeldanberita`.`id` = $adbtag";
                                $tag = $this->db->query($queryTag)->result_array();
                                ?>
                                <?php foreach ($tag as $t) : ?>
                                    <li><?= $t['kategori']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </article>

                </div>

                <div class="col-lg-4 order-1 order-lg-2">

                    <div class="sidebar">

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Cari</h3>
                            <form action="<?= base_url('user/artikeldanberita'); ?>" method="post" class="mt-3">
                                <input type="text" name="keyword" autocomplete="off" autofocus>
                                <input type="submit" name="submit"></input>
                            </form>
                        </div>

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Kategori</h3>
                            <ul class="mt-3">
                                <?php foreach ($kategori as $k) : ?>
                                    <li><a href="<?= base_url('user/kategori?filter=') . $k['kategori']; ?>"><?= $k['kategori']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ======= End Detail Artikel dan Berita Section ======= -->

</main>