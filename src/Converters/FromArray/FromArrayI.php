<?php

declare(strict_types=1);

namespace FileConverter\Converters\FromArray;

interface FromArrayI
{
    public function __construct($array);
    public function convertToFormat(string $outputFilePath);
}