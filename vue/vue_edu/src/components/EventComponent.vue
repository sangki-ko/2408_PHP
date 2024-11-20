<template>
    <p>자식쪽 cnt : {{ props.cnt }}</p>
    <button @click="$emit('eventAddCnt')">자식쪽 증가</button>
    <button @click="$emit('eventAddCntParam', 3)">자식 쪽에서 증가</button>
    <button @click="$emit('addCntReset')">자식 쪽 초기화</button>
</template>
<script setup>
    import { defineProps } from 'vue';
    const props =  defineProps({
        'cnt': Number
    });
</script>
<style>
    
</style>