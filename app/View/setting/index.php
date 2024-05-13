<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Pengaturan</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <?php if(checkPermission('canCreateSetting')): ?>
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
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($setting['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->nama; ?></td>
                                <td><?php echo $value->alamat; ?></td>
                                <td><?php echo $value->telepon; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td>
                                    <img src="<?= $value->logo ?>" alt="" style="width: 100px;">
                                </td>
                                <td>
                                    <?php
                                    button('edit', "/settings/edit/$value->id", 'Edit', 'canEditSetting');
                                    button('delete', "/settings/delete/$value->id", 'Delete', 'canDeleteSetting');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            pagination($setting);
        ?>
    </div>
</div>