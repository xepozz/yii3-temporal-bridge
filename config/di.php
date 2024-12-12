<?php

declare(strict_types=1);

use Temporal\Client\GRPC\ServiceClient;
use Temporal\Client\GRPC\ServiceClientInterface;
use Temporal\Client\WorkflowClient;
use Temporal\Client\WorkflowClientInterface;
use Temporal\DataConverter\DataConverter;
use Temporal\DataConverter\DataConverterInterface;
use Temporal\Worker\Transport\Goridge;
use Temporal\Worker\Transport\HostConnectionInterface;
use Temporal\Worker\Transport\RoadRunner;
use Temporal\Worker\Transport\RPCConnectionInterface;
use Temporal\WorkerFactory;
use Yiisoft\Definitions\Reference;

/** @var array $params */

return [
    //WorkflowClientInterface::class => fn () => WorkflowClient::create(ServiceClient::create('localhost:7233')),
    //ServiceClient::create($params['xepozz/yii3-temporal-bridge']['host']),
    WorkflowClientInterface::class => [
        'class' => WorkflowClient::class,
        '__construct()' => [
            Reference::to(ServiceClientInterface::class),
        ],
    ],
    ServiceClientInterface::class => fn () => ServiceClient::create($params['xepozz/yii3-temporal-bridge']['host']),


    DataConverterInterface::class => fn () => DataConverter::createDefault(),
    RPCConnectionInterface::class => fn () => Goridge::create(),
    WorkerFactory::class => fn () => WorkerFactory::create(),
    HostConnectionInterface::class => fn () => RoadRunner::create(),

    //'tag@temporal.workflow' => $params['xepozz/yii3-temporal-bridge']['workflow'],
    //'tag@temporal.activity' => $params['xepozz/yii3-temporal-bridge']['activity'],
];
