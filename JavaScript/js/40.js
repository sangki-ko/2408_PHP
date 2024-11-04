// 함수 선언식
// 호이스팅 : 소스코드를 실행하기 전에 한 번 읽어서 변수나 함수 등 미리 메모리에 올려놓는 작업

// inlineEvent 방식
// 되도록이면 잘 사용하지 않는다.
function inlineEventBtn() {
    alert('무한루프');

}


// 특정 함수 안에서만 사용하는 변수는 함수 안에서 지정을 해준다.
function h1ColorChange() {
    const TITLE = document.querySelector('h1');
    TITLE.classList.add('title-click2');
}

// addEventListner
// inlineEvent를 잘 사용하진 않고 addEventListner만 사용하는 추세다.
// BTN_LISTENER.addEventListener(어떤 이벤트를 넣을지, 실행할 함수);
// 동일한 이벤트들을 선언할 수는 있다. (잘 사용하진 않음, 개발 스타일에 따라)
const BTN_LISTENER = document.querySelector('#btn1');
BTN_LISTENER.addEventListener('click', callAlert);



// // 함수 표현식
// // 호이스팅이 적용이 안 됨
// const inlineEvent = () => {

// }

const BTN_TOGGLE = document.querySelector('#btn_toggle');

function callAlert() {
    alert('이벤트 리스너 실행');
}

BTN_TOGGLE.addEventListener('click', () => {
    const TITLE = document.querySelector('h1');
    TITLE.classList.toggle('title-click');
});

// removeEventListener()
// DOM의 추가된 이벤트를 삭제하는 메소드
// 삭제할 이벤트, 이벤트를 동작시키는 함수를 동일하게 작성 (익명 함수 금지)
BTN_LISTENER.removeEventListener('click', callAlert);

const TITLE_TEST = document.querySelector('h2');
TITLE_TEST.addEventListener('click', callAlert2);

function callAlert2() {
    alert('테스트용');
    // TITLE_TEST.removeEventListener('click', callAlert2);
}

const TITLE = document.querySelector('h1');

// moussenter : 특정 요소에 마우스를 갖다 댔을 때 처리
// 삭제로 처리 방법
// TITLE.addEventListener('mouseenter', () => {
//     TITLE_TEST.removeEventListener('click', callAlert2);
// })

// 이벤트를 한 번만 실행시키는 로직 (삭제 외에 방법)
TITLE.addEventListener(
    'mouseenter'
    ,() => {
    TITLE_TEST.removeEventListener('click', callAlert2);}
    ,{once: true} // option : once가 true일 경우 한 번만 실행
);

// 이벤트 객체
const H3 = document.querySelector('h3');

// 자바스크립트에서 자동으로 e의 이벤트 객체를 담아줌
H3.addEventListener('mouseup', (e) => {
    // console.log(e);
    e.target.style.color = 'red';
});
H3.addEventListener('mousedown', (e) => {
    // console.log(e);
    e.target.style.color = 'green';
});
H3.addEventListener('mouseenter', (e) => {
    e.target.style.color = 'blue';
});
H3.addEventListener('mouseleave', (e) => {
    e.target.style.color = 'orange';
});

// modal
// 특정 행동을 했을 때 화면에 표시
const BTN_MODAL = document.querySelector('#btn_modal');
BTN_MODAL.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
});

const BTN_MODAL_CLOSE = document.querySelector('#btn_modal_close');
BTN_MODAL_CLOSE.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
})

// 팝업
// width, height를 지정해주면 px 단위로 설정된다.
// 새로운 창을 열려면 open이라는 메소드를 사용하면 된다.
const NAVER = document.querySelector('#naver');
NAVER.addEventListener('click', () => {
    open('https://www.naver.com', '__blank');
})



