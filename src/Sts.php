<?php
/**
 * Created by PhpStorm.
 * User: stan.liu
 * Date: 2018/9/14
 * Time: 11:13
 */

namespace mengstan\aliyunSts;
use mengstan\aliyunCore\Profile\DefaultProfile;

class Sts extends AssumeRoleRequest
{
    public $client;

    public function __construct($config)
    {
        parent::__construct();
        $this->setRoleArn($config['roleArn']);
        $this->setPolicy($config['policy']);
        $this->setRoleSessionName("client_name");
        $this->setDurationSeconds($config['tokenExpire']);
        // 初始化用户Profile实例
        $ClientProfile = DefaultProfile::getProfile("cn-hangzhou",$config['accessKeyId'], $config['accessKeySecret']);
        // 初始化AcsClient用于发起请求
        $this->client = new DefaultAcsClient($ClientProfile);
    }
}