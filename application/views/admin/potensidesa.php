<main id="main" class="main">

    <div class="pagetitle">
        <h1>Potensi Desa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Utama</li>
                <li class="breadcrumb-item active">Potensi Desa</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Potensi Desa</h5>

                        <?= $this->session->flashdata('pesan'); ?>

                        <!-- Tambah Data Potensi Desa -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</span>

                        <div class="modal fade" id="tambahModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Potensi Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?= form_open_multipart('admin/tambahpotensidesa'); ?>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('Masukkan nama potensi desa!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan keterangan potensi desa!')" oninput="setCustomValidity('')"></textarea>
                                                <small>Keterangan: &amp;nbsp digunakan untuk membuat paragraf dan &lt;br&gt; digunakan untuk enter paragraf.</small>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="gambar" name="gambar" required oninvalid="this.setCustomValidity('Masukkan foto potensi desa!')" oninput="setCustomValidity('')">
                                                <small>Ukuran maksimal foto yang diupload adalah 2 MB dengan rasio 3:4!</small>
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
                        <!-- End Tambah Data Potensi Desa -->

                        <!-- Data Potensi Desa -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($potensi as $p) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $p['nama']; ?></td>
                                        <td>

                                            <!-- Detail Data Potensi Desa -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $p['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Potensi Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card my-3 shadow-none">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="<?= base_url('assets/img/potensi/') . $p['gambar']; ?>" class="img-fluid rounded-start">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><?= $p['nama']; ?></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p><?= $p['isi']; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Data Potensi Desa -->

                                            <!-- Edit Data Potensi Desa -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Potensi Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <?= form_open_multipart('admin/editpotensidesa'); ?>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $p['id']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama']; ?>" required oninvalid="this.setCustomValidity('Masukkan nama potensi desa!')" oninput="setCustomValidity('')">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan keterangan potensi desa!')" oninput="setCustomValidity('')"><?= $p['isi']; ?></textarea>
                                                                    <small>Keterangan: &amp;nbsp digunakan untuk membuat paragraf dan &lt;br&gt; digunakan untuk enter paragraf.</small>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                                                <div class="col-lg-3">
                                                                    <img src="<?= base_url('assets/img/potensi/') . $p['gambar']; ?>" class="img-thumbnail" width="256px" height="472px">
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
                                            <!-- End Edit Data Potensi Desa -->

                                            <!-- Hapus Data Potensi Desa -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $p['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Potensi Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data potensi desa terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapuspotensidesa/'); ?><?= $p['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Potensi Desa -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Potensi Desa -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>