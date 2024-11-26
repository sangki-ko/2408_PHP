import axios from "../../axios";
import router from '../../router';

export default {
    namespaced: true,
    state: () => ({
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
    }),
    mutations: {
        // setAccessToken(state, accessToken) {
        //     state.accessToken = accessToken;
        //     localStorage.setItem('accessToken', accessToken);
        // },
        setAuthFlg(state, flg) {
                state.authFlg = flg;
        },

        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        }
    },
    actions: {

        /**
        * 로그아웃 처리
        * @param {*} context
        */
        logout(context)  {
            // TODO : 백엔드 처리 추가
            const url = '/api/logout';
            const config = {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }

            axios.post(url, null, config)
            .then(resaponse => {
                alert('로그아웃이 완료되었습니다.')
            })
            .catch(error => {
                alert('문제가 발생하여 로그아웃 처리')
            })
            .finally(() => {
                // 로컬 스토리지 비우기
            localStorage.clear();

            // Auth 플레그 했던 거 지우기
            context.commit('setAuthFlg', false);
            context.commit('setUserInfo', {});

            router.replace('/login');
            });

        },


        // -----------------
        // 인증관련
        // -----------------
        /**
         * 로그인 처리
         * 
         * @param {*} context
         * @param {*} userInfo
         */
        // context : store 전체를 의미한다고 볼 수 있다.
        login(context, userInfo) {
            // 우리가 보내줄 url
            const url = '/api/login';
            // 우리가 받아온 userInfo 객체를 Json으로 시리얼라이징 해주는 작업4
            // Json 형태로 laravel에 데이터를 보내게되면 laravel request자체에서 사용할 수 있는 객체로 변경한다. 
            const data = JSON.stringify(userInfo);
            // Json으로 보내줄거야 라고 명시를 해주는 작업
            // const config = {
            //     headers: {
            //         'Content-Type': 'application/json'
            //     }
            // }
            // axios.post(url, data, config)
            axios.post(url, data)
            .then(response => {
                // console.log(response);
                // 토큰 저장 처리
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                context.commit('setAuthFlg', true);
                context.commit('setUserInfo', response.data.data);

                // 보드 리스트로 이동
                router.replace('/boards');
            })
            .catch(error => {
                let errorMsgList = [];
                const errorData = error.response.data;

                if(error.response.status === 422) {
                    // 유효성 체크 에러
                    if(errorData.data.account) {
                        errorMsgList.push(errorData.data.account[0]);
                    }
                    if(errorData.data.password) {
                        errorMsgList.push(errorData.data.password[0]);
                    }
                }else if(error.response.status === 401) {
                    // 비밀번호 오류
                    // 프론트에서 에러 메세지 문구를 다시 작성해서 사용해도 무방하다.
                    errorMsgList.push('비번 틀림 ㅋㅋ');
                }else {
                    errorMsgList.push('나도 모르는 에러');
                }

                console.log(error.response);
                alert(errorMsgList.join('\n'));
            });
        }

    },
    getters: {

    }
}