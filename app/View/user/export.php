<table class="table">
    <thead class="">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user as $key => $value) : ?>
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
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>