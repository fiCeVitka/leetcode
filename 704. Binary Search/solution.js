/**
 * @param {number[]} nums
 * @param {number} target
 * @return {number}
 */
var search = function(nums, target) {
    const binary = (left, right) => {
        let middle;

        if (left === right) {
            middle = left;
        } else {
            middle = Math.floor((right + left) / 2);
        }

        if (left > right || right < left) {
            return -1;
        }

        if (target === nums[middle]) {
            return middle;
        }

        if (left === right) {
            return -1;
        }

        if (target < nums[middle]) {
            return binary(left, middle - 1);
        } else {
            return binary(middle + 1, right)
        }
    }

    return binary(0, nums.length);
};
