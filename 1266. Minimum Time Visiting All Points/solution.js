/**
 * @param {number[][]} points
 * @return {number}
 */
var minTimeToVisitAllPoints = function(points) {
    if (!points.length) {
        return 0;
    }

    let sum = 0;

    for (let i = 1; i <= points.length - 1; i++) {
        sum += getPath(points[i - 1][0], points[i - 1][1], points[i][0], points[i][1]);
    }

    return sum;
};

function getPath(curX, curY, targetX, targetY) {
    const x = curX === targetX ? 0 : (curX < targetX ? 1 : -1);
    const y = curY === targetY ? 0 : (curY < targetY ? 1 : -1);

    if (x === 0 && y === 0) {
        return 0;
    }


    return 1 + getPath(curX + x, curY + y, targetX, targetY);
}
