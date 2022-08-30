<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pengaturan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Lain-Lain</li>
                <li class="breadcrumb-item active">Pengaturan</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaturan</h5>

                        <?= $this->session->flashdata('pesansatu'); ?>

                        <?= form_open_multipart('admin/pengaturan'); ?>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="username" name="username" value="<?= $admin['username']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Desa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $admin['name']; ?>">
                                <?= form_error('name', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>">
                                <?= form_error('email', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-sm-2">Foto</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/admin/') . $admin['image']; ?>" class="img-thumbnail" alt="" width="200px" height="200px">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Kata Sandi</h5>

                        <?= $this->session->flashdata('pesandua'); ?>

                        <form action="<?= base_url('admin/katasandi'); ?>" method="post">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control form-control-user" id="current_password" name="current_password" placeholder="Masukkan kata sandi lama!">
                                <?= form_error('current_password', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control form-control-user" id="new_password" name="new_password" placeholder="Masukkan kata sandi baru">
                                <?= form_error('new_password', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>