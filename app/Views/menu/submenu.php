<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-9">
            <span class="text-danger"><?= $validation->listErrors(); ?></span>
            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-primary my-3" data-toggle="modal" data-target="#submenuModal">Add New Submenu</a>
            <!-- table start -->
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Acion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataSubmenu as $mn) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $mn['menu']; ?></td>
                            <td><?= $mn['title']; ?></td>
                            <td>
                                <?= $mn['url']; ?>
                            </td>
                            <td>
                                <i class="<?= $mn['icon']; ?>"></i>
                            </td>
                            <td>
                                <?php if ($mn['is_active'] == 1) { ?>
                                    Active
                                <?php } elseif ($mn['is_active'] == 0) { ?>
                                    Non Active
                                <?php } ?>
                            </td>
                            <td class="row">
                                <form action="<?= base_url('menu/editsubmenu'); ?>" method="post" class="ml-1">
                                    <?= form_hidden('id', $mn['id']); ?>
                                    <button type="submit" class="btn btn-success">
                                        Edit
                                    </button>
                                </form>
                                <form action="<?= base_url('menu/deletesub'); ?>" method="post" class="ml-1">
                                    <?= form_hidden('id', $mn['id']); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you want to delete that submenu?')">
                                        Delete
                                    </button>
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

<!-- start modal tambah -->
<div class="modal fade" id="submenuModal" tabindex="-1" aria-labelledby="submenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submenuModalLabel">New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/menu/addsubmenu" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option selected>Select Menu</option>
                            <?php foreach ($submenu as $Sub) { ?>
                                <option value="<?= $Sub['id']; ?>"><?= $Sub['menu']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" id="url" aria-describedby="emailHelp" placeholder="Submenu Url">
                    </div>
                    <div class="col-auto">
                        <div class="input-group row">
                            <div class="input-group-prepend">
                                <div class="input-group-text">i class = </div>
                            </div>
                            <input type="text" class="form-control" name="icon" id="icon" aria-describedby="emailHelp" placeholder="Submenu Icon">
                        </div>
                    </div>
                    <div class="form-group form-check pt-3">
                        <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" checked>
                        <label for="is_active" class="form-check-label">
                            Active?
                        </label>
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