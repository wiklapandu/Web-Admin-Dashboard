<?= $this->extend('layout/template'); ?>
<?= $this->section('auth'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-10 my-5 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back! Let's Login!</h1>
                                </div>
                                <?php if (session()->getFlashdata('actionTrue')) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('actionTrue'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (session()->getFlashdata('success')) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>congratulations!</strong> <?= session()->getFlashdata('success'); ?> <strong>Please Login</strong>
                                    </div>
                                <?php } ?>
                                <?php if (session()->getFlashdata('error')) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> <?= session()->getFlashdata('error'); ?>
                                    </div>
                                <?php } ?>
                                <form action="/userdata" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" value="<?= old('email'); ?>" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter Email Address...">
                                        <div class="invalid-feedback pl-4">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" value="<?= old('password'); ?>" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                        <div class="invalid-feedback pl-4">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('registration'); ?>">Create an Account!</a>
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