(() => {
    document.querySelectorAll('.my-btn-detail').forEach(node => {
        node.addEventListener('click', e => {
            const url = '/boards/' + e.target.value;
           
            axios.get(url)
            .then(response => {
                const modalTitle = document.querySelector('#modalTitle');
                const modalContent = document.querySelector('#modalContent');
                const modalCreatedAt = document.querySelector('#modalCreatedAt');
                const modalImg = document.querySelector('#modalImg');
                const modalDeleteParent = document.querySelector('#modalDeleteParent');

                modalTitle.textContent = response.data.b_title;
                modalContent.textContent = response.data.b_content;
                modalCreatedAt.textContent = response.data.created_at;
                modalImg.setAttribute('src', response.data.b_img);

                modalDeleteParent.textContent = '';

                if(response.data.delete_flg) {
                    const newBtn = document.createElement('button');
                    
                    newBtn.textContent = '삭제';
                    newBtn.setAttribute('type', 'button');
                    newBtn.setAttribute('class', "btn btn-warning");
                    newBtn.setAttribute('onclick', `boardDestroy(${e.target.value})`)
                    newBtn.setAttribute('data-bs-dismiss','modal');

                    modalDeleteParent.appendChild(newBtn);
                    
                }
            })
            .catch(error => {
                console.error(error);
            });
            
        });
    });
})();

function redirectInsert($type) {
    window.location = '/boards/create?bc_type=' + $type;
}

function boardDestroy($id) {
    const url = '/boards/' + $id;

    axios.delete(url)
        .then(response => {
            if(response.data.success) {
                const deleteNode = document.querySelector('#card' + $id);
                deleteNode.remove();
            } else {
                alert('삭제 실패다');
            }
        })
        .catch(error => {
            console.log(error);
            alert('에러 발생');
        });

}
