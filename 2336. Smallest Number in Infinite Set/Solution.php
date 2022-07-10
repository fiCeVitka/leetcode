<?php

class SmallestInfiniteSet {

    private $minValue = 1;
    private array $map = [];

    /**
     */
    function __construct() {

    }

    /**
     * @return Integer
     */
    function popSmallest() {
        $value = $this->minValue;

        $this->map[$this->minValue] = true;

        $this->minValue++;

        while (!$this->isAvailableValue($this->minValue)) {
            $this->minValue++;
        }

        return $value;
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addBack($num) {
        if ($this->isAvailableValue($num)) {
            $this->map[$num] = false;

            if ($num < $this->minValue) {
                $this->minValue = $num;
            }
        }

    }

    private function isAvailableValue($index): bool
    {
        return !array_key_exists($this->minValue, $this->map) || $this->map[$this->minValue] === false;
    }
}

/**
 * Your SmallestInfiniteSet object will be instantiated and called as such:
 * $obj = SmallestInfiniteSet();
 * $ret_1 = $obj->popSmallest();
 * $obj->addBack($num);
 */
