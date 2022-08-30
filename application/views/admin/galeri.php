<main id="main" class="main">

    <div class="pagetitle">
        <h1>Galeri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Umum</li>
                <li class="breadcrumb-item active">Galeri</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Filter Galeri</h5>

                        <?= $this->session->flashdata('pesansatu'); ?>

                        <!-- Tambah Filter Galeri -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahfilterModal">Tambah</span>

                        <div class="modal fade" id="tambahfilterModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Filter Galeri</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="<?= base_url('admin/tambahfilter'); ?>">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('Masukkan nama filter galeri!')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="filter" name="filter" required oninvalid="this.setCustomValidity('Masukkan filter galeri!')" oninput="setCustomValidity('')">
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
                        <!-- End Tambah Filter Galeri -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Filter</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($filter as $f) : ?>
                                    <tr>
                                        <td><?= $f['nama']; ?></td>
                                        <td>
                                            <!-- Edit Filter Galeri -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editfilterModal<?= $f['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editfilterModal<?= $f['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Filter Galeri</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editfilter'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $f['id']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $f['nama']; ?>" required oninvalid="this.setCustomValidity('Masukkan nama filter galeri!')" oninput="setCustomValidity('')">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="filter" name="filter" value="<?= $f['filter']; ?>" required oninvalid="this.setCustomValidity('Masukkan filter galeri!')" oninput="setCustomValidity('')">
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
                                            <!-- End Edit Filter Galeri -->

                                            <!-- Hapus Filter Galeri -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusfilterModal<?= $f['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusfilterModal<?= $f['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Filter Galeri</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus filter galeri terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapusfilter/'); ?><?= $f['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Filter Galeri -->
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
                        <h5 class="card-title">Data Galeri</h5>

                        <?= $this->session->flashdata('pesandua'); ?>

                        <!-- Tambah Data Galeri -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</span>

                        <div class="modal fade" id="tambahModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Galeri</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?= form_open_multipart('admin/tambahgaleri'); ?>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="judul" name="judul" required oninvalid="this.setCustomValidity('Masukkan judul galeri!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example" id="filter" name="filter">
                                                    <option selected>Pilih Filter</option>
                                                    <?php foreach ($filter as $f) : ?>
                                                        <option value="<?= $f['filter']; ?>"><?= $f['nama']; ?></option>
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Tambah Data Galeri -->

                        <!-- Data Galeri -->
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
                                foreach ($galeri as $g) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $g['judul']; ?></td>
                                        <td><?= format_indo(date('Y-m-d', $g['tanggal'])); ?></td>
                                        <td>

                                            <!-- Detail Data Galeri -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $g['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $g['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Galeri</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card my-3 shadow-none">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="<?= base_url('assets/img/galeri/') . $g['gambar']; ?>" class="img-fluid rounded-start">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><?= $g['judul']; ?></h5>
                                                                            <?php
                                                                            $gtag = $g['id'];
                                                                            $queryTag = "SELECT `filter`.`filter`,`nama` FROM `filter` JOIN `galeri` ON `filter`.`filter` = `galeri`.`filter` WHERE `galeri`.`id` = $gtag";
                                                                            $tag = $this->db->query($queryTag)->result_array();
                                                                            ?>
                                                                            <?php foreach ($tag as $t) : ?>
                                                                                <p><?= $t['nama']; ?></p>
                                                                            <?php endforeach; ?>
                                                                            <p class="card-text"><?= format_indo(date('Y-m-d', $g['tanggal'])); ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $g['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Data Galeri -->

                                            <!-- Edit Data Galeri -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $g['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $g['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Galeri</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editgaleri'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $g['id']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $g['judul']; ?>" required oninvalid="this.setCustomValidity('Masukkan judul galeri!')" oninput="setCustomValidity('')">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-select" aria-label="Default select example" id="filter" name="filter">
                                                                            <option selected>
                                                                                <?php
                                                                                $gtag = $g['id'];
                                                                                $queryTag = "SELECT `filter`.`filter`,`nama` FROM `filter` JOIN `galeri` ON `filter`.`filter` = `galeri`.`filter` WHERE `galeri`.`id` = $gtag";
                                                                                $tag = $this->db->query($queryTag)->result_array();
                                                                                ?>
                                                                                <?php foreach ($tag as $t) : ?>
                                                                                    <p><?= $t['nama']; ?></p>
                                                                                <?php endforeach; ?>
                                                                            </option>
                                                                            <?php foreach ($filter as $f) : ?>
                                                                                <option value="<?= $f['filter']; ?>"><?= $f['nama']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                                                    <div class="col-sm-10">
                                                                        <img src="<?= base_url('assets/img/galeri/') . $g['gambar']; ?>" class="img-thumbnail" width="472px" height="256px">
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
                                            <!-- End Edit Data Galeri -->

                                            <!-- Hapus Data Galeri -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $g['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusModal<?= $g['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Galeri</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data galeri terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapusgaleri/'); ?><?= $g['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Galeri -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Galeri -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>