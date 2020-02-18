# carbon-sas-date

[![Build Status](https://travis-ci.org/peter279k/carbon-sas-date.svg?branch=master)](https://travis-ci.org/peter279k/carbon-sas-date)
[![StyleCI](https://github.styleci.io/repos/237868480/shield?branch=master)](https://github.styleci.io/repos/237868480)

## Introduction

- [SAS](https://en.wikipedia.org/wiki/SAS_language) is a programming language and it has own date manipulation approach.
- This is a helper to let given SAS date/year/time format convert to Carbon date format.
- It can also use SAS date format directly to create a Carbon instance.

## Notice

Some SAS date formats cannot find current mapped Carbon date formats.

**And it will throw InvalidArgumentException with using these SAS date/year/time formats on CarbonSasHelper::createDateFromFormat, CarbonSasHelper::createTimeFromFormat or CarbonSasHelper::createYearFromFormat method.**

## Usage

### Create from SAS date format via CarbonSasHelper class

```php
use Lee\CarbonSasHelper;

$sasDateFormat = 'DDMMYY.';
$sasDate = '17/03/13';

$carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate); // Carbon class instance

$carbonSasHelper->format('d/m/y'); // '17/03/13'
```

## Real case

Sometimes it will get following SAS datetime format on the real case:

```06FEB2020:00:00:00.000000```

It has the SAS date and time formats. And the SAS date is `06FEB2020` and format is `DATE9.`.

Then the sample code is:

```php
use Lee\CarbonSasHelper;

$sasDateFormat = 'DATE9.';
$sasDate = '06FEB2020';
$carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate); // Carbon class instance

$carbonSasHelper->format('dMY:00:00:00.000000'); // '06Feb2020:00:00:00.000000'

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
