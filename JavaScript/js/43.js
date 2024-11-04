const BTN_CALL = document.querySelector('#btn_call');
BTN_CALL.addEventListener('click', getList);

function getList() {
    const URL = document.querySelector('#url').value;

    // GET
    // .으로 인해서 연결을 하는 걸 체이닝 메소드라고 부른다.
    // 정상적으로 처리를 완료 했을 때 then으로, 정삭적으로 처리를 하지 못 했을 때 catch로 넘어가게 된다.

    // 백엔드 쪽에선 해당 url의 필요한 데이터들을 미리 준비한 뒤 프론트에서 url을 보내면 미리 준비한 데이터들을 발송?
    // 간단하게 하면 맞다.

    axios.get(URL)
    // then : 작업이 성공한 상태
    // then(콜백함수)
    .then(response => {
        response.data.forEach(val => {
            // console.log(val.download_url);
            const NEW = document.createElement('img');
            NEW.setAttribute('src', val.download_url);
            NEW.style.width = '200px';
            NEW.style.height = '200px';

            document.querySelector('.container').appendChild(NEW);
        });
    })
    // catch : 작업을 실패한 상태
    .catch(error => {
        console.log(error);
    });
}