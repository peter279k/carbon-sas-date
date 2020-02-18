<?php

namespace Lee;

use Carbon\Carbon;
use InvalidArgumentException;

class CarbonSasHelper
{
    public static $carbonDateFormat;

    public static $sasDateFormat;

    public static $carbonTimeFormat;

    public static $sasTimeFormat;

    public static $carbonYearFormat;

    public static $sasYearFormat;

    /**
     * Create Carbon instance with SAS date format and date
     *
     * @param string $sasDateFormat
     * @param string $sasDate
     *
     * @return Carbon
     */
    public static function createDateFromFormat(string $sasDateFormat, string $sasDate)
    {
        $carbonDateFormat = SasDateTimeFormats::toCarbonDateFormat($sasDateFormat);

        if ($carbonDateFormat === '') {
            $exceptionMessage = 'The SAS date format: %s is invalid or unsupported at this time.';
            $exceptionMessage = sprintf($exceptionMessage, $sasDateFormat);

            throw new InvalidArgumentException($exceptionMessage);
        }

        static::$sasDateFormat = $sasDateFormat;
        static::$carbonDateFormat = $carbonDateFormat;

        return Carbon::createFromFormat($carbonDateFormat, $sasDate);
    }

    /**
     * Create Carbon instance with SAS date format and time
     *
     * @param string $sasTimeFormat
     * @param string $time
     *
     * @return Carbon
     */
    public static function createTimeFromFormat(string $sasTimeFormat, string $time)
    {
        $carbonTimeFormat = SasDateTimeFormats::toCarbonTimeFormat($sasTimeFormat);

        if ($carbonTimeFormat === '') {
            $exceptionMessage = 'The SAS time format: %s is invalid or unsupported at this time.';
            $exceptionMessage = sprintf($exceptionMessage, $sasTimeFormat);

            throw new InvalidArgumentException($exceptionMessage);
        }

        static::$sasTimeFormat = $sasTimeFormat;
        static::$carbonTimeFormat = $carbonTimeFormat;

        return Carbon::createFromFormat($carbonTimeFormat, $time);
    }

    /**
     * Create Carbon instance with SAS date format and year
     *
     * @param string $sasYearFormat
     * @param string $time
     *
     * @return Carbon
     */
    public static function createYearFromFormat(string $sasYearFormat, string $time)
    {
        $carbonYearFormat = SasDateTimeFormats::toCarbonYearFormat($sasYearFormat);

        if ($carbonYearFormat === '') {
            $exceptionMessage = 'The SAS year format: %s is invalid or unsupported at this time.';
            $exceptionMessage = sprintf($exceptionMessage, $sasYearFormat);

            throw new InvalidArgumentException($exceptionMessage);
        }

        static::$sasYearFormat = $sasYearFormat;
        static::$carbonYearFormat = $carbonYearFormat;

        return Carbon::createFromFormat($carbonYearFormat, $time);
    }
}
