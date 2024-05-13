<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Tambah Dokumen</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="no_dokumen">No Dokumen</label>
                    <input type="text" id="no_dokumen" name="no_dokumen" class="form-control" required="" value="" placeholder="No Dokumen">
                    <div class="invalid-feedback">
                        Masukkan No Dokumen
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_kategori_dokumen">Kategori Dokumen</label>
                    <select name="id_kategori_dokumen" id="id_kategori_dokumen" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($kategoriDokumen as $key => $value) : ?>
                            <option value="<?= $value->id ?>"><?= $value->kode ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan Kategori Dokumen
                    </div>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" required="" value="" placeholder="Judul">
                    <div class="invalid-feedback">
                        Masukkan Judul
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                    <div class="invalid-feedback">
                        Masukkan Deskripsi
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_pengguna">Pengguna</label>
                    <select name="id_pengguna" id="id_pengguna" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($pengguna as $key => $value) : ?>
                            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan Pengguna
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/master/dokumen') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>