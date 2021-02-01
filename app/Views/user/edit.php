<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            <form action="/user/update/<?= $user['id']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Full name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" autocomplete="off" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" value="<?= $user['name']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="/img/profile/<?= $user['image']; ?>" id="preview" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" name="image" id="image">
                                    <label class="custom-file-label" for="image"><?= $user['image']; ?></label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>