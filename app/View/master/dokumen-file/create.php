<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Tambah File Dokumen</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="dokumen_id">No Dokumen</label>
                    <select name="dokumen_id" id="dokumen_id" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($dokumen as $key => $value) : ?>
                            <option value="<?= $value->id ?>"><?= $value->no_dokumen ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan No Dokumen
                    </div>
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" id="file" name="file" class="form-control" required="" value="" placeholder="File">
                    <div class="invalid-feedback">
                        Masukkan File
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/master/dokumen-file') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>