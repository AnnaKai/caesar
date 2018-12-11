<?php

/**
* Caesar Decrypt Class (English)
*/

class Caesar  {
    private $_arr = [
    0 => "a",
    1 => "b",
    2 => "c",
    3 => "d",
    4 => "e",
    5 => "f",
    6 => "g",
    7 => "h",
    8 => "i",
    9 => "j",
    10 => "k",
    11 => "l",
    12 => "m",
    13 => "n",
    14 => "o",
    15 => "p",
    16 => "q",
    17 => "r",
    18 => "s",
    19 => "t",
    20 => "u",
    21 => "v",
    22 => "w",
    23 => "x",
    24 => "y",
    25 => "z"
    ];

    /**
     * @param string $string to decrypt
     * @return array
     */

    public function decrypt($string)
    {
        $text = mb_strtolower($string);
        $text_arr = preg_split('//u', $text, null, PREG_SPLIT_NO_EMPTY);
        $output = [];
        $id = 0;
        for ($n = 1; $n <= 25; $n++) {
            $new_arr = [];
            foreach ($text_arr as $value) {
                $key = array_search($value, $this->_arr); //looking for a current key in the alphabet
                if ($key === false) {
                    $value = " ";
                    $new_arr[$id] = $value;
                    $id++;
                } else {
                    while (($key - $n) <= 0) {
                        array_unshift($this->_arr, array_pop($this->_arr));
                        $key++;
                    }
                    $value = $this->_arr[$key - $n];
                    $new_arr[$id] = $value;
                    $id++;
                }
            }
            array_push($output, implode($new_arr));
        }
        return $output;
    }
}
