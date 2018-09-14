<?php
return [
    'oss' => [
        "AccessKeyID" => "LTAIaxpeD3g5xFlI",
        "AccessKeySecret" => "zIxplKDXauQO6qnCm1cx6opdqLkas3",
        "RoleArn" => "acs:ram::1027837956353567:role/aliyunosstokengeneratorrole",
        "BucketName" => "realmax",
        "Endpoint" => "oss-cn-shanghai.aliyuncs.com",
        "TokenExpireTime" => "3600",
        "PolicyFile" => '{ "Version": "1", "Statement": [ { "Action": "oss:*", "Resource": "%s", "Effect": "Allow" } ] }'
    ]
];