<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Alert Flash Tailwind Widget</h1>
    <br>
</p>

[![Total Downloads](https://poser.pugx.org/yii-extension/alert-flash-tailwind/downloads)](//packagist.org/packages/yii-extension/alert-flash-tailwind)
[![build](https://github.com/yii-extension/alert-flash-tailwind/actions/workflows/build.yml/badge.svg)](https://github.com/yii-extension/alert-flash-tailwind/actions/workflows/build.yml)
[![codecov](https://codecov.io/gh/yii-extension/alert-flash-tailwind/branch/master/graph/badge.svg?token=KB6T5KMGED)](https://codecov.io/gh/yii-extension/alert-flash-tailwind)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyii-extension%2Falert-flash-tailwind%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/yii-extension/alert-flash-tailwind/master)
[![static analysis](https://github.com/yii-extension/alert-flash-tailwind/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/alert-flash-tailwind/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/alert-flash-tailwind/coverage.svg)](https://shepherd.dev/github/yii-extension/alert-flash-tailwind)


## Installation

```shell
composer require yii-extension/alert-flash-tailwind
```

## Usage

The widgets do not register any assets, you must register the assets for [Tailwind Css Framework](https://github.com/yii-extension/asset-tailwind)

In controller or action:

```php
<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Session\Flash\Flash;

final class Action
{
    public function index(Flash $flash): ResponseInterface
    {
        $flash->add(
            'danger', // types: [danger, info, success, warning]
            [
                'body' => '<b>Holy smokes!</b> Something seriously bad happened.' // Its mandatory.
            ],
            true
        );
    }
}
```

In layout:

```php
<?php

declare(strict_types=1);

use Yii\Extension\Tailwind\AlertFlash;
use Yiisoft\Session\Flash\Flash;

/** @var Flash $flash */
?>

<?= AlertFlash::widget([$flash])
    ->bodyClass('align-middle flex-grow inline-block mr-8')
    ->bodyTag('p')
    ->buttonLabel('&times;')
    ->buttonOnClick('closeAlert()')
    ->iconAttributes(['class' => 'fa-2x pr-2'])
    ->class('flex font-bold items-center px-4 py-3 text-sm text-white')
    ->layoutBody('{icon}{body}{button}')
    ->render();
?>
```

HtmlOutput:
```Html
<div id="w0-alert" class="bg-red-600 flex font-bold items-center px-4 py-3 text-sm text-white" role="alert">
    <div><i class="fa-2x pr-2 far fa-times-circle"></i></div>
    <p class="align-middle flex-grow inline-block mr-8"><b>Holy smokes!</b> Something seriously bad happened.</p>
    <button type="button" class="float-right px-4 py-3" onclick="closeAlert()">&times;</button>
</div>
```

Note: Tailwind does not provide any Javascript implementation for closing the AlertFlash, so you will need to implement it.

Example JavaScript:
```Javascript
function closeAlert() {
    document.getElementById('w0-alert').style.display = 'none';
}
```

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

### Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework. To run it:

```shell
./vendor/bin/infection
```

### Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```

## License

The `yii-extension/alert-flash-tailwind` for Yii Packages is free software.

It is released under the terms of the BSD License. Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).

## Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

## Powered by Yii Framework

[![Official website](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
