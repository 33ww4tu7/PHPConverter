<?php

declare(strict_types=1);

namespace FileConverter\Converters\ToArray;

class FromJson implements ToArrayI
{
    public function convertToArray(\SplFileObject $file): array
    {
        $content = $file->fread($file->getSize());
        $array = json_decode($content, true);
        return $array;
    }
}