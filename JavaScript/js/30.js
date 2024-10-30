// -----------
// date 객체
// -----------
const dayToKorean = (day) => {
    // 요일을 한글로 바꾸는 법
    const ARR_DAY = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
    return ARR_DAY[day];

    // switch(day) {
    //     case 0:
    //         return '일요일';
    //         break;
    //     case 1:
    //         return '월요일';
    //         break;
    //     case 2:
    //         return '화요일';
    //         break;
    //     case 3:
    //         return '수요일';
    //         break;
    //     case 4:
    //         return '목요일';
    //         break;
    //     case 5:
    //         return '금요일';
    //         break;
    //     case 6:
    //         return '토요일';
    //         break;
    // }
}

const addLpadZero = (num, length) => {
    return String(num).padStart(length, '0');
}

// 현재 날짜 및 시간 획득
const NOW = new Date(); // Tue Oct 29 2024 11:35:34 GMT+0900 (한국 표준시) 형태로 나옴

// getFullYear() : 연도만 가져오는 메소드 형식 : (YYYY)
const YEAR = NOW.getFullYear();

// getMonth() : 월을 가져오는 메소드, 0 ~ 11 반환 0부터 시작하기 때문에 + 1을 해줘야 함
const MONTH = addLpadZero(NOW.getMonth() + 1, 2);

// getdate() : 일을 가져오는 메소드
const DATE = addLpadZero(NOW.getDate(), 2);

// getHours() : 시를 가져오는 메소드
const HOURS = addLpadZero(NOW.getHours(), 2);

// getMinutes() : 분을 가져오는 메소드
const MINUTES = addLpadZero(NOW.getMinutes(), 2);

// getSeconds() : 초를 가져오는 메소드
const SECONDS = addLpadZero(NOW.getSeconds(), 2);

// getMilliseconds() : 미리 초를 가져오는 메소드
const MILLISECONDS = addLpadZero(NOW.getMilliseconds(), 3);

// getDay() : 요일을 가져오는 메소드, 0(일) ~ 6(토) 리턴
const DAY = NOW.getDay();

const DAYKOREA = dayToKorean(DAY);

const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOURS}:${MINUTES}:${SECONDS}.${MILLISECONDS}, ${DAYKOREA}`;

console.log(FOMAT_DATE);

FOMAT_DATE.padStart(2, '0');

// getTIme() : UNIX Tiemstamp를 반환, 1971년부터 시간이 몇 초가 흘렀는지 시간을 반환 (자바스크립트는 미리초 단위)
console.log(NOW.getTime());

// 두 날짜의 차를 구하는 방법
const TAGET_DATE = new Date('2025-03-13 18:10:00');
const IF_DATE = Math.floor(Math.abs(NOW - TAGET_DATE) / 86400000);
// 1000 * 60 * 60 * 24 = 86400000

// 2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇개월 후 입니까?
const DATE1 = new Date('2024-01-01 13:00:00');
const DATE2 = new Date('2025-05-30');
const IFF_DATE = Math.floor(Math.abs(DATE1 - DATE2) / 86400000);
const IFFF_DATE = Math.floor(IFF_DATE / 30);



