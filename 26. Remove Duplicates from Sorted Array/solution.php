<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $value = $nums[0];
        $index = 1;
        $length = count($nums);

        while ($index < $length) {
            if ($nums[$index] === $value) {
                unset($nums[$index]);
                $index++;
                continue;
            }

            $value = $nums[$index];
            $index++;
        }


        $nums = array_values($nums);
    }
}
