<?php
$str = '
{"code":0,"data":{"country":"\u4e2d\u56fd","country_id":"CN","area":"\u534e\u5317","area_id":"100000","region":"\u5317\u4eac\u5e02","region_id":"110000","city":"\u5317\u4eac\u5e02","city_id":"110100","county":"","county_id":"-1","isp":"\u8054\u901a","isp_id":"100026","ip":"123.123.123.123"}}';

var_dump(json_decode($str));