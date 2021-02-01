<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="role">Role Name</label>
                    <input type="text" name="role" value="<?= $Role['role']; ?>" placeholder="include Role Name" id="role" class="form-control">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        I'm not Robot
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-dark px-3">Edit</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>