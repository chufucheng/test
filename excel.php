<?php
    //载入PHPExcel类文件
//    require_once './PHPExcel-1.8/Classes/PHPExcel.php';
//    //实例化PHPExcel类对象
//    $phpExcel = new PHPExcel();
    //创建PHPExcel写入类
//    $writeExcel = new
    $mysqli = new mysqli();
    $mysqli->connect('localhost','root','','information_schema');

    $tableSql = "SELECT table_name TABLE_NAME FROM INFORMATION_SCHEMA. COLUMNS WHERE table_schema = 'extend'";

    $tableRs = $mysqli->query($tableSql);
    $tableList = [];
    while($tableRow=mysqli_fetch_array($tableRs, MYSQLI_ASSOC)){
        if (!in_array($tableRow['TABLE_NAME'], $tableList)) {
            $tableList[] = $tableRow['TABLE_NAME'];
        }
    }
    foreach($tableList as $tableName) {
        $sql = "SELECT COLUMN_NAME 字段名称,
       COLUMN_COMMENT 中文说明,
       (CASE WHEN column_key = 'PRI' THEN 'PK' ELSE '' END) AS 键别,
       (CASE WHEN is_nullable = 'NO' THEN 'NO' ELSE 'YES' END) AS 是否空,
       COLUMN_TYPE 数据类型类型, CHARACTER_MAXIMUM_LENGTH AS 长度,
       NUMERIC_PRECISION 数字精度,
       NUMERIC_SCALE 小数位数
FROM INFORMATION_SCHEMA. COLUMNS
WHERE table_schema = 'extend' AND table_name " . ' = ' . "'" . $tableName . "'";
//        print_r($sql);die;
        $rs = $mysqli->query($sql);
        echo '表名:' . $tableName . '<br>';
        while($row=mysqli_fetch_array($rs, MYSQLI_ASSOC)){
            print_r($row);
            echo '<br>';
        }
    }

