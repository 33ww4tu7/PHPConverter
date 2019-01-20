<?php

declare(strict_types=1);

namespace FileConverter\Converters\ToArray;


interface ToArrayI
{
    public function convertToArray(\SplFileObject $file) : array;
}