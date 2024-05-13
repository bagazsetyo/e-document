<table class="table">
    <thead class="">
        <tr>
            <th>No</th>
            <th>Jenis Pengguna</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($jenisPengguna as $key => $value) : ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value->jenis_pengguna; ?></td>
                <td><?php echo $value->keterangan; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>