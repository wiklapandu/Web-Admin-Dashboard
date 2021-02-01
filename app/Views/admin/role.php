<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?php if ($validation->hasError('role')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->getError('role'); ?>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php } ?>
            <a class="btn btn-primary my-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
            <!-- table start -->
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    ?>
                    <?php foreach ($role as $r) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td class="row">
                                <a href="<?= base_url('role/roleaccess'); ?>/<?= $r['id']; ?>" class="btn btn-primary ml-1" type="submit">access</a>
                                <a href="<?= base_url('role/roleedit'); ?>/<?= $r['id']; ?>" class="btn btn-success ml-1">
                                    Edit
                                </a>
                                <form action="<?= base_url('role/roledelete'); ?>" method="post" class="ml-1">
                                    <?= form_hidden('roleId', $r['id']); ?>
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('are you sure to delete this role?')">Delete</button>
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
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModal">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/role/addrole" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="role" id="role" aria-describedby="emailHelp" placeholder="Role name">
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