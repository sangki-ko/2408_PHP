import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../views/components/auth/LoginComponent.vue';
import BoardListComponent from '../views/components/board/BoardListComponent.vue'
import BoardCreateComponent from '../views/components/board/BoardCreateComponent.vue';
import UserRegistrationComponent from '../views/components/user/UserRegistrationComponent.vue';
import { useStore } from 'vuex';
import NotFoundComponent from '../views/components/NotFoundComponent.vue';

// to : 내가 이동할 path에 대한 정보를 다 가지고 있는 것
// from : 내가 이 라우터에 오기 전에 정보를 다 담고있다.
// next : 처리를 다 끝내고 다음 처리를 위해서 필요한 객체들을 담고있다,
const chkAuth = (to, from, next) => {
    const store = useStore();
    const authFlg = store.state.user.authFlg; // 로그인 여부 플레그
    const noAuthPassFlg = (to.path === '/' || to.path === '/login' || to.path === '/registration'); // 비 로그인 시 접근 가능 페이지 플레그

    if(authFlg && noAuthPassFlg) {
        // 인증된 유저가 비인증으로 이동할 수 있는 페이지에 접근할 경우 board로 이동
        next('/boards');
    }else if(!authFlg && !noAuthPassFlg) {
        // 인증이 되지 않은 유저가 비인증으로 접근할 수 없는 페이지에 접근할 경우 login으로 이동
        next('/login');
    }else {
        // 그 외는 접근 허용
        next();
    }
}

const routes = [
    {
        path: '/',
        redirect: '/login',
        beforeEnter: chkAuth,
    },
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards',
        component: BoardListComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards/create',
        component: BoardCreateComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/registration',
        component: UserRegistrationComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/:catchAll(.*)',
        component: NotFoundComponent,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;