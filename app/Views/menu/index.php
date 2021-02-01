<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?php if ($validation->hasError('menu')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->getError('menu'); ?>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-primary my-3" data-toggle="modal" data-target="#menuModal">Add New Menu</a>
            <!-- table start -->
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Menu as $mn) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $mn['menu']; ?></td>
                            <td class="row">
                                <form action="<?= base_url('menu/edit'); ?>" method="post">
                                    <?= form_hidden('id', $mn['id']); ?>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </form>
                                <form action="<?= base_url('menu/delete'); ?>" method="post" class="ml-2">
                                    <?= form_hidden('id', $mn['id']); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this menu?')">Delete</button>
                                </form>
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

<!-- start modal -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/menu/addmenu" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="menu" id="menu" aria-describedby="emailHelp" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->
<?= $this->endSection(); ?>