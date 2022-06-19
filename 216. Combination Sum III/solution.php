<?php

class Solution {

    private $cache = [];
    private $start = null;
    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n) {
        $result = [];

        if ($k > $n) {
            return [];
        }

        $sum = $this->sumValue($k);
        if ($sum > $n) {
            return [];
        }

        $values = [];

        for($i=1; $i < 10; $i++) {
            if ($i <= $k) {
                $values[$i] = true;
            }

        }

        $this->start = $n < 10 ? $n : 9;
        return $this->getPair($sum, $n, $values);
    }

    function getPair($sum, $n, $values) {
        $result = [];

        $keys = array_keys($values);
        $tag = implode('', $keys);

        if (array_key_exists($tag, $this->cache)) {
            return $result;
        }

        $this->cache[$tag] = true;

        if ($sum > $n) {
            return $result;
        }

        if ($sum === $n) {
            $result[] = $keys;
            return $result;
        }

        for($i = 1; $i < $this->start; $i++)
        {
            if (isset($values[$i]) && !array_key_exists($i + 1, $values)) {
                $newValues = $values;

                unset($newValues[$i]);
                $newValues[$i+1] = true;

                ksort($newValues);

                $result = array_merge($result, $this->getPair($sum + 1, $n, $newValues));
            }
        }


        return $result;
    }

    function sumValue($n)
    {

        return ((1 + $n) * $n) / 2;
    }
}
