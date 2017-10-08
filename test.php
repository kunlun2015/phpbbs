<?php
/**
 * 一维数组按字母分组
 * @param array $arr
 * @return array 
 */
function areaListGroupByLetters($arr = []){
    $county = $county ? $county : [];
    $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];        
    foreach ($letters as $k => $v) {
        $charterAreaList = [];
        foreach ($arr as $k2 => $v2) {
            if($this->get_first_charter($v2) === $v){
                array_push($charterAreaList, $v2);
            }
        }
        $county[$v] = $charterAreaList;
    }
    $county = array_filter($county);
    return $county;
}