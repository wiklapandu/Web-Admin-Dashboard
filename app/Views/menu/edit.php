<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <form action="/menu/upmenu/<?= $menu['id']; ?>" method="POST">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="text" name="menu" id="menu" class="form-control <?= ($validation->hasError('menu')) ? 'is-invalid' : ''; ?>" value="<?= $menu['menu']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('menu'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <input type="submit" value="Edit" class="btn btn-success">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="notRobot" value="true" id="checkbox">
                    <label class="custom-control-label" for="checkbox">I'm not Robot</label>
                    <?php if (session()->getFlashdata('textEr')) : ?>
                        <p class="text-danger"><?= session()->getFlashdata('textEr'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
    <!-- /.container-fluid -->
</div>
<?= $this->endSection(); ?>