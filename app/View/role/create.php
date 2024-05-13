<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Tambah User</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required="" value="" placeholder="Nama">
                    <div class="invalid-feedback">
                        Masukkan Nama
                    </div>
                </div>
                <div class="">
                    <label>Permission</label>
                    <br>
                    <div class="row">
                        <?php foreach ($permissions as $key => $permission) : ?>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $key ?>" name="permissions[]" value="<?= $permission->id ?>">
                                    <label class="form-check-label" for="inlineCheckbox<?= $key ?>"><?= $permission->nama ?></label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/user') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>