<?= $this->extend('layout/template'); ?>
<?= $this->section('auth'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <h1 class="h4 text-gray-900 mb-2">Change Your Password for</h1>
                                    <h5><?= session()->get('reset_email'); ?></h5>
                                    <?= session()->getFlashdata('actionTrue'); ?>
                                </div>
                                <form class="user" action="<?= base_url('userdata/changepassword'); ?>" method="POST">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user password <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" aria-describedby="emailHelp" placeholder="Enter New Password Address...">
                                        <div class="ml-3 invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="Repassword" class="form-control form-control-user password <?= ($validation->hasError('Repassword')) ? 'is-invalid' : '' ?>" id="Repassword" aria-describedby="emailHelp" placeholder="Repeat New Password Address...">
                                        <div class="ml-3 invalid-feedback">
                                            <?= $validation->getError('Repassword'); ?>
                                        </div>
                                    </div>
                                    <div class="form-check ml-3 mb-3">
                                        <input class="form-check-input" type="checkbox" id="view">
                                        <label class="form-check-label" for="view">
                                            Show Password
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Change Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('registration'); ?>">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>