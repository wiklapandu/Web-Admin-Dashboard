<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="row flex-wrap">
                <div class="col-lg-3">
                    <?= $pager->links('user', 'pager_satu'); ?>
                </div>
                <form action="" method="GET" class="col-lg mb-3">
                    <div class="row author">
                        <div class="col-5">
                            <input class="form-control mr-sm-2" type="search" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : ''; ?>" id="keyword" name="keyword" placeholder="Search by name" aria-label="Search">
                        </div>
                        <div class="col-md-2 col-3">
                            <input type="number" name="pages" id="pages" value="<?= (isset($_GET['pages'])) ? $_GET['pages'] : '10'; ?>" class="form-control">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-dark">Search</button>
                            <a href="<?= base_url('author') ?>" class="col-2 ml-1">
                                <i class="fas fa-fw fa-sync-alt"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
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
                    $pages = (isset($_GET['pages'])) ? $_GET['pages'] : 10;
                    $pages_user = (isset($_GET['page_user'])) ? $_GET['page_user'] : 1;
                    $i += ($pages_user * $pages) - $pages;
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