    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card">
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="<?= base_url(); ?>" class="logo d-flex align-items-center w-auto">
                                        <img src="<?= base_url('assets/img/'); ?>logo.png">
                                    </a>
                                </div>
                                <div class="card-body">

                                    <div class="mb-3">
                                        <h5 class="card-title text-center pb-0 fs-4">Reset Kata Sandi</h5>
                                        <p class="text-center small">Halo Admin Desa <?= $name; ?></p>
                                    </div>

                                    <?= $this->session->flashdata('pesan'); ?>

                                    <form class="row g-3" method="post" action="<?= base_url('auth/resetpassword/' . $token); ?>">

                                        <div class="col-12">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Kata Sandi Baru">
                                            <?= form_error('password', '<small class="text-danger ps-2">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                            <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukkan Ulang Kata Sandi Baru">
                                            <?= form_error('password2', '<small class="text-danger ps-2">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-12 text-center mb-3">
                                            <a href="<?= base_url('auth'); ?>"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>