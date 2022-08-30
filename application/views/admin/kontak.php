<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kontak</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Utama</li>
                <li class="breadcrumb-item active">Kontak</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Data Kontak</h5>

                        <?= $this->session->flashdata('pesansatu'); ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kontak as $k) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <th><?= $k['nama']; ?></th>
                                        <td>

                                            <!-- Detail Kontak -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $k['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $k['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail <?= $k['nama']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= $k['isi']; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $k['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Kontak -->

                                            <!-- Edit Kontak -->
                                            <span type="button" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $k['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $k['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit <?= $k['nama']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editkontak'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $k['nama']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <textarea class="form-control" id="isi" name="isi" rows="3" required oninvalid="this.setCustomValidity('Masukkan data kontak!')" oninput="setCustomValidity('')"><?= $k['isi']; ?></textarea>
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
                                            <!-- End Edit Kontak -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>