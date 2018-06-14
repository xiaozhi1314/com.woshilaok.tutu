<?php
//配置文件
return [
    'authentication_skip_module'        => [
        'index',
        'admin'
    ],  // 需要跳过验证的模块
    'authentication_skip_action'        => [
        'index',
        'apiTest',
        'apiLogin',
        'apiGetPassword',
        'apiGetClubInviteInfo',
        'apiWxPayNotify',               // 微信支付通知
        'apiAliPayNotify',              // 支付宝支付通知
        'apiWxSmallProgramPayNotify',   // 微信小程序支付通知
        'apiGetWxUserInfo',             // 微信公众号用户信息获取
    ],  // 需要跳过的action（方法）

    // 用户默认头像
    'default_portrait'  => 'http://apid.touzd.cn/static/images/default_portrait.png',

    // 验证码配置
    // 'verify_code_length'                => 6,       // 验证码长度
    // 'verify_code_expirationtime'        => 1000,    // 验证码有效时间：默认10分钟
    // 'third_party_sms'       => [
    //     'appkey'        => '85725814b0655ca0025d39964dfb20d9',
    //     'appsecret'     => '',
    //     'sendurl'       => 'http://v.juhe.cn/sms/send',
    //     'tplid'         => [
    //         'sendregister'  => '55691',
    //         'sendforget'    => '55691',
    //         'sendlogin'     => '55691',
    //     ]
    // ],
    // 第三方支付配置
    'third_party_pay'   => [
        'weixin' => [
            'merchants'  => ['appid' => '1500604541', 'secret' => 'YySlJ1NJhImsF03axW2ewWX88sichdUj'],
            'typelist'   => ['xiaochengxu', 'weike', 'zhidaofuwuhao'],
            'list' => [
                [ 'type' => 'xiaochengxu','appid' => 'wx511dabedfaac64ec','secret' => 'c498777a6ba702ce204a81c97ad414ba', 
                  'tradetype' => 'JSAPI', 'notifyurl' => 'https://apid.touzd.cn/v1/sc/apiScWxSmallProgramPayNotify', 'cbfun' => 'getWxZdPayOrderInfo'],
            ],
        ],
        'alipay' => [
            'merchants'  => ['appid' => '2017101709355770', 
                'publickey'  => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEArfh9pHHTkQfiAsZflNpnoibbBaKJf52gsklFp4Lcc/UCnJG+f14CbMxZlhFfT/oPHG+8gMi2t0dxGNGLKCyWe6My/vICvOoobD8zT4584aaSeMdR4EdppFySSIeua3IT6NXSQNJJisXJ4FsdWTjgJRRyLlIvojTrPsPk/+/Ep3TEJrNn/AGiJ6fLY62mTKpbAMM5mqMGoKLZOZ0gmUvb7OR4CdU+PmeJ8q3v8+J9qo5Uxif1VuWapBbGMq7n2pVvfo92i4lMlZuwSUieLxK6/r/uMtJwA0DF4a5SZPtaDKbrOz4HfRLbbqWzVxzezY83gRaTaIkUeJZUm0td7IHGfQIDAQAB',
                'privatekey' => 'MIIEowIBAAKCAQEAqxtlwHV1VTGw1ZaWVowMh+fxB4wNv9zs/U2+AbfGxAug8KamqTrEq/fAsKCwwIFHg8xngL5F6rG0zgKxwXEn7vJgSlPUVjLTkeEnAFliQ3+hWRT/7YdhSiHgSXwvEePDTSyZFcfhYwzM/QEuSBPxxOt8PGIIz7W+XshpGwpk0LGmz0buetoptpLNcb/3/ohh3dVoEAs0iaIRl690ot8EnkXkWK4v9IrXKVvQ2raQwVrSzGwDrzL2iZ1Tv18TtHr/6s79OiNFb6aaMpnZSc6MetkEDH5lMIjm+A0Dw2nzPovtH7Kop6vAyrUgiPdhzZEUplaIhA5voJPeKg9p01GcRQIDAQABAoIBAE28Prf3JP01fA8tQNPFAJRl7XzuRfjal9hkj2QcZ/L9DXsHW0Qa7OrrveEAwAxVL3ZTUNqOlxkO7wOA+dzWWbwW5WQfPaKDqNbnoV5pPVlJDLZ58eOp06toRIteHcxU24+eKVZZ3q2vTRnMhYg9d2NtUJ3mM/aZrQlGp2mfiTm+HVCWKnJ0KvTWLR8czW5mY7YoKq7Qu+HXcu/vH38L4csWBl5gWHy96BoJcMHRhFavedlXbqVxg+lhdoRTBWJ7trqnpQkiUR9i50MhOds6VHzyH6IETAcGnCSwNPLT27tJ4r/rFPvnry7ESR2XKYebTNRh9XsHKvxw50VW+9vgOWkCgYEA4NAzcilB/b09DkFmGj+DOhxVnYY+3d5J1fjQLL6jH6qNbcagjcR6mIgLVaWjP7g5MWo6Dt7Sfe3yItg264uRLjyUZEkimD8T8rPnvXRF+O85/LaP7DG8WXxTFcFrCDMzR7c48WDbmXFh2wgivVugfNmhvD8baFTVuN3JE5cHCJcCgYEAwtfswDijLrMUJMXj06RDrgTozRv4lBJxEyD6a91TkPmAAz/QmMWmYKUMxeEwon4MzRtEVtMpRt5ybV3dxMC2Se42eRZbvtXqCjNseQifMRpymxn8c+k6wM2GkViAww2i/CooZ4vm1+YHfSJRX8G9hDdDrrNX6yYnHSUVGAMhYYMCgYBdBEgE+CUhw2a7uztvqM+2/3o9Dwp76jlKmwQnP0lnFL4nqYNMpPrEmaV27m25M5QWaglTlcYp7IW+/Q7cLocHRnFvfQMfUxoB1YYQ0UcSVIj9ktvBsmJn9BS8b6bFYcnZ5mldFeJGfq8qXRdimcKxZaqRpNrGNDOppbpIrLhwSQKBgQCGYYXXzTg+rSPneNR404IaMyiczf3ToiR6nPQaELvh8TJpC0pDE458eVkl4Po6F9WcYIHxoBGH30PsSiD54i/XLYREXzdHlyGjh3P4xgmFREhm0LVc/C6Zaya0d+XWoUEXybu0Lrk3jl773v9gm66p0bPMecTZWacAYuL5fK85IQKBgCBHmNN5QkadBs0IH4a4x9iNv92QlwB9fQh+neiGD8dSkjB5fhJIWz1a/uvx9oz/ZoyH1/VBKgXRfIK6kPvdMIS/K2DZmcZukq0A5bFsgDxgKKrFt3qzFippGhymnfgFQ2yAIw5GnW+wQ5+zSBhqzt3NbnCPyOah6YjEmClmVCrh', 
                'format'     => 'json',
                'characet'   => 'UTF-8',
                'signtype'   => 'RSA2',
                'notifyurl'  => 'https://apid.touzd.cn/api/v2/apiAliPayNotify',
                'timeout'    => '30m', // 支付超时时间
                'body'       => '值道产品购买支付',
                'appscheme'  => 'alisdkzhiDao',
            ],
        ]
    ],
    // 微信公众号配置
    'third_party_wx_mp' => [
        ['type' => 'zhidao', 'appid' => 'wx511dabedfaac64ec', 'secret' => 'c498777a6ba702ce204a81c97ad414ba', 'redirect_uri' => ''],
        ['type' => 'zhidaofuwuhao',  'appid' => 'wx7efd372041ed4511', 'secret' => 'ec25434f275948db862c20f8ee366919', 'redirect_uri' => '']
    ],
    'third_party_wx_sc_shareqrcode' => [
        'ext'           => '.jpeg',
        'upload_path'   => ROOT_PATH . '/public/qrcode/',
        'relative_path' => 'qrcode/',
        'domain_host'   => 'https://apid.touzd.cn/'
    ],
    // 微课微信小程序服务通知
    'third_party_wx_sc_service_notify' => [
        [
            'type'       => 'earning',
            'page'       => 'pages/myReward/myReward',
            'templateid' => 'CmmKUG3mPF7XZ8xqvsESzM_j7v65IWCEkEJ8s-wTCDs',
        ],
        [
            'type'       => 'buycourse',
            'page'       => 'pages/myClass/myClass',
            'templateid' => '8CWAvKRC1EsmWC6G-0nJNrlIE7F5PqxPYqQ7AR1DTTc',
        ]
    ],
    // 微课微信小程序配置信息
    'third_party_wx_sc_infomation' => [
        'course_title'      => '在线课堂',
        'live_title'        => '直播',
        'distributiontitle' => '分享赚取PRICE元助力基金',
        'h5redirecturi'     => 'http://h5.touzd.cn/scIndex.html?sharecode=SHARECODE',
        'h5shareurl'        => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx7efd372041ed4511&redirect_uri=H5REDIRECTURI&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect',
        'share_title'       => '值道一下，带领千万人踏入财商专圈',
    ],
    // 第三方推送
    'third_party_push'  => [
        'appid' => '976845ca635d5045fe4521bf', 'secret' => '0da5fafd9332e2ed3d373465'
    ],
    // 上传配置
    'upload_file'           => [
        'upload_path'   => ROOT_PATH . '/public/uploads/',
        'relative_path' => 'uploads/',
        'domain_host'   => 'https://apid.touzd.cn/'
    ],
];