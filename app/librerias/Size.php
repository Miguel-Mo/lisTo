<?php

class Size
{
    public static function dicFormatBytes($bytes)
    {
        $bytes = floatval($bytes);
        $dic = [
            0 => [
                'UNIT' => 'T',
                'VALUE' => pow(1024, 4),
            ],
            1 => [
                'UNIT' => 'G',
                'VALUE' => pow(1024, 3),
            ],
            2 => [
                'UNIT' => 'M',
                'VALUE' => pow(1024, 2),
            ],
            3 => [
                'UNIT' => 'K',
                'VALUE' => 1024,
            ],
            4 => [
                'UNIT' => 'B',
                'VALUE' => 1,
            ],
        ];

        foreach ($dic as $item) {
            $result = $bytes / $item['VALUE'];
            $result = round($result, 2);
            $dic['VALUE'] = $result;
        }

        return $dic;
    }

    public static function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        // return round($bytes, $precision).' '.$units[$pow];
        return round($bytes, $precision).''.$units[$pow];
    }

    public static function convertToBytes(string $from): ?int
    {
        $units = ['B', 'K', 'M', 'G', 'T', 'P'];
        $number = substr($from, 0, -1);
        $suffix = strtoupper(substr($from, -1));

        //B or no suffix
        if (is_numeric(substr($suffix, 0, 1))) {
            return preg_replace('/[^\d]/', '', $from);
        }

        $exponent = array_flip($units)[$suffix] ?? null;
        if ($exponent === null) {
            return null;
        }

        return $number * (1024 ** $exponent);
    }
}
