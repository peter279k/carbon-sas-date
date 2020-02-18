<?php

namespace Lee;

class SasDateTimeFormats
{
    /**
     * Get SAS/Carbon date format lists
     *
     * @param string $sasDateFormat
     *
     * @return array
     */
    public static function toCarbonDateFormat(string $sasDateFormat)
    {
        $sasDateFormats = [
            'DATE.' => 'dMy',
            'DATE9.' => 'dMY',
            'DAY.' => 'd',
            'DDMMYY.' => 'd/m/y',
            'DDMMYY10.' => 'd/m/Y',
            'DDMMYYB.' => 'd m y',
            'DDMMYYB10.' => 'd m Y',
            'DDMMYYC.' => 'd:m:y',
            'DDMMYYC10.' => 'd:m:Y',
            'DDMMYYD.' => 'd-m-y',
            'DDMMYYD10.' => 'd-m-Y',
            'DDMMYYN.' => 'dmY',
            'DDMMYYN6.' => 'dmy',
            'DDMMYYP.' => 'd.m.y',
            'DDMMYYP10.' => 'd.m.Y',
            'DDMMYYS.' => 'd/m/y',
            'DDMMYYS10.' => 'd/m/Y',
            'DOWNAME.' => 'l',
            'MMDDYY.' => 'm/d/y',
            'MMDDYY10.' => 'm/d/Y',
            'MMDDYYB.' => 'm d y',
            'MMDDYYB10.' => 'm d Y',
            'MMDDYYC.' => 'm:d:y',
            'MMDDYYC10.' => 'm:d:Y',
            'MMDDYYD.' => 'm-d-y',
            'MMDDYYD10.' => 'm-d-Y',
            'MMDDYYN.' => 'mdY',
            'MMDDYYN8.' => 'mdY',
            'MMDDYYP.' => 'm.d.y',
            'MMDDYYP10.' => 'm.d.Y',
            'MMDDYYS.' => 'm/d/y',
            'MMDDYYS10.' => 'm/d/Y',
            'MMYYC.' => 'm:Y',
            'MMYYD.' => 'm-Y',
            'MMYYN.' => 'mY',
            'MMYYP.' => 'm.Y',
            'MMYYS.' => 'm/Y',
            'MONNAME.' => 'F',
            'MONYY.' => 'My',
            'WEEKDATE.' => 'l, F d, Y',
            'WEEKDAY.' => 'L',
            'WORDDATE.' => 'F d, Y',
            'WORDDATX.' => 'd F Y',
        ];

        return $sasDateFormats[$sasDateFormat] ?? '';
    }

    /**
     * Get SAS/Carbon time format lists
     *
     * @param string $sasTimeFormat
     *
     * @return array
     */
    public static function toCarbonTimeFormat(string $sasTimeFormat)
    {
        $sasTimeFormats = [
            'TOD.' => 'H:i:s',
        ];

        return $sasTimeFormats[$sasTimeFormat] ?? '';
    }

    /**
     * Get SAS/Carbon year format lists
     *
     * @param string $sasYearFormat
     *
     * @return array
     */
    public static function toCarbonYearFormat(string $sasYearFormat)
    {
        $sasYearFormats = [
            'YEAR.' => 'Y',
            'YYMMC.' => 'Y:m',
            'YYMMD.' => 'Y-m',
            'YYMMP.' => 'Y.m',
            'YYMMS.' => 'Y/m',
            'YYMMN.' => 'Ym',
            'YYMMDD.' => 'y-m-d',
            'YYMON.' => 'YM',
        ];

        return $sasYearFormats[$sasYearFormat] ?? '';
    }
}
