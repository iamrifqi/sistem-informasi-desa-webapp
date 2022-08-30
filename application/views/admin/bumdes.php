<main id="main" class="main">

    <div class="pagetitle">
        <h1>BUMDes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Umum</li>
                <li class="breadcrumb-item active">BUMDes</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">

            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengurus BUMDes</h5>

                        <?= $this->session->flashdata('pesansatu'); ?>

                        <!-- Tambah Data Pengurus BUMDes -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</span>

                        <div class="modal fade" id="tambahModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Pengurus BUMDes</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?= form_open_multipart('admin/tambahpengurus'); ?>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('Masukkan nama pengurus BUMDes!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jabatan" name="jabatan" required oninvalid="this.setCustomValidity('Masukkan jabatan pengurus BUMDes!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="gambar" name="gambar" required oninvalid="this.setCustomValidity('Masukkan foto pengurus BUMDes!')" oninput="setCustomValidity('')">
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
                        <!-- End Tambah Data Pengurus BUMDes -->

                        <!-- Data Pengurus BUMDes -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pengurus as $p) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['jabatan']; ?></td>
                                        <td>

                                            <!-- Detail Data Pengurus BUMDes -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $p['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Pengurus BUMDes</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card my-3 shadow-none">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="<?= base_url('assets/img/bumdes/') . $p['gambar']; ?>" class="img-fluid rounded-start">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><?= $p['nama']; ?></h5>
                                                                            <p class="card-text"><?= $p['jabatan']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Data Pengurus BUMDes -->

                                            <!-- Edit Data Pengurus BUMDes -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Pengurus BUMDes</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <?= form_open_multipart('admin/editpengurus'); ?>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $p['id']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama']; ?>" required oninvalid="this.setCustomValidity('Masukkan nama pengurus!')" oninput="setCustomValidity('')">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $p['jabatan']; ?>" required oninvalid="this.setCustomValidity('Masukkan jabatan pengurus!')" oninput="setCustomValidity('')">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                                                <div class="col-lg-3">
                                                                    <img src="<?= base_url('assets/img/bumdes/') . $p['gambar']; ?>" class="img-thumbnail" width="256px" height="472px">
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <input class="form-control" type="file" id="gambar" name="gambar">
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
                                            <!-- End Edit Data Pengurus BUMDes -->

                                            <!-- Hapus Data Pengurus BUMDes -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $p['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Pengurus BUMDes</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data pengurus BUMDes dengan nama <?= $p['nama']; ?> dan jabatan <?= $p['jabatan']; ?>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapuspengurus/'); ?><?= $p['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Pengurus BUMDes -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Pengurus BUMDes -->

                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                <div class="card">
                    <h5 class="card-title text-center">Informasi BUMDes</h5>
                    <div class="mx-3">
                        <?= $this->session->flashdata('pesandua'); ?>
                    </div>
                    <div class="card-body profile-card d-flex flex-column">
                        <!-- Data BUMDes -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bumdes as $b) : ?>
                                    <tr>
                                        <td><?= $b['nama']; ?></td>
                                        <td>
                                            <!-- Edit Data BUMDes -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editbdModal<?= $b['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editbdModal<?= $b['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data BUMDes</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url('admin/editdatabumdes'); ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $b['nama']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan isi data BUMDes!')" oninput="setCustomValidity('')"><?= $b['isi']; ?></textarea>
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
                                            <!-- End Edit Data BUMDes -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data BUMDes -->

                    </div>
                </div>
            </div>

            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Unit Usaha BUMDes</h5>

                        <?= $this->session->flashdata('pesantiga'); ?>

                        <!-- Tambah Data Unit Usaha BUMDes -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahunitModal">Tambah</span>

                        <div class="modal fade" id="tambahunitModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Unit Usaha BUMDes</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('admin/tambahunitusaha'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('Masukkan nama unit usaha BUMDes!')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan informasi mengenai unit usaha BUMDes!')" oninput="setCustomValidity('')"></textarea>
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
                        <!-- End Tambah Data Unit Usaha BUMDes -->

                        <!-- Data Unit Usaha BUMDes -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Unit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($unitusaha as $uu) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $uu['nama']; ?></td>
                                        <td>
                                            <!-- Detail Data Unit Usaha BUMDes -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailunitModal<?= $uu['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailunitModal<?= $uu['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Unit Usaha BUMDes</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row g-0">
                                                                <div class="col-12">
                                                                    <h5><?= $uu['nama']; ?></h5>
                                                                    <p><?= $uu['isi']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edituuModal<?= $uu['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Data Unit Usaha BUMDes -->

                                            <!-- Edit Data Unit Usaha BUMDes -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#edituuModal<?= $uu['id']; ?>">Edit</span>

                                            <div class="modal fade" id="edituuModal<?= $uu['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Unit Usaha BUMDes</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url('admin/editunitusaha'); ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $uu['id']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $uu['nama']; ?>" required oninvalid="this.setCustomValidity('Masukkan nama pengurus!')" oninput="setCustomValidity('')">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan informasi mengenai unit usaha BUMDes!')" oninput="setCustomValidity('')"><?= $uu['isi']; ?></textarea>
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
                                            <!-- End Edit Data Unit Usaha BUMDes -->

                                            <!-- Hapus Data Unit Usaha BUMDes -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusuuModal<?= $uu['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusuuModal<?= $uu['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Unit Usaha BUMDes</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data unit usaha BUMDes terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapusunitusaha/'); ?><?= $uu['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Unit Usaha BUMDes -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Unit Usaha BUMDes -->

                    </div>
                </div>

            </div>

        </div>
    </section>

</main>