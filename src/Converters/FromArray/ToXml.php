<?php

declare(strict_types=1);

namespace FileConverter\Converters\FromArray;

use SimpleXMLElement;

class ToXml implements FromArrayI
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }
    public function convertToFormat(string $outputFilePath)
    {
        $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        try {
            $this->arrayToXml($this->array, $xml_data);
            $xml_data->asXML($outputFilePath);
            echo "Convert success, congratulations!";
        } catch (\Error $e) {
            echo "Error while creating xml file";
        }
    }
    private function arrayToXml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key;
            }
            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}