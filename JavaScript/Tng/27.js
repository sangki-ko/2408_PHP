// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
let ARR2 = [...ARR1];
let resultSort = ARR2.sort((a, b) => a - b);

const Sort3 = [];

ARR2.forEach((val) => {
    // 이미 처리된 값이 아닌 경우에만 처리
    if(!Sort3.includes(val)) {
        // 처리한 값을 Sort3 배열에 추가
        Sort3.push(val);
    }
});

console.log(Sort3);

console.log(resultSort);
console.log(ARR1);


// 짝수와 홀수를 분리해서 각가 새로운 배열 만들어 주세요.
let arrFilter = [5, 7, 3, 4, 5, 1, 2];
let resultFilter = arrFilter.filter(num => num % 2 === 0);
resultFilter.sort((a, b) => a - b);
let resultFilter2 = arrFilter.filter(num => num % 2 === 1);
resultFilter2.sort((a, b) => a - b);

console.log(resultFilter);
console.log(resultFilter2);