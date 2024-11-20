<template>
    <div class="form-box">
        <h3 class="form-title">회원가입</h3>
        <input type="text" name="account" placeholder="아이디" autocomplete="off">
        <!-- autocomplete 한 번 적었던 거 다시 사용하는 속성 off로 설정 -->
        <input type="password" name="password" placeholder="비밀번호" autocomplete="off">
        <input type="password" name="password_chk" placeholder="비밀번호 확인" autocomplete="off">
        <input type="text" name="name" placeholder="이름" autocomplete="off">
        <div class="radio-box">
            <div>
                <label for="male">남자</label>
                <input type="radio" name="gender" id="male" value="0">
            </div>
            <div>
                <label for="female">여자</label>
                <input type="radio" name="gender" id="female" value="1">
            </div>
            <div>
                <label for="none">사람이 아님</label>
                <input type="radio" name="gender" id="none" value="2">
            </div>
        </div>
            <input type="file" name="profile" accept="image/*">
            <hr>
            <!-- $router.push('/login'), $router.replace('/login')(이력을 남기지 않음) : 다른 페이지로 이동하는 하나의 방법 -->
            <button @click="$router.back()" class="btn btn-submit btn-bg-black">회원가입</button>
            <button @click="$router.back()" class="btn btn-submit btn-bg-black">취소</button>
    </div>
</template>

<script setup>

</script>

<style>
    
</style>