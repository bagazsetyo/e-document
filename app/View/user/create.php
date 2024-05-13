<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="">
            <div class="card-header">
                <h4>Tambah User</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required="" value="" placeholder="email">
                    <div class="invalid-feedback">
                        Masukkan email
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required="" value="" placeholder="Nama">
                    <div class="invalid-feedback">
                        Masukkan Nama
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="*****">
                    <div class="invalid-feedback">
                        Masukkan password
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="active">
                        <option value="1" >Active</option>
                        <option value="0" >Not Active</option>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan password
                    </div>
                </div>
                <div class="">
                    <label>Role</label>
                    <br>
                    <div class="row">
                        <?php foreach ($allRole as $key => $r) : ?>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $key ?>" name="roles[]" value="<?= $r->id ?>">
                                    <label class="form-check-label" for="inlineCheckbox<?= $key ?>"><?= $r->nama ?></label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= self::url('/user') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>