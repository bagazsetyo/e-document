<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Log</h4>
        </div>
        <div class="card-body">
            <div class="card-header">
                <div class="w-100 d-flex justify-content-between">
                    <div>
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
                            <th>User</th>
                            <th>Ip Address</th>
                            <th>Time</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($log['data'] as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->ip_address; ?></td>
                                <td><?php echo $value->time; ?></td>
                                <td><?php echo $value->information; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
            pagination($log);
        ?>
    </div>
</div>