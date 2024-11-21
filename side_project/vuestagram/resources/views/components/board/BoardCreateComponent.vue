<template>
    <div class="form-box">
        <h3 class="form-title">글 작성</h3>
        <img src="">
        <textarea name="content" placeholder="내용을 입력해주세요." maxlength="200"></textarea>
        <!-- accept : 사용자가 파일 선택 창을 열면, 이미지 파일(예: JPG, PNG, GIF 등)만 선택할 수 있습니다. -->
        <input type="file" name="file" accept="image/*">
        <button class="btn-bg-black btn-submit">작성</button>
        <button @click="$router.back()" class="btn-bg-black btn-submit">취소</button>
    </div>
</template>

<script setup>

</script>

<style>
@import url(../../../css/boardList.css);
</style>