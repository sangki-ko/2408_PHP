// ---------
// 요소 선택
// ---------

// 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');

// TITLE.style.color = 'red';

// 태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');

H1[1].style.color = 'blue';

// 클래스 명으로 요소를 선택
const CLASS_NONE_LI = document.getElementsByClassName('none-li');

// CSS 선택자를 이용해서 요소를 선택
// querySelector : 연결하려는 요소가 여러 개일 경우 가장 첫 번째 것만 가져온다.
// querySelector을 많이 사용하는 편이다.
const SICK = document.querySelector('#sick');
const ALL_NONE_LI = document.querySelectorAll('.none-li');
const LI = document.querySelectorAll('li');
const NONE_LI = document.querySelector('.none-li');

LI.forEach((element, idx) => {
    if(idx % 2 === 0) {
        element.style.color = 'red';
    }else {
        element.style.color = 'blue';
    }
});

// ----------
// 요소 조작
// ----------
// textContent : 컨텐츠를 획득 또는 변경, 순수한 텍스트 데이터를 전달
// 다른 태그들을 넣어도 순수하게 텍스트만 들어간다.
TITLE.textContent = '라라라라라라라';

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a>하하하</a>';

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const A_LINK = document.querySelector('#title > a');
A_LINK.setAttribute('href', 'https://www.naver.com');

const INPUT = document.querySelector('#input-1');
// 다시 한 번 설정해도 전 값을 그대로 가지고 있는다.
INPUT.setAttribute('placeholder', '하하하하');
// INPUT.setAttribute('id', 'id');

// removeAttribute(속성명) : 해당 속성을 제거
A_LINK.removeAttribute('href');

document.querySelector('img').setAttribute('src', '../img/dog.jpg');

// --------------
// 요소의 스타일링
// --------------
// style : 인라인으로 스타일 추가
// TITLE.style.color = 'black';

// classList : 클래스로 스타일 추가 및 삭제를 하는 방법
// classList.add() : 해당 클래스 추가
TITLE.classList.add('룰루랄라', "랄라룰루");
// classList.remove() : 해당 클래스 제거
TITLE.classList.remove('룰루랄라');

// classList.toggle() : 해당 클래스를 on/off
TITLE.classList.toggle('toggle');

// setInterval(() => {
//     TITLE.classList.toggle('toggle');
// }, 300);

// ---------------
// 새로운 요소 생성
// ---------------
// createElement(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.textContent = '떡볶이';
NEW_LI.style.color = 'blue';

const FOODS = document.querySelector('#foods');

// appendChild(노드) : 해당 부모 노드에 마지막 자식으로 노드를 추가한다.
FOODS.appendChild(NEW_LI);

// removeChild(노드) : 해당 부모 노드의 자식 노드를 삭제
FOODS.removeChild(NEW_LI);

// html 코드에 body 전체를 가져옴
// => document.body();

// insertBefore(새로운노드, 기준이 되는 노드) : 해당 부모 노드의 자식인 기준 노드의 앞에 새로운 노드를 추가
FOODS.insertBefore(NEW_LI, SICK);