<?php if ($type == 'detail') : ?>
    <a href="<?= $url ?>" class="btn btn-secondary"><?= $lable ?></a>
<?php elseif ($type == 'edit') : ?>
    <a href="<?= $url ?>" class="btn btn-primary"><?= $lable ?></a>
<?php elseif ($type == 'delete') : ?>
    <form action="<?= $url ?>" method="post" style="display: inline;">
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-danger"><?= $lable ?></button>
    </form>
<?php endif; ?>