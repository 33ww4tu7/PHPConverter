<?php

declare(strict_types=1);

namespace FileConverter\Converters\ToArray;

class FromXml implements ToArrayI
{
    public function convertToArray(\SplFileObject $file) : array
    {
        $content = $file->fread($file->getSize());
        $xml = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
        $array = json_decode(json_encode($xml), TRUE);
        return $array;
    }
}