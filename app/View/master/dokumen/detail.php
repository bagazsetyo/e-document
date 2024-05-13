<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Detail Dokumen</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="no_dokumen">No Dokumen</label>
                    <input type="text" id="no_dokumen" disabled name="no_dokumen" class="form-control" required="" value="<?= $dokumen->no_dokumen ?>" placeholder="No Dokumen">
                    <div class="invalid-feedback">
                        Masukkan No Dokumen
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_kategori_dokumen">Kategori Dokumen</label>
                    <select disabled name="id_kategori_dokumen" id="id_kategori_dokumen" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($kategoriDokumen as $key => $value) : ?>
                            <option value="<?= $value->id ?>" <?= $dokumen->id_kategori_dokumen == $value->id ? 'SELECTED' : '' ?>><?= $value->kode ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan Kategori Dokumen
                    </div>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" disabled name="judul" class="form-control" required="" value="<?= $dokumen->judul ?>" placeholder="Judul">
                    <div class="invalid-feedback">
                        Masukkan Judul
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea disabled name="deskripsi" class="form-control" id="deskripsi"><?= $dokumen->deskripsi ?></textarea>
                    <div class="invalid-feedback">
                        Masukkan Deskripsi
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_pengguna">Pengguna</label>
                    <select disabled name="id_pengguna" id="id_pengguna" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($pengguna as $key => $value) : ?>
                            <option value="<?= $value->id ?>" <?= $dokumen->id_pengguna == $value->id ? 'SELECTED' : '' ?>><?= $value->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan Pengguna
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/master/dokumen') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>