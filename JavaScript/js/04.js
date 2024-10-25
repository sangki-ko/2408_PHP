console.log('외부파일');


// 변수 (총 3가지 방법 사용)
// var, let, const를 넣지 않고 변수를 선언하면 디폴트 값으로 var가 선언된다.

// 1. var : 중복 선언이 가능하며 재할당 가능, 함수레벨 스코프
var num1 = 1; // 최초 선언
var num1 = 2; // 중복 선언
num1 = 3; // 재할당

// 2. let : 중복 선언이 불가능하며 재할당 가능, 블록레벨 스코프
let num2 = 2; // 최초 선언
// let num2 = 3; // 중복 선언, 불가능
num2 = 4; // 재할당

// 3. const : 중복 선언이 불가능하며 재할당 불가능, 블록레벨 스코프, !상수 : 변하지 않는 변수
const NUM3 = 3;
// NUM3 = 4; // 재할당, 불가능

// --------------------------
// 스코프
// --------------------------
// 변수나 함수가 유효한 범위
// 전역, 지역, 블록 3가지의 스코프

// 전역 레벨 스코프
let globalScope = '전역이다.';

function myPrint() {
    console.log(globalScope);
}

// 지역 레벨 스코프
function myLocalPrint() {
    let localScope = "마이 로컬 프린트 지역";
    console.log(localScope);
}

// 블록레벨 스코프
function myBlock() {
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1);
    console.log(test2);
    console.log(TEST3);
}

// ------------
// 호이스팅 : 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는 것
// ------------
// 미리 메모리 공간 자체를 만들어 놓는다.

// var test; 라고 선언을 하면 호이스팅 처리로 test라는 
// 변수에 방이 미리 만들어져 있어서 선언하기 전에 값을 찾아도 에러가 뜨는게 아닌 값이 비어있다 라는 문구가 뜬다.
// ㅍar를 쓰지 않으면 이런 문제가 발생하지 않는다.

// 변수 선언 : 메모리에 올라가서 값이 저장이되며, 우리가 가져와서 사용함
// let test = 'aaa';

console.log(test);
test = 'aaa';
console.log(test);
var test;

// ----------
// 데이터 타입
// ----------

// number : 숫자(정수)
let num = 1;

// string : 문자열
let str = 'test';

// boolean : 논리 (true or false)
let boll = true;

// NULL : 존재하지 않는 값
let letNull = null;

// undefined : 값이 할당 되지 않은 상태 (빈 값)
let letUndefined;

// Symbol : 고유하고 변경이 불가능한 값 (쓸 일이 많지 않음)
let symbol1 = Symbol('aaa');
let symbol2 = Symbol('aaa');

// object : 객체, 키와 값이 쌍으로 이루어진 복합 데이터 타입

let obj = {
    'key1' : 'val1'
    ,'key2' : 'val2'
}



