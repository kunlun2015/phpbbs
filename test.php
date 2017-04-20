<?php
$arr = array(
        array('name' => 'kunlun', 'age' => 34),
        array('name' => 'amos', 'age' => 12)
    );

var_dump(array_column($arr, 'name'));