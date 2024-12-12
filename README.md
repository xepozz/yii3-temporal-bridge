# Yii3 Temporal Bridge

Bridge package to use Temporal with Yii3 easily.

[![Latest Stable Version](https://poser.pugx.org/xepozz/yii3-temporal-bridge/v/stable.svg)](https://packagist.org/packages/xepozz/yii3-temporal-bridge)
[![Total Downloads](https://poser.pugx.org/xepozz/yii3-temporal-bridge/downloads.svg)](https://packagist.org/packages/xepozz/yii3-temporal-bridge)
[![phpunit](https://github.com/xepozz/yii3-temporal-bridge/workflows/PHPUnit/badge.svg)](https://github.com/xepozz/yii3-temporal-bridge/actions)
[![codecov](https://codecov.io/gh/xepozz/yii3-temporal-bridge/branch/master/graph/badge.svg?token=UREXAOUHTJ)](https://codecov.io/gh/xepozz/yii3-temporal-bridge)

## Installation

```bash
composer require xepozz/yii3-temporal-bridge
```

## Usage

### Basic concept

Use `yiisoft/classifier` package to automatically register workflows and activities.

Add tag `temporal.workflow` for each new workflow and `temporal.activity` for each new activity.

Example how to configure workflows and activities via tags near the class definition:

```php
return [
    // ...
    \App\Temporal\Workflow\LongWorkflow::class => [
        '__construct()' => [
            'param' => 'value',
            // ...
        ],
        'tags' => ['temporal.workflow'], // Add this line
    ],
    
    \App\Temporal\Activity\CommonActivity::class => [
        'tags' => ['temporal.activity'], // Add this line
    ],
];
```


