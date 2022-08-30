<main id="main" class="main">

    <div class="pagetitle">
        <h1>Jaringan Dokumentasi dan Informasi Hukum</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Umum</li>
                <li class="breadcrumb-item active">Jaringan Dokumentasi dan Informasi Hukum</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Peraturan Desa</h5>

                        <?= $this->session->flashdata('pesansatu'); ?>

                        <!-- Tambah Data Peraturan Desa -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</span>

                        <div class="modal fade" id="tambahModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Peraturan Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="<?= base_url('admin/tambahperdes'); ?>">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="tahun" name="tahun" required oninvalid="this.setCustomValidity('Masukkan tahun Peraturan Desa!')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="link" class="col-sm-2 col-form-label">Link</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="link" name="link" required oninvalid="this.setCustomValidity('Masukkan link Peraturan Desa!')" oninput="setCustomValidity('')">
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
                        <!-- End Tambah Data Peraturan Desa -->

                        <!-- Data Peraturan Desa -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($perdes as $pd) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $pd['tahun']; ?></td>
                                        <td>
                                            <!-- Edit Data Peraturan Desa -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $pd['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $pd['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Peraturan Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editperdes'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $pd['id']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $pd['tahun']; ?>" required oninvalid="this.setCustomValidity('Masukkan tahun Peraturan Desa!')" oninput="setCustomValidity('')">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="link" name="link" value="<?= $pd['link']; ?>" required oninvalid="this.setCustomValidity('Masukkan link Peraturan Desa!')" oninput="setCustomValidity('')">
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
                                            <!-- End Edit Data Peraturan Desa -->

                                            <!-- Hapus Data Peraturan Desa -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $pd['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusModal<?= $pd['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Peraturan Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus Data Peraturan Desa terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapusperdes/'); ?><?= $pd['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Peraturan Desa -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Peraturan Desa -->

                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Peraturan Kepala Desa</h5>

                        <?= $this->session->flashdata('pesandua'); ?>

                        <!-- Tambah Data Peraturan Kepala Desa -->
                        <span type="button" class="badge bg-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambaperkadeshModal">Tambah</span>

                        <div class="modal fade" id="tambaperkadeshModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Peraturan Kepala Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="<?= base_url('admin/tambahperkades'); ?>">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="tahun" name="tahun" required oninvalid="this.setCustomValidity('Masukkan tahun Peraturan Desa!')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="link" class="col-sm-2 col-form-label">Link</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="link" name="link" required oninvalid="this.setCustomValidity('Masukkan link Peraturan Desa!')" oninput="setCustomValidity('')">
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
                        <!-- End Tambah Data Peraturan Kepala Desa -->

                        <!-- Data Peraturan Kepala Desa -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($perkades as $pkd) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $pkd['tahun']; ?></td>
                                        <td>
                                            <!-- Edit Data Peraturan Kepala Desa -->
                                            <span type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editperkadesModal<?= $pkd['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editperkadesModal<?= $pkd['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Peraturan Kepala Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editperkades'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $pkd['id']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $pkd['tahun']; ?>" required oninvalid="this.setCustomValidity('Masukkan tahun Peraturan Desa!')" oninput="setCustomValidity('')">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="link" name="link" value="<?= $pkd['link']; ?>" required oninvalid="this.setCustomValidity('Masukkan link Peraturan Desa!')" oninput="setCustomValidity('')">
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
                                            <!-- End Edit Data Peraturan Kepala Desa -->

                                            <!-- Hapus Data Peraturan Kepala Desa -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusperkadesModal<?= $pkd['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusperkadesModal<?= $pkd['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Peraturan Kepala Desa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus Data Peraturan Kepala Desa terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapusperkades/'); ?><?= $pkd['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Peraturan Kepala Desa -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Peraturan Kepala Desa -->

                    </div>
                </div>

            </div>

        </div>
    </section>

</main>