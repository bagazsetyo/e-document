<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Tambah Pengguna</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="kode_pengguna">Kode Pengguna</label>
                    <input type="text" id="kode_pengguna" name="kode_pengguna" class="form-control" required="" value="" placeholder="Kode Pengguna">
                    <div class="invalid-feedback">
                        Masukkan Kode Pengguna
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required="" value="" placeholder="Nama">
                    <div class="invalid-feedback">
                        Masukkan Nama
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_pengguna_id">Jenis Pengguna</label>
                    <select name="jenis_pengguna_id" id="jenis_pengguna_id" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($jenisPengguna as $key => $value) : ?>
                            <option value="<?= $value->id ?>"><?= $value->jenis_pengguna ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Masukkan Jenis Pengguna
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" required="" value="" placeholder="Email">
                    <div class="invalid-feedback">
                        Masukkan Email
                    </div>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" id="telepon" name="telepon" class="form-control" required="" value="" placeholder="Telepon">
                    <div class="invalid-feedback">
                        Masukkan Telepon
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control" required="" value="" placeholder="Foto">
                    <div class="invalid-feedback">
                        Masukkan Foto
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/master/pengguna') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>