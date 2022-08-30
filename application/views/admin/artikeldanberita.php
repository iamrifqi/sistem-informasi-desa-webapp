<main id="main" class="main">

    <div class="pagetitle">
        <h1>Artikel dan Berita</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Umum</li>
                <li class="breadcrumb-item active">Artikel dan Berita</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kategori</h5>

                        <?= $this->session->flashdata('pesansatu'); ?>

                        <!-- Tambah Kategori -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahkatModal">Tambah</span>

                        <div class="modal fade" id="tambahkatModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Kategori</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="<?= base_url('admin/tambahkategori'); ?>">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kategori" name="kategori" required oninvalid="this.setCustomValidity('Masukkan nama kategori!')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Tambah Kategori -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $k) : ?>
                                    <tr>
                                        <td><?= $k['kategori']; ?></td>
                                        <td>
                                            <!-- Edit Kategori -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editkatModal<?= $k['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editkatModal<?= $k['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Kategori</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editkategori'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $k['id']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $k['kategori']; ?>" required oninvalid="this.setCustomValidity('Masukkan nama kategori!')" oninput="setCustomValidity('')">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Edit Kategori -->

                                            <!-- Hapus Kategori -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapuskatModal<?= $k['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapuskatModal<?= $k['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Kategori</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data kategori terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapuskategori/'); ?><?= $k['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Kategori -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Artikel dan Berita</h5>

                        <?= $this->session->flashdata('pesan'); ?>

                        <!-- Tambah Data Artikel dan Berita -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</span>

                        <div class="modal fade" id="tambahModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Artikel dan Berita</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?= form_open_multipart('admin/tambahartikeldanberita'); ?>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="judul" name="judul" required oninvalid="this.setCustomValidity('Masukkan judul artikel dan berita!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example" id="id_kategori" name="id_kategori">
                                                    <option selected>Pilih Kategori</option>
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="gambar" name="gambar" required oninvalid="this.setCustomValidity('Masukkan foto baru!')" oninput="setCustomValidity('')">
                                                <small>Ukuran maksimal foto yang diupload adalah 2 MB dengan rasio 4:3!</small>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan isi artikel dan berita!')" oninput="setCustomValidity('')"></textarea>
                                                <small>Keterangan: &amp;nbsp digunakan untuk membuat paragraf dan &lt;br&gt; digunakan untuk enter paragraf.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Tambah Data Artikel dan Berita -->

                        <!-- Data Artikel dan Berita -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($artikeldanberita as $adb) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $adb['judul']; ?></td>
                                        <td><?= format_indo(date('Y-m-d', $adb['tanggal'])); ?></td>
                                        <td>
                                            <!-- Detail Data Artikel dan Berita -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $adb['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $adb['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Artikel dan Berita</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card my-3 shadow-none">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="<?= base_url('assets/img/artikeldanberita/') . $adb['gambar']; ?>" class="img-fluid rounded-start">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><?= $adb['judul']; ?></h5>
                                                                            <?php
                                                                            $adbtag = $adb['id'];
                                                                            $queryTag = "SELECT `kategori`.`id`, `kategori` FROM `kategori` JOIN `artikeldanberita` ON `kategori`.`id` = `artikeldanberita`.`id_kategori` WHERE `artikeldanberita`.`id` = $adbtag";
                                                                            $tag = $this->db->query($queryTag)->result_array();
                                                                            ?>
                                                                            <?php foreach ($tag as $t) : ?>
                                                                                <p><?= $t['kategori']; ?></p>
                                                                            <?php endforeach; ?>
                                                                            <p class="card-text"><?= format_indo(date('Y-m-d', $adb['tanggal'])); ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p><?= $adb['isi']; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $adb['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Data Artikel dan Berita -->

                                            <!-- Edit Data Artikel dan Berita -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $adb['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $adb['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Artikel dan Berita</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editartikeldanberita'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $adb['id']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $adb['judul']; ?>" required oninvalid="this.setCustomValidity('Masukkan judul artikel dan berita!')" oninput="setCustomValidity('')">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-select" aria-label="Default select example" id="id_kategori" name="id_kategori">
                                                                            <option selected>
                                                                                <?php
                                                                                $adbtag = $adb['id'];
                                                                                $queryTag = "SELECT `kategori`.`id`, `kategori` FROM `kategori` JOIN `artikeldanberita` ON `kategori`.`id` = `artikeldanberita`.`id_kategori` WHERE `artikeldanberita`.`id` = $adbtag";
                                                                                $tag = $this->db->query($queryTag)->result_array();
                                                                                ?>
                                                                                <?php foreach ($tag as $t) : ?>
                                                                                    <p><?= $t['kategori']; ?></p>
                                                                                <?php endforeach; ?>
                                                                            </option>
                                                                            <?php foreach ($kategori as $k) : ?>
                                                                                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                                                    <div class="col-sm-10">
                                                                        <img src="<?= base_url('assets/img/artikeldanberita/') . $adb['gambar']; ?>" class="img-thumbnail" width="472px" height="256px">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan isi artikel dan berita!')" oninput="setCustomValidity('')"><?= $adb['isi']; ?></textarea>
                                                                        <small>Keterangan: &amp;nbsp digunakan untuk membuat paragraf dan &lt;br&gt; digunakan untuk enter paragraf.</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Edit Data Artikel dan Berita -->

                                            <!-- Hapus Data Artikel dan Berita -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $adb['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusModal<?= $adb['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Artikel dan Berita</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data artikel dan berita terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapusartikeldanberita/'); ?><?= $adb['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Artikel dan Berita -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Artikel dan Berita -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>