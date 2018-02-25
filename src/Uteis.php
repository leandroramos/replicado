<?php

namespace Uspdev\Replicado;

class Uteis
{
    public function removeAcentos($str) 
    {
        $map = [
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'É' => 'E',
            'Ê' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ú' => 'U',
            'Ü' => 'U',
            'Ç' => 'C'
        ];
        return strtr($str, $map);
    }

    function utf8_converter($array)
    {
        array_walk_recursive($array, function(&$item, $key){
            // fix ISO-8859-1 ?
            if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
            }
        });
        return $array;
    }

    function makeCsv($array)
    {
        $csv = '';
        $csvKeys = '';

        foreach(array_keys($array[0]) as $key) {
            $csvKeys .= "$key,";
        }

        $csv .= rtrim($csvKeys, ',') . "\r\n";

        foreach($array as $row) {
            $line = '';

            foreach($row as $key => $value) {
                $line .= "$value,";
            }

            $line = rtrim($line, ',') . "\r\n";
            $csv .= $line;
        }

        return $csv;
    }
}

