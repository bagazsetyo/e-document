<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data User</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreateDokumenFile')): ?>
                        <a href="<?= self::url('create') ?> " class="btn btn-primary">Tambah</a>
                        <?php endif; ?>
                        <?php if(checkPermission('canExportDokumenFile')): ?>
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
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dokumenFile['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->no_dokumen; ?></td>
                                <td>
                                    <a href="<?= url($value->file) ?>" class="" target="_blank">Download</a>
                                </td>
                                <td>
                                    <?php
                                    button('detail', "/master/dokumen-file/$value->id", 'Detail', 'canShowDokumenFile');
                                    button('edit', "/master/dokumen-file/edit/$value->id", 'Edit', 'canEditDokumenFile');
                                    button('delete', "/master/dokumen-file/delete/$value->id", 'Delete', 'canDeleteDokumenFile');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
            self::include('navigation', $dokumenFile);
        ?>
    </div>
</div>