// length : 문자열의 길이를 반환
let str1 = '문자열입니다.문자열입니다.';
console.log(str1.length);

// charAt(idx) : 해당 인덱스의 문자를 반환
console.log(str1.charAt(2));

// indexOF() : 문자열에서 해당 문자열을 찾아 최초으 인덱스를 반환
// 해당 문자열이 없으면 -1 return
console.log(str1.indexOf('자열'));
console.log(str1.indexOf('자열', 5));

// includes() : 문자열에서 해당 문자열의 존재여부 체크
let test = 'i am ironman';
test.includes('ir'); // true

// replace() : 특정 문자열을 찾아서 첫 번째 문자열만 문자열로 치환한 문자열을 반환
// 치환하다 => 바꾸어 놓다 라는 뜻
let str = '문자열입니다.문자열입니다.';
console.log(str.replace('문자열', 'PHP'));

// replaceAll() : 특정 문자열을 찾아서 모두 지정한 문자열로 치환한 문자열을 반환
// 해당 문자열을 지울 수도 있다. str.replaceAll('변경할 문자열', '변경될 문자열');
// 빈 문자열로 넣을 시 변경할 문자열을 비워줄 수 있다.
console.log(str.replaceAll('문자열', 'PHP'));

// substring(strat(시작 값), end(종료 값)) : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
// substring(1, 3) : 인덱스 1번부터 3번 전까지 삭제하는 작업
// 예) 문자열입니다. 에서 1번인 자부터 시작 3번인 입 전까지 잘라서 "자열"만 출력이 된다.
// !주의 : 비슷한 기능으로 string.substr()이 있으나 비표준이므로 사용을 지양한다.
// 예) str.substr
str = '문자열입니다.문자열입니다.';
console.log(str.substring(1, 3));

// end를 적어주지 않으면 start 지점에서부터 쭉 잘라서 반환
str = 'bearer: 34jkagodfsgasdasd1';
console.log(str.substring(8));

// split(separator, limit) : 문자열을 separator 기준으로 잘라서 배열로 만들어 반환  
// limit를 지정해주면 배열의 길이를 제한할 수 있다. (일반적으론 잘 사용하진 않는다.)
str = '짜장면,탕수육,라조기,짬뽕,볶음밥';
let arrSplit = str.split(',', 2);
console.log(arrSplit);

// trim() : 좌우 공백 제거해서 반환
str = '    오오오 배고프다    ';
console.log(str.trim());

// toUpperCase(), toLowerCase() : 알파벳을 대 / 소문자로 변환해서 반환
str = 'aBcDeFg';
console.log(str.toUpperCase()); // 대문자로 변환
console.log(str.toLowerCase()); // 소문자로 변환

// `` : 자바스크립트에선 +를 이용해 문자열을 연결하는데, ``를 사용하면 +를 생략하고 연결할 수 있다. 단, 변수를 불러와 사용할 때 ${변수명}으로 작성
let str3 = `나나나나나나나${str}`;
console.log(str3);
