<?php

declare(strict_types=1);

namespace FileConverter\Converters\FromArray;

class ToJson implements FromArrayI
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function convertToFormat(string $outputFilePath)
    {

        try {
            $json = json_encode($this->array);
            $file = fopen($outputFilePath, 'w');
            fwrite($file, $json);
            fclose($file);
            echo "Convert success, congratulations!";
        } catch (\Error $e) {
            echo "Error while creating json file";
        }
    }
}