<table class="table">

    <thead>
        <tr>
            <th>No</th>
            <th>No Dokumen</th>
            <th>Kode</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Pembuatan</th>
            <th>Modifikasi</th>
            <th>Kode Pengguna</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dokumen as $key => $value) : ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value->no_dokumen; ?></td>
                <td><?php echo $value->kode; ?></td>
                <td><?php echo $value->judul; ?></td>
                <td><?php echo $value->deskripsi; ?></td>
                <td><?php echo $value->created_at; ?></td>
                <td><?php echo $value->updated_at; ?></td>
                <td><?php echo $value->kode_pengguna; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>