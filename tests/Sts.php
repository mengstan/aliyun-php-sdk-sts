<?php
/**
 * Created by PhpStorm.
 * User: stan.liu
 * Date: 2018/9/7
 * Time: 10:07
 */

use mengstan\aliyunCore\Profile\DefaultProfile;
use mengstan\aliyunCore\DefaultAcsClient;
use mengstan\aliyunCore\AssumeRoleRequest;

class Sts
{
    protected $accessKeyID ;
    protected $accessKeySecret ;
    protected $roleArn  ;
    protected $tokenExpire ;
    protected $policy ;

    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->accessKeyID = $config['AccessKeyID'];
        $this->accessKeySecret = $config['AccessKeySecret'];
        $this->roleArn = $config['RoleArn'];
        $this->tokenExpire = $config['TokenExpireTime'];
        $this->policy = $config['PolicyFile'];
        define('ENABLE_HTTP_PROXY', false);
    }


    /**
     * 获取oss 授权
     * @return \SimpleXMLElement
     *
     */
    public function actionGetAuth()
    {
        $iClientProfile = DefaultProfile::getProfile("cn-hangzhou", $this->accessKeyID, $this->accessKeySecret);
        $client = new DefaultAcsClient($iClientProfile);
        $request = new AssumeRoleRequest();
        $request->setRoleSessionName("client_name");
        $request->setRoleArn($this->roleArn);
        $request->setPolicy($this->policy);
        $request->setDurationSeconds($this->tokenExpire);
        $response = $client->getAcsResponse($request);
        return $response->Credentials;
    }


    public function actionTest(){

    }


}