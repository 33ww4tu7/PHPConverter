<?php

declare(strict_types=1);

namespace FileConverter;

class Application
{

    public function run(string $filename, string $outputFormat, string $outputFilePath)
    {
        $file = new \SplFileObject($filename, 'r');
        new Converter($file, $outputFormat, $outputFilePath);
    }
}
