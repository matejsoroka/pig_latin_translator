<?php

namespace App\Models;

class Translator {

    private $input;
    private $syllable = "ay";
    private $delimiter = "-";
    private $consonants = ["B", "C", "D", "F", "G", "H", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "V", "X", "Z"];

    /**
     * @param string $input english word
     */
    public function setInput(string $input)
    {
        $this->input = $input;
    }

    /**
     * @return string Get english word
     */
    public function getInput() : string
    {
        return $this->input;
    }

    /**
     * @return string Translated english word into pig latin
     */
    public function translate() : string
    {
        $input = $this->getInput();
        $index = $this->getFirstVowelIndex($input);
        if ($index) {
            $suffix = substr($input, 0, $index);
            $prefix = substr($input, $index, strlen($input));
            $input = $prefix.$this->delimiter.$suffix.$this->syllable;
        } else {
            $input .= "'" . $this->getRandomConsonant() . $this->syllable;
        }
        return $input;
    }

    /**
     * @return string Random consonant
     */
    private function getRandomConsonant() : string
    {
        return strtolower($this->consonants[rand(0, count($this->consonants) - 1)]);
    }

    /**
     * @param $word string english word
     * @return int position of first vowel
     */
    private function getFirstVowelIndex(string $word) : int
    {
        $i = 0;
        foreach (str_split($word) as $char) {
            if (in_array(strtoupper($char), $this->consonants)) {
                $i++;
            } else {
                break;
            }
        }
        return $i;
    }

}
