<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Pengguna</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreatePengguna')): ?>
                        <a href="<?= url('create') ?> " class="btn btn-primary">Tambah</a>
                        <?php endif; ?>
                        <?php if(checkPermission('canExportPengguna')): ?>
                        <a href="<?= self::url('export') ?> " class="btn btn-primary" target="_blank">Cetak</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Pengguna</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pengguna['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->nama; ?></td>
                                <td><?php echo $value->jenis_pengguna; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->telepon; ?></td>
                                <td>
                                    <img src="<?= $value->foto ?>" alt="" style="width: 100px;">
                                </td>
                                <td>
                                    <?php 
                                        button('detail', "/master/pengguna/$value->id", 'Detail', 'canShowPengguna');
                                        button('edit', "/master/pengguna/edit/$value->id", 'Edit', 'canEditPengguna');
                                        button('delete', "/master/pengguna/delete/$value->id", 'Delete', 'canDeletePengguna');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
            pagination($pengguna);
        ?>
    </div>
</div>