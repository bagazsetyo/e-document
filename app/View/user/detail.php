<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="">
            <div class="card-header">
                <h4>Detail User <?= $user->email ?></h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" readonly class="form-control" required="" value="<?= $user->email ?>" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="username">Nama</label>
                    <input type="text" id="username" name="username" readonly class="form-control" required="" value="<?= $user->name ?>" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="active" readonly class="form-control" required="" value="<?= $user->is_active ? 'Aktif' : 'Tidak Aktif' ?>" placeholder="status">
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/user') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>