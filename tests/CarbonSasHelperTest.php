<?php

namespace Lee\Tests;

use Lee\CarbonSasHelper;
use Lee\SasDateTimeFormats;
use PHPUnit\Framework\TestCase;

class CarbonSasHelperTest extends TestCase
{
    /**
     * createDateFromFormat test on SAS date is different from Carbon date
     *
     * @dataProvider providerForCreateDateFromFormatOnSpecialSasDateFormat
     *
     * @param string $sasDateFormat
     * @param string $sasDate
     * @param string $expected
     *
     * @return void
     */
    public function testCreateDateFromFormatOnSasDateIsDifferentFromCarbonDate(string $sasDateFormat, string $sasDate, string $expected)
    {
        $carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $sasDate);
        $carbonDateFormat = SasDateTimeFormats::toCarbonDateFormat($sasDateFormat);
        $resultDate = $carbonSasHelper->format($carbonDateFormat);

        $this->assertSame($expected, $resultDate);
    }

    /**
     * data provider for createDateFromFormat test with some incompatible carbon date formats
     */
    public function providerForCreateDateFromFormatOnSpecialSasDateFormat()
    {
        return [
            ['DATE.', '17MAR13', '17Mar13'],
            ['DATE9.', '17MAR2013', '17Mar2013'],
            ['MONYY.', 'MAR13', 'Mar13'],
        ];
    }

    /**
     * createDateFromFormat test with carbon date format is compatible with some SAS date formats
     *
     * @dataProvider providerForCreateDateFromFormat
     *
     * @param string $sasDateFormat
     * @param string $date
     *
     * @return void
     */
    public function testCreateDateFromFormat(string $sasDateFormat, string $expected)
    {
        $carbonSasHelper = CarbonSasHelper::createDateFromFormat($sasDateFormat, $expected);
        $carbonDateFormat = SasDateTimeFormats::toCarbonDateFormat($sasDateFormat);
        $resultDate = $carbonSasHelper->format($carbonDateFormat);

        $this->assertSame($expected, $resultDate);
    }

    /**
     * data provider for createDateFromFormat test
     *
     * @return array
     */
    public function providerForCreateDateFromFormat()
    {
        return [
            ['DAY.', '17'],
            ['DDMMYY.', '17/03/13'],
            ['DDMMYY10.', '17/03/2013'],
            ['DDMMYYB.', '17 03 13'],
            ['DDMMYYB10.', '17 03 2013'],
            ['DDMMYYC.', '17:03:13'],
            ['DDMMYYC10.', '17:03:2013'],
            ['DDMMYYD.', '17-03-13'],
            ['DDMMYYD10.', '17-03-2013'],
            ['DDMMYYN.', '17032013'],
            ['DDMMYYN6.', '170313'],
            ['DDMMYYP.', '17.03.13'],
            ['DDMMYYP10.', '17.03.2013'],
            ['DDMMYYS.', '17/03/13'],
            ['DDMMYYS10.', '17/03/2013'],
            ['DOWNAME.', 'Sunday'],
            ['MMDDYY.', '03/17/13'],
            ['MMDDYY10.', '03/17/2013'],
            ['MMDDYYB.', '03 17 13'],
            ['MMDDYYB10.', '03 17 2013'],
            ['MMDDYYC.', '03:17:13'],
            ['MMDDYYC10.', '03:17:2013'],
            ['MMDDYYD.', '03-17-13'],
            ['MMDDYYD10.', '03-17-2013'],
            ['MMDDYYN.', '03172013'],
            ['MMDDYYN8.', '03172013'],
            ['MMDDYYP.', '03.17.13'],
            ['MMDDYYP10.', '03.17.2013'],
            ['MMDDYYS.', '03/17/13'],
            ['MMDDYYS10.', '03/17/2013'],
            ['MMYYC.', '03:2013'],
            ['MMYYD.', '03-2013'],
            ['MMYYN.', '032013'],
            ['MMYYP.', '03.2013'],
            ['MMYYS.', '03/2013'],
            ['MONNAME.', 'March'],
            ['WEEKDATE.', 'Sunday, March 17, 2013'],
            ['WORDDATE.', 'March 17, 2013'],
            ['WORDDATX.', '17 March 2013'],
        ];
    }
}
