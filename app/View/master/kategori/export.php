
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kategori as $key => $value) : ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value->kode; ?></td>
                <td><?php echo $value->kategori; ?></td>
                <td><?php echo $value->keterangan; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>