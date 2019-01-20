<?php

declare(strict_types=1);

namespace FileConverter\Converters\FromArray;

class ToCsv implements FromArrayI
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function convertToFormat(string $outputFilePath)
    {
        try {
            $fp = fopen($outputFilePath, 'w');

            foreach ($this->array as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);

            echo "Convert success, congratulations!";
        } catch (\Error $e) {
            echo "Error while creating csv file";
        }
    }
}