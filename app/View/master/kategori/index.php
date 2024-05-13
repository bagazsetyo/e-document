<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Kategori</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreateKategori')): ?>
                        <a href="<?= self::url('create') ?> " class="btn btn-primary">Tambah</a>
                        <?php endif; ?>
                        <?php if(checkPermission('canExportKategori')): ?>
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
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->kode; ?></td>
                                <td><?php echo $value->kategori; ?></td>
                                <td><?php echo $value->keterangan; ?></td>
                                <td>
                                    <?php
                                        button('detail', "/master/kategori/$value->id", 'Detail', 'canShowKategori');
                                        button('edit', "/master/kategori/edit/$value->id", 'Edit', 'canEditKategori');
                                        button('delete', "/master/kategori/delete/$value->id", 'Delete', 'canDeleteKategori');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php  
            pagination($kategori);
        ?>
    </div>
</div>