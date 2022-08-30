<main id="main" class="main">

    <div class="pagetitle">
        <h1>Papan Informasi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Informasi Utama</li>
                <li class="breadcrumb-item active">Papan Informasi</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Data Papan Informasi</h5>

                        <?= $this->session->flashdata('pesan'); ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Informasi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($papaninformasi as $pi) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <th><?= $pi['nama']; ?></th>
                                        <td>

                                            <!-- Detail Papan Informasi -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $pi['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $pi['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail <?= $pi['nama']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= $pi['isi']; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $pi['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Papan Informasi -->

                                            <!-- Edit Papan Informasi -->
                                            <span type="button" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $pi['id']; ?>">Edit</span>

                                            <div class="modal fade" id="editModal<?= $pi['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit <?= $pi['nama']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('admin/editpapaninformasi'); ?>">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $pi['nama']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <textarea class="form-control" id="isi" name="isi" rows="5" required oninvalid="this.setCustomValidity('Masukkan isi informasi!')" oninput="setCustomValidity('')"><?= $pi['isi']; ?></textarea>
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
                                            <!-- End Edit Papan Informasi -->
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