<?php

namespace App\Helpers;

class NumberHelper
{
    public static function toNepaliNumber($number)
    {
        $arabicNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        
        return str_replace($arabicNumbers, $nepaliNumbers, $number);
    }
    public static function toEnglishNumber($number)
    {
        $arabicNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        
        return str_replace($nepaliNumbers, $arabicNumbers, $number);
    }
    public static function toNepaliDay($englishDay)
    {
        $englishDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $nepaliDays = ['आइतबार', 'सोमबार', 'मंगलबार', 'बुधबार', 'बिहीबार', 'शुक्रबार', 'शनिबार'];
    
        return str_replace($englishDays, $nepaliDays, $englishDay);
    }
    
    public static function toNepaliTime($time)
    {
        if (empty($time)) {
            return '';
        }
        
        // If time is already in 12-hour format with AM/PM, convert directly
        if (strpos($time, 'AM') !== false || strpos($time, 'PM') !== false || 
            strpos($time, 'am') !== false || strpos($time, 'pm') !== false) {
            $nepaliTime = self::toNepaliNumber($time);
            $nepaliTime = str_replace('AM', 'बिहान', $nepaliTime);
            $nepaliTime = str_replace('PM', 'बेलुका', $nepaliTime);
            $nepaliTime = str_replace('am', 'बिहान', $nepaliTime);
            $nepaliTime = str_replace('pm', 'बेलुका', $nepaliTime);
            return $nepaliTime;
        }
        
        // Convert 24-hour format to 12-hour format with Nepali AM/PM
        try {
            $dateTime = \DateTime::createFromFormat('H:i:s', $time);
            if (!$dateTime) {
                $dateTime = \DateTime::createFromFormat('H:i', $time);
            }
            
            if ($dateTime) {
                $hour = (int)$dateTime->format('H');
                $minute = $dateTime->format('i');
                
                // Convert to 12-hour format
                if ($hour == 0) {
                    $hour = 12;
                    $period = 'बिहान';
                } elseif ($hour < 12) {
                    $period = 'बिहान';
                } elseif ($hour == 12) {
                    $period = 'बेलुका';
                } else {
                    $hour = $hour - 12;
                    $period = 'बेलुका';
                }
                
                // Convert to Nepali numbers
                $nepaliHour = self::toNepaliNumber($hour);
                $nepaliMinute = self::toNepaliNumber($minute);
                
                return $nepaliHour . ':' . $nepaliMinute . ' ' . $period;
            }
        } catch (\Exception $e) {
            // If parsing fails, just convert numbers to Nepali
            return self::toNepaliNumber($time);
        }
        
        // Fallback: just convert numbers to Nepali
        return self::toNepaliNumber($time);
    }
    
    public static function toNepaliDate($date)
    {
        if (empty($date)) {
            return '';
        }
        
        // Convert numbers to Nepali
        $nepaliDate = self::toNepaliNumber($date);
        
        // Convert month numbers to Nepali month names
        $nepaliMonths = [
            '01' => 'बैशाख',
            '02' => 'जेठ',
            '03' => 'असार',
            '04' => 'श्रावण',
            '05' => 'भदौ',
            '06' => 'असोज',
            '07' => 'कार्तिक',
            '08' => 'मंसिर',
            '09' => 'पुष',
            '10' => 'माघ',
            '11' => 'फाल्गुन',
            '12' => 'चैत'
        ];
        
        // Extract year, month, and day from date (assuming YYYY-MM-DD format)
        if (preg_match('/(\d{4})-(\d{2})-(\d{2})/', $nepaliDate, $matches)) {
            $year = $matches[1];
            $month = $matches[2];
            $day = $matches[3];
            
            // Convert month number to Nepali month name
            $monthName = $nepaliMonths[$month] ?? $month;
            
            return $day . ' ' . $monthName . ' ' . $year;
        }
        
        return $nepaliDate;
    }
    
    public static function toNepaliMonth($monthNumber)
    {
        $nepaliMonths = [
            '01' => 'बैशाख',
            '02' => 'जेठ',
            '03' => 'असार',
            '04' => 'श्रावण',
            '05' => 'भदौ',
            '06' => 'असोज',
            '07' => 'कार्तिक',
            '08' => 'मंसिर',
            '09' => 'पुष',
            '10' => 'माघ',
            '11' => 'फाल्गुन',
            '12' => 'चैत'
        ];
        
        return $nepaliMonths[$monthNumber] ?? $monthNumber;
    }
    }
