<template>
    <h1 @click="addCnt" style="width: 100%; font-size: 200px" :class="ageColor">{{ coin }}</h1>
    <hr>
    <input type="text" v-model="tel">
    <span :style="color">{{ msg }}</span>
</template>
<script setup>
import { ref, watch } from 'vue';

// Watchers
// 데이터는 오직 읽는 것만 가능하다.
const tel = ref('');
const msg = ref('X');
const color = ref('color: red');

// 첫 번째 파라미터 : 감시할 대상, 두 번째 파라미터 콜백함수
watch(tel, (val) => {
    const regex = /^[0-9]{10,11}$/
    if(!regex.test(val)) {
        msg.value = 'X';
        color.value = 'color: red';
    }else {
        msg.value = 'O';
        color.value = 'color: green';
    }
});

const coin = ref(0);

const addCnt = () => {
    coin.value++;
    if(coin.value % 2 === 0) {
        changeAgeBlue();
    }else {
        changeAgeRed();
    }
}
function changeAgeBlue() {
    ageColor.value = 'blue';
}
    function changeAgeRed() {
    ageColor.value = 'red';
}

const ageColor = ref('');

// setInterval(() => {
//     addCnt();
//     if (coin.value % 2 === 0) {
//         changeAgeBlue();
//     } else {
//         changeAgeRed();
//     }
// }, 50);

// function changeAgeBlue() {
//     ageColor.value = 'blue';
// }
// function changeAgeRed() {
//     ageColor.value = 'red';
// }
    

</script>
<style>
    .blue {
        color: blue;
        background-color: red;
    }
    .red {
        color: red;
        background-color: blue;
    }
</style>