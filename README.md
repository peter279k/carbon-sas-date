# carbon-sas-date

## Introduction

- This is a helper to let given SAS date format convert to Carbon date format.
- It can also use SAS date format directly to create a Carbon instance.

## Notice

Some SAS date formats cannot find current mapped Carbon date formats.

**And it will present empty string result with using these SAS date formats**.

## Usage

### Create from SAS date format via CarbonSasHelper class

```php
use Lee\CarbonSasHelper;

$sasDateFormat = 'DDMMYY.';
$sasDate = '17/03/13';

$carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate); // Carbon class instance

$carbonSasHelper->format('d/m/y'); // '17/03/13'
```

## Special cases

Some SAS date is not same as Carbon date. The know cases are as follows:

```php
use Lee\CarbonSasHelper;

$sasDateFormat = 'DATE.';
$sasDate = '17MAR13';
$carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate); // Carbon class instance

$carbonSasHelper->format('dMy'); // '17Mar13'


$sasDateFormat = 'DATE9.';
$sasDate = '17MAR2013';
$carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate); // Carbon class instance

$carbonSasHelper->format('dMY'); // '17Mar2013'


$sasDateFormat = 'MONYY.';
$sasDate = 'MAR13';
$carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate); // Carbon class instance

$carbonSasHelper->format('My'); // 'Mar13'

$sasYearFormat = 'YYMON.';
$sasDate = '2013MAR';
$carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate); // Carbon class instance

$carbonSasHelper->format('YM'); // '2013Mar'
```

## References

[SAS date documentation](https://documentation.sas.com/?docsetId=lrcon&docsetTarget=p1wj0wt2ebe2a0n1lv4lem9hdc0v.htm&docsetVersion=9.4&locale=en#n1franwnd7n7yrn1kasbprbtzroo)
