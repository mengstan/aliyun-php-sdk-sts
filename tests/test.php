<?php
/**
 * Created by PhpStorm.
 * User: stan.liu
 * Date: 2018/9/13
 * Time: 17:26
 */

ini_set('display_errors', true);

$config = include 'config.php';
include './Sts.php';
require_once __DIR__ . '/..//vendor/autoload.php';
$sts = new Sts($config['oss']);
$token = $sts->actionGetAuth();

var_dump($token);