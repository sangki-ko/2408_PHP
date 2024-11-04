// 즉시 실행 함수
// 딱 한 번만 실행할 경우, 초기에 세팅되어야 할게 있는 경우 사용
(() => {
    // 1. 버튼을 눌렀을 때 문구 출력
    const BTN_INFO = document.querySelector('#div-btn');
    BTN_INFO.addEventListener('click', () => {
        alert('안녕하세요.\n숨어있는 div를 찾아주세요.');
    });
    // 2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력
    // => '두근두근'
    const CONTAINER = document.querySelector('#secret_container');
    CONTAINER.addEventListener('mouseenter', dokidoki);

    // 3. 숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력
    // - 들켰다.
    const BOX = document.querySelector('#secret_div');
    BOX.addEventListener('click', busted);

    // 보너스 문제
    // 다시 숨을 때 랜덤한 위치로 이동
    const RANDOM_X = Math.round(Math.random() * (window.innerWidth - CONTAINER.offsetWidth));
    const RANDOM_Y = Math.round(Math.random() * (window.innerWidth - CONTAINER.offsetHeight));
    CONTAINER.style.top = RANDOM_Y + 'px';
    CONTAINER.style.left = RANDOM_X + 'px';
})()

// 두근두근 함수
function dokidoki() {
    alert('두근두근');
}

// 들켰다 함수
function busted() {
    alert('들켰다.');
    const CONTAINER = document.querySelector('#secret_container');
    const BOX = document.querySelector('#secret_div');

    BOX.removeEventListener('click', busted); // 기존 들켰다 이벤트 제거
    BOX.classList.add('secret_div'); // 배경색 부여
    CONTAINER.removeEventListener('mouseenter', dokidoki); // 기존 두근두근 삭제
}

// 숨는다 함수
function hide() {
    alert('숨는다');
    const CONTAIER = document.querySelector('#secret_container');
    const BOX = document.querySelector('#secret_div');

    BOX.classList.remove('secret_div');
    BOX.addEventListener('click', busted); // 들켰다 이벤트 추가
    BOX.removeEventListener('click', hide);

    CONTAIER.addEventListener('mouseenter', dokidoki);
}