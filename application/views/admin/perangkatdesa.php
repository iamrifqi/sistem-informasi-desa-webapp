<main id="main" class="main">

    <div class="pagetitle">
        <h1>Perangkat Desa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Utama</li>
                <li class="breadcrumb-item active">Perangkat Desa</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-lg-3">

                <div class="card">
                    <h5 class="card-title text-center">Data Kepala Desa</h5>
                    <div class="mx-3">
                        <?= $this->session->flashdata('pesansatu'); ?>
                    </div>
                    <div class="card-body profile-card d-flex flex-column align-items-center">
                        <!-- Data Kepala Desa -->
                        <?php foreach ($kepaladesa as $kd) : ?>
                            <img src="<?= base_url('assets/img/perangkatdesa/') . $kd['gambar']; ?>" class="img-fluid">
                            <h2><?= $kd['jabatan']; ?></h2>
                            <h3><?= $kd['nama']; ?></h3>

                            <!-- Edit Data Kepala Desa -->
                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editkdModal<?= $kd['id']; ?>">Edit</span>

                            <div class="modal fade" id="editkdModal<?= $kd['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data Kepala Desa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <?= form_open_multipart('admin/editkepaladesa'); ?>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $kd['id']; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $kd['nama']; ?>" required oninvalid="this.setCustomValidity('Masukkan nama perangkat desa!')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                                <div class="col-lg-3">
                                                    <img src="<?= base_url('assets/img/perangkatdesa/') . $kd['gambar']; ?>" class="img-thumbnail" width="256px" height="472px">
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
                            <!-- End Edit Data Kepala Desa -->
                        <?php endforeach; ?>
                        <!-- End Data Kepala Desa -->
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Perangkat Desa</h5>

                        <?= $this->session->flashdata('pesandua'); ?>

                        <!-- Tambah Data Perangkat Desa -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</span>

                        <div class="modal fade" id="tambahModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Perangkat Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?= form_open_multipart('admin/tambahperangkatdesa'); ?>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('Masukkan nama perangkat desa!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jabatan" name="jabatan" required oninvalid="this.setCustomValidity('Masukkan jabatan perangkat desa!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="gambar" name="gambar" required oninvalid="this.setCustomValidity('Masukkan foto perangkat desa!')" oninput="setCustomValidity('')">
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
                        <!-- End Tambah Data Perangkat Desa -->

                        <!-- Data Perangkat Desa -->
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
                                foreach ($perangkatdesa as $pd) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $pd['nama']; ?></td>
                                        <td><?= $pd['jabatan']; ?></td>
                                        <td>

                                            <!-- Detail Data Perangkat Desa -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $pd['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $pd['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Perangkat Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card my-3 shadow-none">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="<?= base_url('assets/img/perangkatdesa/') . $pd['gambar']; ?>" class="img-fluid rounded-start">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><?= $pd['nama']; ?></h5>
                                                                            <p class="card-text"><?= $pd['jabatan']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $pd['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Data Perangkat Desa -->

                                            <!-- Edit Data Perangkat Desa -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $pd['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $pd['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Perangkat Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <?= form_open_multipart('admin/editperangkatdesa'); ?>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $pd['id']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $pd['nama']; ?>" required oninvalid="this.setCustomValidity('Masukkan nama perangkat desa!')" oninput="setCustomValidity('')">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $pd['jabatan']; ?>" required oninvalid="this.setCustomValidity('Masukkan jabatan perangkat desa!')" oninput="setCustomValidity('')">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                                                <div class="col-lg-3">
                                                                    <img src="<?= base_url('assets/img/perangkatdesa/') . $pd['gambar']; ?>" class="img-thumbnail" width="256px" height="472px">
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
                                            <!-- End Edit Data Perangkat Desa -->

                                            <!-- Hapus Data Perangkat Desa -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $pd['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusModal<?= $pd['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Perangkat Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data perangkat desa dengan nama <?= $pd['nama']; ?> dan jabatan <?= $pd['jabatan']; ?>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapusperangkatdesa/'); ?><?= $pd['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Perangkat Desa -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Perangkat Desa -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>