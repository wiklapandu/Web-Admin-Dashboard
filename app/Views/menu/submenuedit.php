<?= $this->extend('layout/user/template'); ?>
<?= $this->section('user'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit <?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="/menu/upsubmenu" method="post">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <div class="form-group">
                    <label for="title">Submenu Title</label>
                    <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" name="title" id="title" aria-describedby="emailHelp" placeholder="Submenu title" value="<?= $data['title']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('title'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="menu_id">Menu</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <?php foreach ($submenu as $Sub) { ?>
                            <option value="<?= $Sub['id']; ?>" <?= ($Sub['id'] == $data['menu_id']) ? 'selected' : ''; ?>><?= $Sub['menu']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="url">Submenu Url</label>
                    <input type="text" class="form-control <?= ($validation->hasError('url')) ? 'is-invalid' : ''; ?>" name="url" id="url" aria-describedby="emailHelp" placeholder="Submenu Url" value="<?= $data['url']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('url'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="icon">Submenu Icon</label>
                    <input type="text" class="form-control <?= ($validation->hasError('icon')) ? 'is-invalid' : ''; ?>" name="icon" id="icon" aria-describedby="emailHelp" placeholder="Submenu Icon" value="<?= $data['icon']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('icon'); ?>
                    </div>
                    <small>Icon get from <a href="https://fontawesome.com/">https://fontawesome.com/</a></small>
                </div>
                <div class=" form-group form-check">
                    <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" <?= ($data['is_active'] == 1) ? 'checked' : ''; ?>>
                    <label for="is_active" class="form-check-label">
                        Active?
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Edit" class="btn px-4 btn-success">
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end modal -->
<?= $this->endSection(); ?>