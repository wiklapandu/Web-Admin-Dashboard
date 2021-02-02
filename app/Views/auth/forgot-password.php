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
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <?php if (session()->getFlashdata('actionTrue')) : ?>
                                        <?= session()->getFlashdata('actionTrue'); ?>
                                    <?php else : ?>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    <?php endif; ?>
                                </div>
                                <form class="user" action="<?= base_url('userdata/forgotpassword'); ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        <div class="ml-3 invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Reset Password
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