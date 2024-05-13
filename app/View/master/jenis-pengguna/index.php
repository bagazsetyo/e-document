<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Jenis Pengguna</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreateJenisPengguna')): ?>
                        <a href="<?= url('create') ?> " class="btn btn-primary">Tambah</a>
                        <?php endif; ?>
                        <?php if(checkPermission('canExportJenisPengguna')): ?>
                        <a href="<?= url('export') ?> " class="btn btn-primary" target="_blank">Cetak</a>
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
                            <th>Jenis Pengguna</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jenisPengguna['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->jenis_pengguna; ?></td>
                                <td><?php echo $value->keterangan; ?></td>
                                <td>
                                    <?php 
                                        button('detail', "/master/jenis-pengguna/$value->id", 'Detail', 'canShowJenisPengguna');
                                        button('edit', "/master/jenis-pengguna/edit/$value->id", 'Edit', 'canEditJenisPengguna');
                                        button('delete', "/master/jenis-pengguna/delete/$value->id", 'Delete', 'canDeleteJenisPengguna');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
            pagination($jenisPengguna);
        ?>
    </div>
</div>