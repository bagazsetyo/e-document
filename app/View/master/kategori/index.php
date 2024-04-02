<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data User</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <a href="<?= self::url('create') ?> " class="btn btn-primary">Tambah</a>
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
                                <td><?php echo $value->Kode; ?></td>
                                <td><?php echo $value->Kategori; ?></td>
                                <td><?php echo $value->Keterangan; ?></td>
                                <td>
                                    <a href="<?= self::url($value->Kode) ?>" class="btn btn-secondary">Detail</a>
                                    <a href="<?= self::url('edit/' . $value->Kode) ?>" class="btn btn-primary">Edit</a>
                                    <form action="<?= self::url('delete/' . $value->Kode) ?>" method="post" style="display: inline;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php  
            self::include('navigation', $kategori);
        ?>
    </div>
</div>