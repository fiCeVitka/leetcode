/**
 * @param {string} s
 * @return {boolean}
 */
var isValid = function(s) {
    const length = s.length;
    const openBrackets = ['{', '[', '('];

    let arr = [];

    for (let index = 0; index < length; index++) {
        const element = s[index];

        if (openBrackets.includes(element)) {
            arr.push(element);
            continue;
        }

        if (index === 0) {
            return false;
        }

        const lastBracket = arr[arr.length - 1];

        if (element === '}' && lastBracket === '{') {
            arr.pop();
            continue;
        }

        if (element === ')' && lastBracket === '(') {
            arr.pop();
            continue;
        }

        if (element === ']' && lastBracket === '[') {
            arr.pop();
            continue;
        }

        return false;
    }


    return arr.length === 0;
};
