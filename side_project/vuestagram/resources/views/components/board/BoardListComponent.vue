<template>
    <!-- 리스트 출력 -->
    <div class="board-list-box">
        <div v-for="item in boardList" :key="item" @click="openModal" class="item">
            <img :src="item.img" alt="">
        </div>
    </div>

    <!-- 상세 모달 출력 -->
    <div v-show="modalFlg" class="board-detail-box">
        <div class="item">
            <img src="/img/화난루피.jfif" alt="">
            <hr>
            <p>내용내용</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : 김아무개</span>
                <button @click="closeModal">닫기</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const boardList = computed(() => store.state.board.boardList);

// 비포 마운트 처리
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1) {
        store.dispatch('board/getBoardListPagenation');
    }
});





// ------------
// 모달 관련
const modalFlg = ref(false);
const openModal = () => {
    modalFlg.value = true;
}
const closeModal = () => {
    modalFlg.value = false;
}

</script>

<style>
@import url('../../../css/boardList.css');
</style>