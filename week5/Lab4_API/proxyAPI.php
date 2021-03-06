<?php

namespace API\models\services;

include_once './api/v1/models/interfaces/IService.php';
include_once './api/v1/models/helpers/RestProxy.php';

$consumeAPI = new RestProxy();

$key = 'test';
$auth = $key.':';

$method = $consumeAPI->getHTTPVerb();
$data = $consumeAPI->getHTTPData();

$url = $consumeAPI->endpoint('http://localhost:8080/PHPadvClassSpring2015/week5/Lab4_API/api/v1');

$consumeAPI->callAPI($method, $url, $data, $auth);

//http://www.restapitutorial.com/
//http://blog.mwaysolutions.com/2014/06/05/10-best-practices-for-better-restful-api/

