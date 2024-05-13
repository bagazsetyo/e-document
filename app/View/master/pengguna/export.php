<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Pengguna</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($pengguna as $key => $value) : ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value->nama; ?></td>
                <td><?php echo $value->jenis_pengguna; ?></td>
                <td><?php echo $value->email; ?></td>
                <td><?php echo $value->telepon; ?></td>
                <td>
                    <img src="<?= $value->foto ?>" alt="" style="width: 100px;">
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>