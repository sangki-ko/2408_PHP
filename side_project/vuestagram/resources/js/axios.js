import axios from 'axios';

const axiosInstance = axios.create({
    // 기본 URL 설정
    // baseURl : 통신을 보내고 싶은 url을 설정이 가능하다.
    // baseURL: '112.222.157.156:6515',

    // 기본 헤더 설정
    headers: {
        'Content-Type': 'application/json',
    }
});

export default axiosInstance;