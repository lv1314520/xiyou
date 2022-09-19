<?php

$iniFile = new iniFile('__PHB15_INI__', true);
$iniFile->addItem('排行榜名字',['初始' => 123]);
$iniFile->addItem('排行榜值1',['初始' => 0]);
$iniFile->addItem('排行榜值2',['初始' => 0]);
$iniFile->addItem('排行榜值3',['初始' => 0]);
$iniFile->addItem('排行榜值4',['初始' => 0]);

$db = DB::instance();
$phb1_data = $db->select('all_hdph03', ['id', 'wjid', 'wjmz', 'vip', 'ds01'], [
    'ORDER' => ['ds01' => 'DESC'],
    'LIMIT' => 10,
]);
foreach ($phb1_data as $row) {
    $iniFile->addCategory('排行榜名字', [$row['id']=> $row['wjmz']]);
    $iniFile->addCategory('排行榜值1', [$row['id']=> $row['wjid']]);
    $iniFile->addCategory('排行榜值2', [$row['id']=> $row['ds01']]);
    $iniFile->addCategory('排行榜值3', [$row['id']=> $row['vip']]);
    $iniFile->addCategory('排行榜值4', [$row['id']=> $row['id']]);
}