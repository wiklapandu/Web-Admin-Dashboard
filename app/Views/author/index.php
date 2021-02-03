<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <?= $pager->links('user', 'pager_satu'); ?>
                </div>
                <div class="col">
                    <form action="" method="get" class="row">
                        <input type="number" name="pages" id="pages" class="col-3" placeholder="10">
                        <div class="col">
                            <button type="submit" class="btn btn-dark">Set</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col">Activation</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    ?>
                    <?php foreach ($User as $Us) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i += 1; ?>
                            </th>
                            <td>
                                <img src="<?= base_url('/img/profile'); ?>/<?= $Us['image']; ?>" class="img-thumbnail">
                            </td>
                            <td>
                                <?= $Us['name']; ?>
                            </td>
                            <td><?= $Us['email']; ?></td>
                            <td>
                                <?php foreach ($role as $rle) : ?>
                                    <?php if ($rle['id'] == $Us['role_id']) { ?>
                                        <?= $rle['role']; ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </td>
                            <td style="font-size: 10px;">
                                <?= $Us['created_at']; ?>
                            </td>
                            <td>
                                <?php if ($Us['it_active'] == 1) : ?>
                                    Active
                                <?php elseif ($Us['it_active'] == 0) : ?>
                                    Non Active
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('/author/detail'); ?>/<?= $Us['id']; ?>" class="btn btn-outline-dark">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>