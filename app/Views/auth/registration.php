<?= $this->extend('layout/template'); ?>
<?= $this->section('auth'); ?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="/userdata/registrasi" method="post">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control form-control-user <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Full name" value="<?= old('name'); ?>">
                                <div class="invalid-feedback pl-4">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email Address" value="<?= old('email'); ?>">
                                <div class="invalid-feedback pl-4">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password">
                                    <div class="invalid-feedback pl-4">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
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
<?= $this->endSection(); ?>