<?php

namespace App\Domain\Register\Services;

class ReportService {

    const FORMAT_CSV = 'csv';
    const FORMAT_XLS = 'xls';
    const FORMAT_PDF = 'pdf';

    public static function getFormats() {
        return [
            ['value' => self::FORMAT_CSV, 'description' => strtoupper(self::FORMAT_CSV)],
            ['value' => self::FORMAT_XLS, 'description' => strtoupper(self::FORMAT_XLS)],
            ['value' => self::FORMAT_PDF, 'description' => strtoupper(self::FORMAT_PDF)]
        ];
    }

}