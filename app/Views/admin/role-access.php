<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <h4><?= $role['role']; ?></h4>
            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php } ?>
            <!-- table start -->
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    ?>
                    <?php foreach ($menu as $m) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- end table -->
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>