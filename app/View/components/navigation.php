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

?>
<?php if ($user['totalPage'] > 1) : ?>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li class="page-item <?= ($user['page'] <= 1 ? "disabled" : '') ?>">
                    <a class="page-link" 
                        href="<?= $fullUrl . 'page=' . ($user['page'] > 1 ? ($user['page'] - 1) : 1) ?>" tabindex="-1">
                        <i class="fas fa-chevron-left">
                        </i>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $user['totalPage']; $i++) : ?>
                    <?php if ($i == $user['page']) : ?>
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
                <?php endfor; ?>
                <li class="page-item <?= ($user['page'] >= $user['totalPage'] ? "disabled" : '') ?>">
                    <a class="page-link" 
                        href="<?= $fullUrl . 'page=' . ($user['page'] < $user['totalPage'] ? ($user['page'] + 1) : $user['totalPage']) ?>">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php endif; ?>