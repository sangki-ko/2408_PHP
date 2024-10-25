// ----------
// 함수 선언식
// 호이스팅에 영향 받는다.
// 재할당 가능하므로 함수명 중복 안 되게 조심해야 함
// 앞에 파일명을 넣어주던가, 최대한 중복되지 않게 사전에 결정을 해둔다.
// ----------
console.log(mySum(10, 5));

function mySum(a, b) {
    return(a * b);
}


// ------------
// 함수 표현식
// 호이스팅에 영향을 받지 않는다.
// 재할당을 방지 할 수 있다.
// ------------
const myPlus = function(a, b) /* : 익명 함수 */ {
    return(a + b);
}

console.log(myPlus(2, 4));

// --------------
// 화살표(arrow) 함수
// --------------
// 파라미터가 2개 이상일 경우
const arrowFnc = (a, b) => a + b;

// 파라미터가 1개일 경우
const arrowFnc2 = a => a;

// 파라미터가 없는 경우
const arrowFnc3 = () => 'test';

// 처리가 여러줄일 경우

const arrowFnc4 = (a, b) => {
        if(a < b) {
            return 'B가 더 큼';
        }else {
            return 'a가 더 큼';
        }
}

function test4(a, b) {
    if(a < b) {
        return 'B가 더 큼';
    }else {
        return 'a가 더 큼';
    }
}

test [
    
]

