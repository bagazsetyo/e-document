<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data User</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreateRole')): ?>
                        <a href="<?= self::url('create') ?> " class="btn btn-primary">Tambah</a>
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
            <div class="table-responsive" style="word-break: break-all;">
                <table class="table table-bordered table-md">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th width="60%">Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($role['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->nama; ?></td>
                                <td><?php echo $value->permission; ?></td>
                                <td>
                                    <?php
                                    button('edit', "/role/edit/$value->id", 'Edit', 'canEditRole');
                                    button('delete', "/role/delete/$value->id", 'Delete', 'canDeleteRole');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            pagination($role);
        ?>
    </div>
</div>