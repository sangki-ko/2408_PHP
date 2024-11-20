<template >
    <!-- 돌 때마다 openDetailModal(item)안에 파라미터 값이 자동으로 담긴다. 우린 담긴 상태에서 함수를 실행시키고 실행시키면서 값을 볼 수 있다. -->
    <div class="background-black" v-for="item in products" :key="item">
        <h1 :class="fontColor" @click="openDetailModal(item)">{{ item.productName }}</h1>
        <h2 :class="fontColor">{{ item.productContent }}</h2>
        <h2 :class="fontColor">{{ item.productPrice }}원</h2>
    </div>

    <!-- 
    <div class="background-black" v-for="item in products" :key="item">
        item = productName: '바지', productPrice: 38000, productContent: '매우 아름다운 바지'
        <h1 :class="fontColor" @click="openDetailModal(item)">{{ item.productName }}</h1>
        <h2 :class="fontColor">{{ item.productContent }}</h2>
        <h2 :class="fontColor">{{ item.productPrice }}원</h2>
    </div>
        item = {productName: '티셔츠', productPrice: 25000, productContent: '매우 아름다운 티셔츠'},
    <div class="background-black" v-for="item in products" :key="item">
        <h1 :class="fontColor" @click="openDetailModal(item)">{{ item.productName }}</h1>
        <h2 :class="fontColor">{{ item.productContent }}</h2>
        <h2 :class="fontColor">{{ item.productPrice }}원</h2>
    </div>
        item =  {productName: '양말', productPrice: 39999, productContent: '매우 비싼 양말'},
    <div class="background-black" v-for="item in products" :key="item">
        <h1 :class="fontColor" @click="openDetailModal(item)">{{ item.productName }}</h1>
        <h2 :class="fontColor">{{ item.productContent }}</h2>
        <h2 :class="fontColor">{{ item.productPrice }}원</h2>
    </div>
    -->


    <!-- detail modal -->
    <Transition name="detailModalAnimation">
        <div @click="closeDetailModal" v-show="flgDetail" class="bg-modal-black">
            <div class="bg-modal-white">
                <h1>{{ detailProduct.productName }}</h1>
                <p>{{ detailProduct.productContent }}</p>
                <p>{{ detailProduct.productPrice }}원</p>
                <button class="toggleBtn" @click="closeDetailModal">닫아주면서</button>
            </div>
        </div>
    </Transition>
</template>
<script setup>
    import { computed, ref } from 'vue';
    import { useStore } from 'vuex';
    const store = useStore();
    const products = computed(() => store.state.board.products);

    // 상세 모달 제어
    const flgDetail = ref(false);
    const detailProduct = computed(() => store.state.board.detailProduct)

    const openDetailModal = (item) => {
        store.commit('board/setDetailProduct', item);
        flgDetail.value = true;
    }
    const closeDetailModal = () => {
        flgDetail.value = false;
    }
</script>
<style>
    .bg-modal-black {
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        top: 0;
        left: 0;
        cursor: pointer;
    }

    .bg-modal-white  {
        width: 80%;
        max-width: 800px;
        margin: 25px auto;
        padding: 20px;
        background-color: white;
        cursor: pointer;
    }

    .toggleBtn {
        border: none;
        border-radius: 50px;
        color: white;
        width: 100px;
        height: 100px;
        background-color: red;
        cursor: pointer;
    }

    /* -enter-from 은 고정이다. */
    .detailModalAnimation-enter-from {
        opacity: 0;
    }
    .detailModalAnimation-enter-active {
        transition: 1s ease;
    }
    .detailModalAnimation-enter-to {
        opacity: 1;
    }
    .detailModalAnimation-leave-from {
        transform: translateX(0px);
    }
    .detailModalAnimation-leave-active {
        transition: all 3s;
    }
    .detailModalAnimation-leave-to {
        transform: translateX(4000px);
    }
</style>