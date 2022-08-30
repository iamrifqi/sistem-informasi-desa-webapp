<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Layanan Pengaduan Masyarakat</h5>

                        <?= $this->session->flashdata('pesandua'); ?>

                        <!-- Data Layanan Pengaduan Masyarakat -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pesan as $p) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= format_indo(date('Y-m-d', $p['tanggal'])); ?></td>
                                        <td>
                                            <!-- Detail Data Layanan Pengaduan Masyarakat -->
                                            <span type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $p['id']; ?>">Detail</span>

                                            <div class="modal fade" id="detailModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Layanan Pengaduan Masyarakat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-group">
                                                                <div class="card shadow-none">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Nama : <?= $p['nama']; ?></h5>
                                                                        <p class="card-text">Alamat : <?= $p['alamat']; ?></p>
                                                                        <p class="card-text"><?= $p['isi']; ?></p>
                                                                        <small class="text-muted"><?= format_indo(date('Y-m-d', $p['tanggal'])); ?></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Data Layanan Pengaduan Masyarakat -->

                                            <!-- Hapus Data Layanan Pengaduan Masyarakat -->
                                            <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $p['id']; ?>">Hapus</span>

                                            <div class="modal fade" id="hapusModal<?= $p['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Layanan Pengaduan Masyarakat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Hapus data layanan pengaduan masyarakat terpilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('admin/hapuspesan/'); ?><?= $p['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Hapus Data Layanan Pengaduan Masyarakat -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Data Layanan Pengaduan Masyarakat -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>