<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>No Dokumen</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dokumenFile as $key => $value) : ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value->no_dokumen; ?></td>
                <td>
                    <?= $value->file ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>