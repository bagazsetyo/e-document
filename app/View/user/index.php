<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data User</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreateUser')): ?>
                        <a href="<?= self::url('create') ?> " class="btn btn-primary">Tambah</a>
                        <?php endif; ?>
                        <?php if(checkPermission('canExportUser')): ?>
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
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td>
                                    <?php if ($value->is_active) : ?>
                                        <div class="badge badge-success">Active</div>
                                    <?php else : ?>
                                        <div class="badge badge-danger">Not Active</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                        button('detail', "/user/$value->id", 'Detail', 'canShowUser');
                                        button('edit', "/user/edit/$value->id", 'Edit', 'canEditUser');
                                        button('delete', "/user/delete/$value->id", 'Delete', 'canDeleteUser');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            pagination($user);
        ?>
    </div>
</div>