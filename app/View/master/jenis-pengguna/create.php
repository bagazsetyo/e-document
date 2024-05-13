<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Tambah Jenis Pengguna</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="jenis_pengguna">Jenis Pengguna</label>
                    <input type="text" id="jenis_pengguna" name="jenis_pengguna" class="form-control" required="" value="" placeholder="Jenis Pengguna">
                    <div class="invalid-feedback">
                        Masukkan Jenis Pengguna
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="Keterangan"></textarea>
                    <div class="invalid-feedback">
                        Masukkan Keterangan
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/master/jenis-pengguna') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>