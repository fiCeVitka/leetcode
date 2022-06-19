<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $result = [];
        $sum = null;

        foreach($nums as $index => $num) {
            $sum = $num;

            foreach($nums as $secondIndex => $secondNum) {
                if ($secondIndex === $index) {
                    continue;
                }

                if ($num + $secondNum === $target) {
                    $result = [$index, $secondIndex];
                    break;
                }
            }
        }

        return $result;
    }
}
