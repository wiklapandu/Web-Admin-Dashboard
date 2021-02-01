<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6">
            <?= session()->getFlashdata('error'); ?>
            <form action="<?= base_url('user/updatepassword'); ?>" method="post">
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" autocomplete="off" name="currentPassword" class="password form-control <?= ($validation->hasError('currentPassword')) ? 'is-invalid' : ''; ?>" id="currentPassword" placeholder="" value="<?= old('currentPassword'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('currentPassword'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword1">New Password</label>
                    <input type="password" autocomplete="off" name="newPassword1" class="password form-control <?= ($validation->hasError('newPassword1')) ? 'is-invalid' : ''; ?>" id="newPassword1" placeholder="" value="<?= old('newPassword1'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('newPassword1'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword2">Repeat Password</label>
                    <input type="password" autocomplete="off" name="newPassword2" class="password form-control <?= ($validation->hasError('newPassword2')) ? 'is-invalid' : ''; ?>" id="newPassword2" placeholder="" value="<?= old('newPassword2'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('newPassword2'); ?>
                    </div>
                </div>
                <?= session()->getFlashdata('InError'); ?>
                <div class="form-check d-flex mb-3">
                    <div class="col row">
                        <input class="form-check-input" type="checkbox" value="true" id="auth" name="auth">
                        <label class="form-check-label" for="auth">
                            I'm not Robot
                        </label>
                    </div>
                    <div class="col row">
                        <input type="checkbox" class="form-check-input" id="view">
                        <label for="view" class="form-check-label">Show Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success px-4">Change</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>