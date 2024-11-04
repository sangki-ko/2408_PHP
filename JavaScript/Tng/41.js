
const addLpadZero = (num, length) => {
    return String(num).padStart(length, '0');
}

let period = null;

function DATE_NOW() {

    // 현재 날짜 및 시간 획득
    const NOW = new Date(); // Tue Oct 29 2024 11:35:34 GMT+0900 (한국 표준시) 형태로 나옴
    
    // getHours() : 시를 가져오는 메소드
    const HOURS = addLpadZero(NOW.getHours(), 2);
    period = HOURS >= 12 ? "오후" : "오전";
    let hours2 = HOURS > 13 ? HOURS - 12 : HOURS;

    
    // getMinutes() : 분을 가져오는 메소드
    const MINUTES = addLpadZero(NOW.getMinutes(), 2);
    
    // getSeconds() : 초를 가져오는 메소드
    const SECONDS = addLpadZero(NOW.getSeconds(), 2);
    
    const FOMAT_DATE = `${hours2}:${MINUTES}:${SECONDS}`;

    const NOW_WATCH = document.querySelector('.now_watch');
    NOW_WATCH.innerHTML = `현재 시간 ${period} ${FOMAT_DATE}`;
}

DATE_NOW();

let NOW_DATE = null;
NOW_DATE =  setInterval(() => {
    DATE_NOW();
}, 500);

const STOP_BTN = document.querySelector('.stop_btn');

STOP_BTN.addEventListener('click', () => {
        DATE_NOW(); 
        clearInterval(NOW_DATE);
        NOW_DATE = null;
});

const RESTART_BTN = document.querySelector('.restart_btn');

RESTART_BTN.addEventListener('click', () => {
    if(NOW_DATE === null) {
        DATE_NOW();
        NOW_DATE = setInterval(DATE_NOW, 500);
    }
});


// function leftPadZero(target, length) {
//     return String(target).padStart(length, 0);
// }

// function getDate() {
//     const NOW = new Date();
//     let hour = NOW.getHours(); // 시간 획득(24시 포멧)
//     let minute = NOW.getMinutes(); // 분 획득
//     let second = NOW.getSeconds(); // 초 획득

//     let ampm = hour < 12 ? '오전' : '오후'; // 오전 오후 획득

//     let hour12 = hour < 13 ? hour : hour - 12;

//     let timeFormat = 
//         `${ampm} ${leftPadZero(hour12, 2)} ${leftPadZero(minute, 2)} ${leftPadZero(second, 2)}`;

//     document.querySelector('#time').textContent = timeFormat;
    
// }

// let intervalId = setInterval(getDate, 500);

// // 멈춰 버튼
// document.querySelector('#btn-stop').addEventListener('click', () => {
//     clearInterval(intervalId);
// });

// // 재시작 버튼
// document.querySelector('$btn-restart').addEventListener('click', () => {
//     intervalId = setInterval(getDate, 500);
// });





