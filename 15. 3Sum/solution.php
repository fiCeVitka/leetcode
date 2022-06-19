<?php


class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $values = [];
        $count = count($nums);

        if ($count < 3) {
            return $values;
        }

        sort($nums);

        for ($i = 0; $i < $count - 2; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i-1]) {
                continue;
            }

            $sum = 0 - $nums[$i];

            $j = $i + 1;
            $k = $count - 1;

            while($j < $k) {

                if ($nums[$j] + $nums[$k] === $sum) {
                    $values[] = [$nums[$i], $nums[$j], $nums[$k]];
                    $j++; $k--;
                    while($j < $k && $nums[$j] == $nums[$j-1]) $j++;
                    while($j < $k && $nums[$k] == $nums[$k+1]) $k--;

                } elseif ($nums[$j] + $nums[$k] > $sum) {
                    $k--;
                } else {
                    $j++;
                }
            };
        }

        return $values;
    }
}
