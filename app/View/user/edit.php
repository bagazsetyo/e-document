<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="">
            <div class="card-header">
                <h4>Edit User <?= $user->Email ?></h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" readonly class="form-control" required="" value="<?= $user->Email ?>" placeholder="username">
                    <div class="invalid-feedback">
                        Masukkan username
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
                        <option value="1" <?= $user->Active ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= !$user->Active ? 'selected' : '' ?>>Not Active</option>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan password
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