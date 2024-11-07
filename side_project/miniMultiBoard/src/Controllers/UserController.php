<?php
namespace Controllers;
use Controllers\Controller;
use lib\UserValidator;
use Models\User;

class UserController extends Controller {
    protected $userInfo = [
        'u_email' => ''
        ,'u_name' => ''  
    ];

    protected function goLogin() {
        return 'login.php';
    }

    protected function login() {
        // 유저 입력 정보 획득
        $requestData = [
            'u_email' => $_POST['u_email']
            ,'u_password' => $_POST['u_password']
        ];

        $this->userInfo = [
            'u_email' => $requestData['u_email']  
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'login.php';
        }

        // 유저 정보를 획득
        $userModel = new User();
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);

        // 유저 존재 유무 체크
        if(!$resultUserInfo) {
            $this->arrErrorMsg[] = '존재하지 않는 유저입니다.';
        }else if(!password_verify($requestData['u_password'], $resultUserInfo['u_password'])) {
            $this->arrErrorMsg[] = '패스워드가 일치하지 않습니다.';
            return 'login.php'; 
        }

        // 세션에 u_id 저장
        $_SESSION['u_email'] = $resultUserInfo['u_email'];

        // 로케이션 처리
        return 'Location: /boards';
    }
    
    public function logout() {
        unset($_SESSION['u_email']); // 사용자 세션 삭제
        session_destroy(); // 세션 파기

        return 'Location: /login';
    }

    // 회원 가입 페이지 이동
    public function goRegist() {
        return 'regist.php';
    }

    // 회원가입 처리
    public function regist() {
        $requestData = [
            'u_email' => isset($_POST['u_email']) ? $_POST['u_email'] : ''
            ,'u_password' => isset($_POST['u_password']) ? $_POST['u_password'] : ''
            ,'u_password_chk' => isset($_POST['u_password_chk']) ? $_POST['u_password_chk'] : ''
            ,'u_name' => isset($_POST['u_name']) ? $_POST['u_name'] : ''
        ];
        $this->userInfo = [
            'u_email' => $requestData['u_email']
            ,'u_name' => $requestData['u_name']  
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'regist.php';
        }

        // 헤당 이메일 중복 체크
        $userModel = new User();
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);
        if($resultUserInfo) {
            $this->arrErrorMsg[] = '이미 가입된 이메일입니다.';
            return 'regist.php';
        }

        //회원 정보 인서트
        $userModel->beginTransaction();
        $prepare = [
            'u_email' => $requestData['u_email']
            ,'u_password' => password_hash($requestData['u_password'], PASSWORD_DEFAULT)
            ,'u_name' => $requestData['u_name']
        ];

        $resultRagistUserInfo = $userModel->registUserInfo($prepare);
        if($resultRagistUserInfo !== 1) {
            $userModel->rollBack();
            $this->arrErrorMsg[] = '회원가입에 실패했습니다.';
            return 'legist.php';
        }
        
        $userModel->commit();
        
        return 'Location: /login';
        
    }
}
