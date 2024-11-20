<template>
	<img src="./assets/logo.png" alt="Vue logo">
	<h1 style="font-size: 200px;">{{ count }}</h1>
	<button class="btn-size" @click="store.commit('board/addCount' /* 앞에는 모듈명 뒤에는 메소드 명 */)">증가</button>
	<BoardListComponent />
	</template>
<script setup>
	import { computed, ref } from 'vue';
	import { useStore } from 'vuex';
	import BoardListComponent from './components/BoardListComponent.vue';
// 뷰 X 라는 라이브러리가 있는데 인스톨을 하는 명령어 : npm install vuex@next
	const store = useStore();

// 반응형 데이터로 다루기 위해 computed 이용
	const count = computed(() => store.state.board.count);

	const fontColor = ref("");

	function changefontColorBlue() {
	fontColor.value = 'blue';
	}
	function changefontColorRed() {
	fontColor.value = 'red';
	}

	setInterval(() => {
	changefontColorBlue();
	setInterval(() => {
	changefontColorRed();
	}, 500);
	}, 500);



	// setInterval(() => {
	// flgShow.value = !flgShow.value
	// if(flgShow.value === true) {
	// changefontColorBlue();
	// }else if(flgShow.value === false) {
	// changefontColorRed();
	// }
	// }, 500);

</script>
<style>
	#app {
	font-family: Avenir, Helvetica, Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-align: center;
	color: #2C3E50;
	}

	.btn-size {
	width: 800px;
	height: 100px;
	cursor: pointer;
	background-color: red;
	border: none;
	color: white;
	font-size: 70px;
	margin-bottom: 50px;
	}

	.background-black {
	background-color: black;
	color: white;
	}

	.blue {
	color: blue;
	}

	.red {
	color: red;
	}
</style>