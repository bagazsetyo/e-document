
<link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
<div class="card">
    <div class="card-body">
        <form class="needs-validation" action="<?= self::url('/master/dokumen/update') ?>" method="post" novalidate="">
            <input type="hidden" name="No_Dokumen" value="<?= $dokumen->No_Dokumen ?>">
            <div class="card-header">
                <h4>Edit Dokumen</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>No Dokumen</label>
                    <input type="text" name="No_Dokumen" disabled class="form-control" required="" value="<?= $dokumen->No_Dokumen ?>" placeholder="email">
                    <div class="invalid-feedback">
                        Masukkan No Dokumen
                    </div>
                </div>
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="Kode" class="form-control" required="" value="<?= $dokumen->Kode ?>" placeholder="email">
                    <div class="invalid-feedback">
                        Masukkan Kode
                    </div>
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="Judul" class="form-control" required="" value="<?= $dokumen->Judul ?>" placeholder="email">
                    <div class="invalid-feedback">
                        Masukkan Judul
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="summernote" name="Deskripsi"><?= $dokumen->Deskripsi ?></textarea>
                    <div class="invalid-feedback">
                        Masukkan Deskripsi
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Pembuatan</label>
                    <input type="date" name="Tanggal_Pembuatan" class="form-control" required="" value="<?= $dokumen->Tanggal_Pembuatan ?>" placeholder="email">
                    <div class="invalid-feedback">
                        Masukkan Tanggal Pembuatan
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Modifikasi</label>
                    <input type="date" name="Tanggal_Modifikasi" class="form-control" required="" value="<?= $dokumen->Tanggal_Modifikasi ?>" placeholder="email">
                    <div class="invalid-feedback">
                        Masukkan Tanggal Modifikasi
                    </div>
                </div>
                <div class="form-group">
                    <label>Kode Pengguna</label>
                    <input type="text" name="Kode_Pengguna" class="form-control" required="" value="<?= $dokumen->Kode_Pengguna ?>" placeholder="email">
                    <div class="invalid-feedback">
                        Masukkan Kode Pengguna
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= self::url('/master/dokumen') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<script src="/assets/modules/summernote/summernote-bs4.js"></script>