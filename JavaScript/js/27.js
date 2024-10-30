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

// pop()
// 원본 배열의 마지막 요소를 제거하고 제거된 요소를 반환

const ARR_POP = [1, 2, 3, 4, 5];
let result_pop = ARR_POP.pop();

console.log(result_pop);

// unshift()
// 원본 배열의 첫번째 요소를 추가, 변경된 length를 반환, 원본 변경이 된다.

const ARR_UNSHIFT = [1, 2, 3];
let result_unshift = ARR_UNSHIFT.unshift(100);
console.log(result_unshift);

// shift()
// 원본 배열의 첫 번째 요소를 제거하는 method, 제거된 요소를 반환, 원본 변경이 된다.
// 제거할 요소가 없으면 undefind를 반환

const ARR_SHIFT = [1, 2., 3, 4];
let result_shift = ARR_SHIFT.shift();
console.log(result_shift);

// splice()
// 요소를 잘라서 자른 배열을 반환, 원본 변경이 된다.
// 방 번호 기준으로 자른다.
let arrSplice = [1, 2, 3, 4, 5];
let resultSplice = arrSplice.splice(-3);
console.log(resultSplice);
// start, count 를 모드 셋팅할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice - arrSplice.splice(1, 2);
console.log(resultSplice);4
// 배열의 특정 위치에 새로운 요소를 추가
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 0, 999/* 여러개도 추가 가능하다. */);
// 배열에서 특정요소를 새로운 요소로 변경
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 1, 999);

// join()
// 배열의 요소들을 특정 구분자로 연결한 문자열을 반환
let arrJoin = [1, 2, 3, 4, 5];
let resultJoin = arrJoin.join(', ');
console.log(resultJoin);

// sort()
// 배열의 요소를 오름차순으로 정렬
// 파라미터를 전달하지 않을 경우에, 문자열로 변환 후에 정렬
let arrSort = [5, 6, 7, 3, 2, 100, 20];
// let resultSort = arrSort.sort();
// console.log(resultSort);

let resultSort = arrSort.sort((a, b) => a - b);
// (a, b) => a - b : a와 b를 서로 뺀 후에 음수면 자리를 바꾸지 않고 양수로 나오면 자리를 바꿈 그 작업을 계속 진행해서 정렬이 되는 방식
console.log(resultSort);
console.log(arrSort);

// map()
// 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후, 그 결과를 새로운 배열로 반환
let arrMap = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultMap = arrMap.map(num => {
    if(num % 3 === 0) {
        return '짝';
    }else {
        return num;
    }
});
console.log(resultMap);

function myCallBack(a, b) {
    return a + b;
}

function test(callback, flg) {
    if(flg) {
        console.log(callback());
    }else {
        console.log('콜백 미실행');
    }
}

const TEST = {
    entity: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    ,length: 10
    ,map: function (callback) {
        let resultArr = [];

        for(let i = 0; i < this.entity.length; i++) {
            resultArr[resultArr.length] = callback(this.entity[i]);
        }
        return resultArr;
    }
}

// filter()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고, 조건에 만족한 요소만 모아 배열로 반환한다.
let arrFilter = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultFilter = arrFilter.filter(num => num % 2 === 0);
let resultFilter2 = arrFilter.filter(num => num % 2 === 1);

// some()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고, 
// 조건에 만족하는 결과가 하나라도 있으면 true,
// 조건에 만족하는 결과가 하나도 없으면 false
let arrSome = [1, 2, 3, 4, 5];
// 5라는 값이 있는지 확인
let resultSome = arrSome.some(num => num === 5);
console.log(resultSome);

// every()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고,
// 조건에 모든 결과가 만족하면 true,
// 하나라도 만족하지 않으면 false
let arrEvery = [1, 2, 3, 4, 5];
let resultEvery = arrEvery.every(num => num != 6);
console.log(resultEvery);

// forEach()
// 배열에 모든 요소에 대해 콜백 함수를 반복 실행하는 메소드
// PHP의 foreach와 똑같다.
let arrForeach = [1, 2, 3, 4, 5, 6, 7];
let resultForeach = arrForeach.forEach((val, key) => {
    // console.log(key + ' : ' + val);
    console.log(`${key} : ${val}`);
});

