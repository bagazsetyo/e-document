<?php 

require __DIR__ . '/../app/Config/DB.php';
$files = glob(__DIR__ . '/migration/*.sql');

foreach ($files as $file) {
    $sql = file_get_contents($file);
    $db = new \Kuliah\ManagementDocument\Config\DB();
    $db->getDb()->exec($sql);

    echo "Migrate $file\n";
}

$seeder = glob(__DIR__ . '/seeder/*.sql');
foreach ($seeder as $file) {
    $sql = file_get_contents($file);
    $db = new \Kuliah\ManagementDocument\Config\DB();
    $db->getDb()->exec($sql);

    echo "Seed $file\n";
}

echo "Migration success\n";