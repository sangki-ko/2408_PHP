(() => {
    document.querySelectorAll('.my-btn-detail').forEach(node => {
        node.addEventListener('click', e => {
            const URL = '/boards/detail?b_id=' + e.target.value;
            
            axios.get(URL)
            .then(response => {
                const TITLE = document.querySelector('#modal-title');
                const CONTENT = document.querySelector('#modal-content');
                const IMG = document.querySelector('#modal-img');
                const NAME = document.querySelector('#modal-name');
                TITLE.textContent = response.data.b_title;
                CONTENT.textContent = response.data.b_content;
                IMG.setAttribute('src', response.data.b_img); 
                NAME.textContent = response.data.u_name;
            })
            .then()
            .catch(error => {
                console.error(error);
            });
        })
    })
    
    document.querySelector('#btnInsert').addEventListener('click', () => {
        window.location = '/boards/insert';
    })
})();