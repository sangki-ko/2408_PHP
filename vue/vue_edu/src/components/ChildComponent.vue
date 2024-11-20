<template>
    <h1 class="blue">자식 컴포넌트(Child)</h1>
    <div v-for="item in props.data" :key="item">
        <span>{{ item.gender }}</span>
    </div>
    <p>{{ props.count }}</p>
    <!-- slot : 부모 요소 컨텐츠 안에 있는 내용들을 받아와 출력 부모 쪽에서 만든 그대로를 출력(변경은 안 됨) -->
    <slot></slot>
</template>

<script setup>
import { defineProps } from 'vue';
// defineProps는 뭔가 ? : 부모 요소에서 데이터를 정의 해놓은 걸 사용하기 위한 함수
// defineProps : 
// Araay 배열로써 데이터라는 걸 받겠다 라고 하셨는데, 배열이 아니라 다른 형태로도 받을 수 있는가 : 기존 데이터 형식으로만 받을 수 있다.
// props는 현업에선 자주 쓰이는 기능은 아니다.
const props = defineProps({
    'data': Array
    ,'count': Number
});
</script>
<style>
</style>
