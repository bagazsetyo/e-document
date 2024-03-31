<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="">
            <div class="card-header">
                <h4>Detail User <?= $user->Email ?></h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" readonly class="form-control" required="" value="<?= $user->Email ?>" placeholder="username">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="active" readonly class="form-control" required="" value="<?= $user->Active ? 'Aktif' : 'Tidak Aktif' ?>" placeholder="status">
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= self::url('/user') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>