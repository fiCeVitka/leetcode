<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $value = $nums[0];
        $index = 1;
        $count = 1;
        $length = count($nums);

        while ($index < $length) {
            if ($nums[$index] === $value) {
                if ($count >= 2) {
                    unset($nums[$index]);
                }

                $count++;
                $index++;
                continue;
            }

            $value = $nums[$index];
            $index += 1;
            $count = 1;
        }


        $nums = array_values($nums);
        return count($nums);
    }
}
