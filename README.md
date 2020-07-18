# Laravel Twikey

[![Latest Version on Packagist](https://img.shields.io/packagist/v/appstract/laravel-twikey.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-twikey)
[![Total Downloads](https://img.shields.io/packagist/dt/appstract/laravel-twikey.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-twikey)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/appstract/laravel-twikey/master.svg?style=flat-square)](https://travis-ci.org/appstract/laravel-twikey)

## Installation

You can install the package via composer:

``` bash
composer require appstract/laravel-twikey
```

Set the following values in your .env file:
```
TWIKEY_API_URL="<api url>"
TWIKEY_API_TOKEN="<your api token>"
```

## Usage

Create an invitation:

```php

$invite = Twikey::invite();

$invite->ct = 1234;
$invite->l = 'nl';
$invite->iban = 'GB33BUKB20201555555555';
$invite->bic = 'BUKBGB22';
$invite->email = 'test@example.com';
$invite->reminderDays = 14;

$invite->save();

var_dump($invite->toArray());

```

Find a mandate:
```php

$mandate = Twikey::mandate()->find('ABC5');

var_dump($mandate->toArray());

```


Create a transaction:
```php

$transaction = Twikey::transaction();
$transaction->mndtId = 'ABC5';
$transaction->message = 'Invoice 1234';
$transaction->amount = '84.32';

$transaction->save();

var_dump($transaction->toArray());

```

## Testing

``` bash
composer test
```

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/appstract/laravel-twikey/graphs/contributors) :)

## About Appstract

Appstract is a small team from The Netherlands. We create (open source) tools for Web Developers and write about related subjects on [Medium](https://medium.com/appstract). You can [follow us on Twitter](https://twitter.com/appstractnl), [buy us a beer](https://www.paypal.me/appstract/10) or [support us on Patreon](https://www.patreon.com/appstract).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
