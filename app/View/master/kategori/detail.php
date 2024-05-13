<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Detail Kategori</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" id="kode" readonly name="kode" class="form-control" required="" value="<?= $kategori->kode ?>" placeholder="Kode">
                    <div class="invalid-feedback">
                        Masukkan Kode
                    </div>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" readonly name="kategori" class="form-control" required="" value="<?= $kategori->kategori ?>" placeholder="Kategori">
                    <div class="invalid-feedback">
                        Masukkan Kategori
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea readonly name="keterangan" class="form-control" id="Keterangan"><?= $kategori->keterangan ?></textarea>
                    <div class="invalid-feedback">
                        Masukkan Keterangan
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/master/kategori') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>