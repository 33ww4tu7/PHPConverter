<?php

declare(strict_types=1);

namespace FileConverter;

class Converter
{
    public function __construct(\SplFileObject $file, string $outputFormat, string $outputFilePath)
    {
        $array = $this->toArrayPath($file)->convertToArray($file);
        $this->toFormatPath($outputFormat, $array)->convertToFormat($outputFilePath);
    }

    public function toArrayPath(\SplFileObject $file)
    {
        $fromExtension = ucfirst($file->getExtension());
        $ToArrayConverter = "FileConverter\\Converters\\ToArray\\From" . $fromExtension;
        return new $ToArrayConverter();
    }

    public function toFormatPath(string $outputFormat, $array)
    {
        $toExtension = ucfirst($outputFormat);
        $FromArrayConverter = "FileConverter\\Converters\\FromArray\\To" . $toExtension;
        return new $FromArrayConverter($array);
    }
}
