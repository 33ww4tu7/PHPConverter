<?php

declare(strict_types=1);

namespace FileConverter\Converters\ToArray;

class FromCsv implements ToArrayI
{
    public function convertToArray(\SplFileObject $file) : array
    {
        $content = $file->fread($file->getSize());
        $array = array_map("str_getcsv", explode("\n", $content));
        return $array;
    }
}