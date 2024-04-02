<?php
$params = [];
if (isset($_SERVER['REQUEST_URI'])) {
    $params = $_SERVER['REQUEST_URI'];
    if (isset($params['page'])) {
        unset($params['page']);
    }
}

$fullUrl = $_SERVER['PATH_INFO'];
if (count($params) > 0) {
    $params = http_build_query($params);
    $fullUrl .= '?' . $params . '&';
}else{
    $fullUrl .= '?';
}

// var_dump($data['totalPage'], $data['page']);
$beforePage = $data['page'] - 2;
$afterPage = $data['page'] + 2;
if ($beforePage < 1) {
    $beforePage = 1;
}
if ($afterPage > $data['totalPage']) {
    $afterPage = $data['totalPage'];
}
$pagination = range($beforePage, $afterPage);
?>
<?php if ($data['totalPage'] > 1) : ?>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li class="page-item <?= ($data['page'] <= 1 ? "disabled" : '') ?>">
                    <a class="page-link" 
                        href="<?= $fullUrl . 'page=' . ($data['page'] > 1 ? ($data['page'] - 1) : 1) ?>" tabindex="-1">
                        <i class="fas fa-chevron-left">
                        </i>
                    </a>
                </li>
                <?php foreach ($pagination as $i) : ?>
                    <?php if ($i == $data['page']) : ?>
                        <li class="page-item active">
                            <a class="page-link" 
                                href="<?= $fullUrl . 'page=' . $i ?>">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a class="page-link" 
                                href="<?= $fullUrl . 'page=' . $i ?>">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="page-item <?= ($data['page'] >= $data['totalPage'] ? "disabled" : '') ?>">
                    <a class="page-link" 
                        href="<?= $fullUrl . 'page=' . ($data['page'] < $data['totalPage'] ? ($data['page'] + 1) : $data['totalPage']) ?>">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php endif; ?>