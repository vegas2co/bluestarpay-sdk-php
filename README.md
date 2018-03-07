# Blue Star Pay(TM) - Payments SDK for PHP

[![Latest Stable Version](https://poser.pugx.org/bluestar/payments-sdk-php/v/stable.svg)](https://packagist.org/packages/bluestar/payments-sdk-php)
[![Total Downloads](https://poser.pugx.org/bluestar/payments-sdk-php/downloads.svg)](https://packagist.org/packages/bluestar/payments-sdk-php)
[![License](https://poser.pugx.org/bluestar/payments-sdk-php/license.svg)](https://packagist.org/packages/bluestar/payments-sdk-php)

The Blue Star Pay Payments SDK for PHP is an open source library to interact
with the Blue Star Pay API through your PHP application. The library interacts
with Blue Star Pays's [JSON API](https://developer.bluestarpay.com/docs).

**Note:** This version uses Blue Star Pay API v1. There are substantial differences
between this version of the client library and versions after it. Please be careful
when upgrading.

## Requirements

PHP 5.4.0 (or higher)

## Dependencies

### PHP Curl Class 7.2.0 (or higher)

This library also requires `'ext-curl': '*'`.

## Installation

### Composer

It is strongly recommended that you use [Composer](http://getcomposer.org) to install this
package and its dependencies. To do this, run the following command:

```bash
composer require bluestar/payments-sdk-php
```

You can also manually add this dependency to your `composer.json` file:

```json
{
    "require": {
        "bluestar/payments-sdk-php": "~1.0.0"
    }
}
```

To use the bindings, use Composer's
[autoload](https://getcomposer.org/doc/00-intro.md#autoloading):

```php
require_once('vendor/autoload.php');
```

### Manual Installation

If you do not wish to use Composer, you can download the
[latest release](https://gitlab.com/bluestarsports/bsp/bluestarpay-sdk-php/releases). Then, to use the bindings,
include the `payments-sdk.php` file.

```php
require_once('/path/to/bluestar/payments-sdk-php/lib/payments-sdk.php');
```

## Instantiating the SDK

```php
$bluestarpay = new BlueStar\Payments\BlueStarPay($yourPublicKey, $yourPrivateKey);
```

This will create a BlueStarPay class instance in *PRODUCTION* mode with *USD* as the default currency.

To enable development/testing mode, you should then use:

```php
$bluestarpay->enableTestMode();
```

To change currency:

```php
$bluestarpay->setCurrency('CAD');
```

## Basic Structures

The basic structures used in the SDK.

#### Split Payments

```php
$split = (new BlueStar\Payments\Structures\Split())
    ->setMerchant((new BlueStar\Payments\Structures\Merchant())
        ->setID($merchantId)
    )
    ->setAmount($amountInCents);
```

#### Account

##### CreditCard

```php
$creditCard = (new BlueStar\Payments\Structures\Account())
    ->setSavePaymentMethod($trueOrFalse)
    ->setType(BlueStar\Payments\AccountTypes::VISA) // MASTERCARD, DISCOVER, AMEX
    ->setNumber($accountNumber)
    ->setExpireDate($mmddExpirationDate)
    ->setCvv2($cvv2);
```

##### Bank Account

```php
$bankAccount = (new BlueStar\Payments\Structures\Account())
    ->setSavePaymentMethod($trueOrFalse)
    ->setType(BlueStar\Payments\AccountTypes::CHECKING) // SAVINGS 
    ->setNumber($accountNumber)
    ->setRoutingNumber($routingNumber);
```

#### Account Holder

```php
$accountHolder = (new BlueStar\Payments\Structures\AccountHolder())
    ->setName($accountHolderName)
    ->setBillingAddress($billingAddress);
```

#### Address

```php
$address = (new BlueStar\Payments\Structures\Address())
    ->setAddressLines("$addressLine1.$lineSeparator.$addressLine2", $lineSeparator)
    ->setCity($city)
    ->setState($stateAbbreviation)
    ->setPostalCode($zipCode)
    ->setCountry(BlueStar\Payments\Structures\Country::usa());
```

#### Merchant

```php
$merchant = (new BlueStar\Payments\Structures\Merchant())
    ->setID($merchantID)
    ->setHashKey($merchantHashKey);
```

## Generating and Processing Transactions
How to generate request objects using the factory class and how to use them to process transactions.

#### Sale with Account Details

```php
$saleRequest = BlueStar\Payments\Factories\Sale::withAccountDetails(
    BlueStar\Payments\Structures\Account $account,
    BlueStar\Payments\Structures\AccountHolder $accountHolder,
    BlueStar\Payments\Structures\Merchant $merchant,
    $amountInCents,
    BlueStar\Payments\Structures\Customer $optionalCustomer = null,
    BlueStar\Payments\Structures\Split $optionalSplit = null,
    BlueStar\Payments\Structures\Currency $optionalCurrencyOverride
);

$sale = $bluestarpay->processTransaction(
    $saleRequest,
    $optionalIdempotencyKey
);
```

#### Sale with Payment Method

```php
$saleRequest = BlueStar\Payments\Factories\Sale::withPaymentMethod(
    BlueStar\Payments\Structures\PaymentMethod $paymentMethod,
    BlueStar\Payments\Structures\Merchant $merchant,
    $amountInCents,
    BlueStar\Payments\Structures\Split $optionalSplit = null,
    BlueStar\Payments\Structures\Currency $optionalCurrencyOverride
);

$sale = $bluestarpay->processTransaction(
    $saleRequest,
    $optionalIdempotencyKey
);
```

#### Void

```php
$voidRequest = BlueStar\Payments\Factories\VoidTransaction::previousTransaction(
    BlueStar\Payments\Structures\Transaction $previousTransaction
);

$void = $bluestarpay->processTransaction(
    $voidRequest,
    $optionalIdempotencyKey
);
```

#### Refund

```php
$refundRequest = BlueStar\Payments\Factories\Refund::previousTransaction(
    BlueStar\Payments\Structures\Transaction $previousSaleOrCaptureTransaction,
    $amountInCents
);

$refund = $bluestarpay->processTransaction(
    $refundRequest,
    $optionalIdempotencyKey
);
```

## Documentation

Please see https://developer.bluestarpay.com/docs for up-to-date documentation.

## Development

Install dependencies:

```bash
composer install
```

## Tests

Install dependencies as mentioned above (which will resolve
[PHPUnit](http://packagist.org/packages/phpunit/phpunit)), then you can run the test suite:

```bash
./vendor/bin/phpunit
```

Or to run an individual test file:

```bash
./vendor/bin/phpunit tests/SaleTest.php
```

## Support

- [https://developer.bluestarpay.com](https://developer.bluestarpay.com)
- [stackoverflow](http://stackoverflow.com/questions/tagged/bluestarpay)

## Contributing Guidelines

Please refer to [CONTRIBUTING.md](CONTRIBUTING.md)
