<?php
/**
 * Created by PhpStorm.
 * User: cpx
 * Date: 2017/12/14
 * Time: 10:32
 */
echo '<a href="index.php">返回</a><br/>';
/*
 * 冒泡排序
 * 在要排序的一组数中，对当前还未排好的序列，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒。
 * 即，每当两相邻的数比较后发现它们的排序与排序要求相反时，就将它们互换。
 */
function bubbleSort($arr = [],$sort = 'sort')
{
	$length = count($arr);
	if($length == 0){
		return '不能传入空数组!';
	}
	$flag = false;//判断排序完成的标识
	for($i = 1; $i < $length; $i++){//循环次数
		if($sort == 'sort'){//正序
			for($k = 0; $k < $length-$i; $k++){
				if($arr[$k] > $arr[$k+1]){//对调位置
					$tmp = $arr[$k];
					$arr[$k] = $arr[$k+1];
					$arr[$k+1] = $tmp;
					$flag = 'true';
				}
			}
		}elseif($sort == 'asort'){//倒序
			for($k = 0; $k < $length-$i; $k++){
				if($arr[$k] < $arr[$k+1]){//对调位置
					$tmp = $arr[$k];
					$arr[$k] = $arr[$k+1];
					$arr[$k+1] = $tmp;
					$flag = 'true';
				}
			}
		}
	}
	if(!$flag){
		return $arr;
	}
	return $arr;
}
$arr = [1,32,5,123,32,456,32,734,2,6324,54,6,3435,77,23,5,8];
$result = bubbleSort($arr,'asort');
echo '<pre>';
print_r($result);