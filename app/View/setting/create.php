<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="post" novalidate="" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Tambah Pengaturan</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required="" value="" placeholder="Nama">
                    <div class="invalid-feedback">
                        Masukkan Nama
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" id=""></textarea>
                    <div class="invalid-feedback">
                        Masukkan alamat
                    </div>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" required="" value="" placeholder="telepon">
                    <div class="invalid-feedback">
                        Masukkan telepon
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required="" value="" placeholder="Email">
                    <div class="invalid-feedback">
                        Masukkan Email
                    </div>
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control" required="" value="" placeholder="Logo">
                    <div class="invalid-feedback">
                        Masukkan Logo
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= url('/settings') ?>" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>