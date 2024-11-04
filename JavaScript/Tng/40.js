const  BTN = document.querySelector('#div-btn');
BTN.addEventListener('click', () => {
    alert('안녕하세요.\n숨어있는 div를 찾아주세요.');
});

const secretContainer = document.querySelector('#secret_container');
secretContainer.addEventListener('mouseenter',dugndugn);

const secretDiv = document.querySelector('#secret_div');

let checkCount = 0;

secretDiv.addEventListener('click', () => {
    if(checkCount === 0 || checkCount % 2 == 0) {
        alert('들켰다.');
        secretContainer.removeEventListener('mouseenter', dugndugn);
        checkCount++;
    }else {
        alert('숨었다.');
        secretContainer.addEventListener('mouseenter',dugndugn);
        checkCount++;
    }
    secretDiv.classList.toggle('secret_div');
});

function dugndugn() {
    alert('두근두근');
}


