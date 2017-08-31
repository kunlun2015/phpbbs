<?php
$encrypt = 'WsSuV3xa';
$password = 'szh7366';
echo hash('sha256', hash('sha256', $password.$encrypt).$encrypt);