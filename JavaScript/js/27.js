// ------------------
// 배열
// ------------------
// 이터러블 객체

const ARR1 = [1, 2, "asdasdsad"];

ARR1[0];

// 배열의 새로운 요소 추가
ARR1.push(100);

// 배열 길이 획득
console.log(ARR1.length);

// isArray()
// 배열인지 아닌지 체크
console.log(Array.isArray(ARR1)); // true
console.log(Array.isArray(1)); // false


