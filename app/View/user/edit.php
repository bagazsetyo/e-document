<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="">
            <div class="card-header">
                <h4>Edit User <?= $user->email ?></h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" readonly class="form-control" required="" value="<?= $user->email ?>" placeholder="username">
                    <div class="invalid-feedback">
                        Masukkan username
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Nama</label>
                    <input type="text" id="username" name="name" class="form-control" required="" value="<?= $user->name ?>" placeholder="username">
                    <div class="invalid-feedback">
                        Masukkan nama
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="*****">
                    <div class="invalid-feedback">
                        Masukkan password
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="active">
                        <option value="1" <?= $user->is_active ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= !$user->is_active ? 'selected' : '' ?>>Not Active</option>
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
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $key ?>" name="roles[]" value="<?= $r->id ?>" <?= in_array($r->id, $role) ? 'CHECKED' : '' ?>>
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