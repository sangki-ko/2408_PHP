// 기본 형태
export default {
    // namespace : 모듈을 여러 개 만들 때 그 모듈들끼리 중복된 메소드나 데이터 명이 있다면 해당 모듈을 경로를 지정해서 처리할 수 있다.
    // 무조건 true로 주고 한다. 주지 않으면 지정되지 않은 상태라 에러가 뜰 확률이 높다.
    namespaced: true, // 모듈화 된 스토어의 네임스페이스 활성화
    state: () => ({
        // 데이터가 저장되는 영역
        count: 0,
        products: [
            {productName: '바지', productPrice: 38000, productContent: '매우 아름다운 바지'},
            {productName: '티셔츠', productPrice: 25000, productContent: '매우 아름다운 티셔츠'},
            {productName: '양말', productPrice: 39999, productContent: '매우 비싼 양말'},
        ],
        detailProduct: {productName: '', productPrice: 0, productContent: ''}
    }),
    mutations: {
        // state의 저장해둔 데이터를 수정할 수 있는 메소드들을 정의하는 영역
        addCount(state) {
            state.count++;
        },
        setDetailProduct(state, item) {
            state.detailProduct = item;
        }
    },
    actions: {
        // 비동기성 비지니스 로직 함수를 정의하는 영역
        // 비동기성이 뭔가 ? : 작업을 동시에 실행하는 방식을 의미합니다.
    },
    getters: {},
        // 데이터를 가져오는데 원본을 보존하나 다른 값을 가지고 오고 싶을 때 사용
        // 추가 처리를 하여 state의 데이터를 획득 하기 위해 함수들을 정의하는 영역
}