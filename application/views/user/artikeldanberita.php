 <main id="main">

     <!-- ======= Artikel dan Berita Section ======= -->
     <section id="artikeldanberita" class="blog">

         <div class="container">

             <div class="section-header">
                 <h2>Artikel dan Berita</h2>
                 <p>Desa Sutapranan Kecamatan Dukuhturi Kabupaten Tegal</p>
             </div>

         </div>

         <div class="container" data-aos="fade-up">

             <div class="row g-5">

                 <div class="col-lg-8 order-2 order-lg-1">

                     <div class="row gy-4 posts-list">

                         <?php if (empty($artikeldanberita)) : ?>
                             <div class="col-lg-12 text-center">
                                 <div class="alert alert-danger" role="alert">
                                     Artikel atau berita tidak ditemukan!
                                 </div>
                             </div>
                         <?php endif; ?>

                         <?php foreach ($artikeldanberita as $adb) : ?>
                             <div class="col-lg-6">
                                 <article class="d-flex flex-column">

                                     <div class="post-img">
                                         <img src="<?= base_url('assets/img/artikeldanberita/') . $adb['gambar']; ?>" class="img-fluid">
                                     </div>

                                     <h2 class="title">
                                         <?= $adb['judul']; ?>
                                     </h2>

                                     <div class="meta-top">
                                         <ul>
                                             <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <?= format_indo(date('Y-m-d', $adb['tanggal'])); ?></li>
                                         </ul>
                                     </div>

                                     <div class="content">
                                         <p>
                                             <?= substr($adb['isi'], 0, 100); ?> . . .
                                         </p>
                                     </div>

                                     <div class="read-more mt-auto align-self-end">
                                         <a href="<?= base_url('user/detailartikeldanberita/'); ?><?= $adb['id']; ?>">Baca Selengkapnya</a>
                                     </div>

                                 </article>
                             </div>
                         <?php endforeach; ?>

                     </div>

                     <?= $this->pagination->create_links(); ?>

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
     <!-- End Artikel dan Berita Section -->

 </main>