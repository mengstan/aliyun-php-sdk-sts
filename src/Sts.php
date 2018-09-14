<?php
/**
 * Created by PhpStorm.
 * User: stan.liu
 * Date: 2018/9/14
 * Time: 11:13
 */

namespace mengstan\aliyunSts;

use mengstan\aliyunCore\Profile\DefaultProfile;
use mengstan\aliyunCore\DefaultAcsClient;
use yii\base\Component;

class Sts extends Component
{
    public $client;

    public $config;

    private $request;
   
    public function init(){
        // 初始化用户Profile实例
        $ClientProfile = DefaultProfile::getProfile("cn-hangzhou", $this->config['AccessKeyID'], $this->config['AccessKeySecret']);
        // 初始化AcsClient用于发起请求
        $this->client = new DefaultAcsClient($ClientProfile);
        // 初始化请求参数
        $this->request = new AssumeRoleRequest();
        $this->request->setRoleArn($this->config['RoleArn']);
        $this->request->setPolicy($this->config['Policy']);
        $this->request->setRoleSessionName("client_name");
        $this->request->setDurationSeconds($this->config['TokenExpireTime']);
    }

    public function getStsToken()
    {
        return $this->client->getAcsResponse($this->request);
    }
}