// if문
let num = 1;


if(num === 1) {
    console.log('1등');
}else if(num === 2) {
    console.log('2등');
}else if(num === 3) {
    console.log('3등');
}else {
    console.log('꼴등');
}

// switch 문
switch(num) {
    case 1:
        console.log('1등');
        break;
    case 2:
        console.log('2등');
        break;
    default:
        console.log('꼴등');
        break;
}

// for문
for(let i = 1; i <= 9; i++) {
    console.log("** "+i+"단 **");
    for(let b = 1; b <= 9; b++) {
        let ib = i * b;
        console.log(i+"X"+b+"="+ib);
    }
}

for(let i = 1; i <= 9; i++) {
    for(b = 1; b <= i; b++) {
        console.log("*");
    }
    console.log("\n");
}

// for...in : 모든 객체를 반복하는 문법, key의 접근
const OBJ2 = {
    key1: 'val1',
    key2: 'val2',
    key3: 'val3'
}

for(let key in OBJ2) {
    console.log(OBJ2[key]);
}

// for ... of : 이터러블(iterable) 순서가 정해져있는 객체를 반복하는 문법, value에 접근
// length 라는 객체가 있으면 이터러블이다.
const STR1 = "안녕하세요루레이히";

for(let val of STR1) {
    console.log(val);
}





