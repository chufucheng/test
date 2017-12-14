<?php
	//九九乘法表
echo '<a href="index.php">返回</a><br/>';
    function arr($num)
    {
        $a = '';
        for ($i = 1; $i <= $num; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                $a .= $j . 'X' . $i . '=' . ($i * $j) . ' ';
                if ($j == $i) {
                    $a.= '<br>';
                }
            }
        }
        return $a;
    }
    echo arr(9);
?>