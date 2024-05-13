<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Dokumen</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreateDokumen')): ?>
                        <a href="<?= self::url('create') ?> " class="btn btn-primary">Tambah</a>
                        <?php endif; ?>
                        <?php if(checkPermission('canExportDokumen')): ?>
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
                            <th>No Dokumen</th>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Pembuatan</th>
                            <th>Modifikasi</th>
                            <th>Kode Pengguna</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dokumen['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->no_dokumen; ?></td>
                                <td><?php echo $value->kode; ?></td>
                                <td><?php echo $value->judul; ?></td>
                                <td><?php echo $value->deskripsi; ?></td>
                                <td><?php echo $value->created_at; ?></td>
                                <td><?php echo $value->updated_at; ?></td>
                                <td><?php echo $value->kode_pengguna; ?></td>
                                <td>
                                    <?php 
                                        button('detail', "/master/dokumen/$value->id", 'Detail', 'canShowDokumen');
                                        button('edit', "/master/dokumen/edit/$value->id", 'Edit', 'canEditDokumen');
                                        button('delete', "/master/dokumen/delete/$value->id", 'Delete', 'canDeleteDokumen');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
            pagination($dokumen);
        ?>
    </div>
</div>