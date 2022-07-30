<?php

class Solution {

    /**
     * @param String[] $words1
     * @param String[] $words2
     * @return String[]
     */
    function wordSubsets($words1, $words2) {
        $result = [];

        $charSet = [];

        foreach($words2 as $word2) {
            $tempSet = [];

            for($i = 0, $len = strlen($word2); $i < $len; $i++) {
                $tempSet[$word2[$i]] ??= 0;
                $tempSet[$word2[$i]]++;
            }

            foreach ($tempSet as $char => $count) {
                if ($count > $charSet[$char]) {
                    $charSet[$char] = $count;
                }
            }
        }

        $maxLength = array_reduce($charSet, fn ($res, $value) => $res + $value, 0);

        foreach ($words1 as $word1) {
            if ($maxLength > strlen($word1)) {
                continue;
            }

            $tempSet = [];

            for($i = 0, $len = strlen($word1); $i < $len; $i++) {
                $tempSet[$word1[$i]] ??= 0;
                $tempSet[$word1[$i]]++;
            }

            foreach ($charSet as $char => $count) {
                if ($count > $tempSet[$char]) {
                    continue 2;
                }
            }

            $result[] = $word1;
        }

        return $result;
    }
}
