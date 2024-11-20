<template>
    <div class="user-info-box">
        <img src="/profile/루피.jfif" alt="">
        <div class="user-info-content">
            <h2>유저 아이디</h2>
            <h3>작성글 수 : 999</h3>
        </div>
        <router-link to="/board/create"><button class="btn btn-submit btn-bg-black">글작성</button></router-link>
    </div>
</template>

<script setup>

</script>

<style>
@import url('../../../css/userInfo.css');
</style>