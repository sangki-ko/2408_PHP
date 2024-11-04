// 타이머 함수
// ----------

// setTimeout(callback, ms) : 일정 시간이 흐른 후에 콜백 함수를 실행
setTimeout(() => {
    console.log('시간 초과');
}, 5000);

// 각각의 0.03초 시간 차이가 있음
// 동시 처리 가능하며 이전 실행을 기다리지 않고 바로 처리 가능한 처리다.
// 이것을 비동기 처리라고 한다.

// C > B > A 순으로 출력
// setTimeout(() => console.log('A'), 1000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 3000);

// A > B > C 순으로 출력, 총 3초 소요
// 콜백 지옥
// setTimeout(() => {
//     // 첫 번째 실행
//     console.log('A');
//     // 두 번째 실행
//     setTimeout(() => {
//         console.log('B');
//         // 세 번째 실행
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 1000);
// }, 1000);

// setTimeout의 타이머ID를 받을 수 있다.
// clearTimeout(타이머ID) : 해당 타이머ID의 처리를 제거
// setTImeout은 아무 곳이나 적어도 상관없다. 단, 조절을 잘 해야한다.
// clearTimeout은 TIMER_ID라는 변수를 받아야 하기 때문에 setTimeout 선언 한 뒤 사용해야한다.
// const TIMER_ID = setTimeout(() => console.log('타이머'), 10);
// console.log(TIMER_ID);
// clearTimeout(2);

// // setinterval(callback, ms(몇 초마다)) : 일정 시간 마다 콜백함수를 실행
// const INTERVAL_ID = setInterval(() => {
//     console.log('인터벌');   
// }, 1000);

// // clearInterval(id) : 해당 id의 인터벌을 제거
// clearInterval(INTERVAL_ID);
// setTimeout(() => clearInterval(INTERVAL_ID), 10000);

const H1 = document.createElement('h1');
const H2 = document.createElement('h2');
H1.textContent = '두둥등장';

H1.classList.add('toggle');
H1.style.fontSize = '300px';

document.body.appendChild(H1);

setInterval(() => {
        H1.classList.toggle('toggle1');
    }, 200);