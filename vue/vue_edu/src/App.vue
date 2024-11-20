<template>
    <!-- Component Event -->
    <!-- 자식 쪽에 전달하는 압법 -->
    <EventComponent
    :count = 'cnt'
    @eventAddCnt = "addCnt"
    @eventAddCntParam = 'addCntParam'
    @eventAddCntReset = 'addCntReset'
     />
    <p>부모쪽 cnt : {{ cnt }}</p>

    <hr>

    <!-- Child 자식 컴포넌트 호출 -->
    <ChildComponent
    :data = "data"
    :count = 'cnt' >
    <!-- 컴포넌트 호출할 때 열고 닫아주면서 컨텐츠 안에 자식 요소에 보내줄 내용 적어준다. -->
    <h3 class="blue">부모쪽에서 작성한 것들</h3>
    <p>아아아아ㅏ아</p>
    </ChildComponent>
    <hr>

    <!-- 자식 컴포넌트 호출 -->
    <BoardComponent />
    <hr>

    <!-- 데이터 바인딩 : 스크립트와 요소와 연결을 시켜서 스크립트를 변경하면 template에 데이터를 동시에 변경하는 행위 -->

    <!-- 리스트 렌더링 -->
    <!-- v-for : 반복문 -->
    <!-- 단순 반복 -->
    <!-- <div v-for="val in 9" :key="val">
    <h2 v-if="val >= 2">*** {{ val }}단 ***</h2>
    <div v-for="val2 in 9" :key="val2">
    <h3 v-if="val >= 2">{{ val }} X {{ val2 }} = {{ val * val2 }}</h3>
    </div>
    </div> -->

    <!-- for 문을 이용한 데이터 반복문 (foreach) -->
    <div v-for="(item, key) in data" :key="item">
    <p>{{ `${key}번째 - ${item.name} - ${item.age}  - ${item.gender}` }}</p>
    </div>

    <!-- 조건부 렌더링 -->
    <!-- v-if : 조건에 따라 요소가 생기고 없어진다. -->
    <h1 v-if="cnt > 5">5보다 큽니다.</h1>
    <h1 v-else-if="cnt < 0">음수임</h1>
    <h1 v-else>나머지</h1>

    <!-- v-show -->
    <!-- v-show : 요소 자체는 남겨두고, display: none으로 화면 자체에서만 안 보이게 한다. -->
    <h1 v-show="flgShow" :class="ageBlue">브이 쇼</h1>
    <button @click="flgShow = !flgShow">브이쇼 토글</button>


    <h1>{{ cnt }}</h1>
    <button @click="addCnt">증가</button>
    <button @click="disCnt">감소</button>
    <hr>
    <!-- 클릭을 선언하고 아무 값을 넣지 않으면 에러가 난다 -->
    <!-- 뭔가를 생성하거나, 선언을 하면 무조건 사용해야 한다. 정의만 해두는 건 안 된다. -->
    <h2>이름 : {{ userInfo.name }}</h2>
    <button @click="changeName">이름 변경</button>
    <h2 :class="ageBlue">나이 : {{ userInfo.age }}</h2>
    <button @click="changeAge">나이 변경</button>
    <button @click="changeAgeBlue">나이 색상 변경</button>
    <h2>성별 : {{ userInfo.gender }}</h2>
    <button @click="changeGender">성별 변경</button>
    <hr>
    <!-- v-model : 양방향 데이터 바인딩을 해주는 역할-->
    <!-- 양방향 데티어 바인딩 : 입력과 동시에 해당 변수에 값이 변경 출력도 동시에 가능하다. -->
    <input type="text" name="gender" v-model="transGender">
    <button @click="userInfo.gender = transGender">성별 변경</button>
    <p>{{ transGender }}</p>

</template>
<!-- components : 데이터를 다루는 영역이 없기 때문에 우리가 사용할 수 있는 디자인 패턴은 MVMM -->

<script setup>
// ref를 사용하려면 어디서 가져와야 하는데 가져오는 행위를 하는 문법

// import : php로 따지면 require_once와 같은 것
import BoardComponent from './components/BoardComponent.vue';
import ChildComponent from './components/ChildComponent.vue';
import EventComponent from './components/EventComponent.vue';
import { reactive, ref } from 'vue';


const data = reactive([
    {name: '홍길동', age: 20, gender: '남자'}
    ,{name: '김영희', age: 12, gender: '여자'}
    ,{name: '둘리', age: 41, gender: '수컷'}
]);

const flgShow = ref(true);

const transGender = ref('');

// -------------------------

// (() => {
//     setInterval(() => {
//       flgShow.value = !flgShow.value
//       if(flgShow.value === true) {
//         changeAgeBlue();
//       }else if(flgShow.value === false) {
//         changeAgeRed();
//       }
//     }, 1000);
// })();

// 카운트에 저장된 값이 화면에 추가
// 데이터 바인딩으로 사용하려면 ref를 선언해줘야 한다.

const ageBlue = ref();

const cnt = ref(0);

function changeAgeBlue() {
  ageBlue.value = 'blue';
}
function changeAgeRed() {
  ageBlue.value = 'red';
}

const userInfo = reactive({
  name: '홍길동',
  age: 20,
  gender: 'undefind'
});

function addCntParam(num) {
    cnt.value += num;
}

function addCntReset() {
    cnt.value = 0;
}

// ref 객체에 value라는 프로파티에 저장
// ref 객체를 저장한 cnt안에 value를 가져와야한다.
function addCnt() {
    cnt.value++;
    if(cnt.value % 2 == 0) {
      changeAgeBlue();
    }else {
      changeAgeRed();
    }
}

const disCnt = () => {
  cnt.value--;
}

function changeName() {
  userInfo.name = '갑순이';
}
function changeAge() {
  userInfo.age = 60;
}
function changeGender() {
  userInfo.gender = 'M';
}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.blue {
  color: blue;
}

.red {
  color: red;
}
</style>
