<?php
/**
 * Created by PhpStorm.
 * User: cpx
 * Date: 2017/12/14
 * Time: 11:15
 */
echo '<a href="index.php">返回</a><br/>';
/*
 * 选择排序
 * 在要排序的一组数中，选出最小的一个数与第一个位置的数交换。然后在剩下的数当中再找最小的与第二个位置的数交换，
 * 如此循环到倒数第二个数和最后一个数比较为止。
 */
function chooseSort($arr)
{
	$length = count($arr);
	if($length == 0){
		return '数组不能为空!';
	}
	for($i=0; $i<$length-1; $i++) {
		//先假设最小的值的位置
		$p = $i;
		for($j=$i+1; $j<$length; $j++) {
			//$arr[$p] 是当前已知的最小值
			if($arr[$p] > $arr[$j]) {
				//比较，发现更小的,记录下最小值的位置；并且在下次比较时采用已知的最小值进行比较。
				$p = $j;
			}
		}
		//已经确定了当前的最小值的位置，保存到$p中。如果发现最小值的位置与当前假设的位置$i不同，则位置互换即可。
		if($p != $i) {
			$tmp = $arr[$p];
			$arr[$p] = $arr[$i];
			$arr[$i] = $tmp;
		}
	}
	//返回最终结果
	return $arr;
}
$arr = [1,32,5,123,32,456,32,734,2,6324,54,6,3435,77,23,5,8];
$result = chooseSort($arr);
print_r($result);