-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주 세요.
INSERT INTO employees (
	emp_id
	,NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,created_at
	,updated_at
)

VALUES (
	100002
	,'최상기'
	,'2002-01-04'
	,'M'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);


-- 2. 월급, 직급, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.

INSERT INTO salaries (
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100002
	,10000000000
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);

INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100002
	,'D001'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);

INSERT INTO title_emps (
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100002
	,'T009'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);
	


-- 3. 짝궁의 것도 넣어주세요.

INSERT INTO employees (
	emp_id
	,NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,created_at
	,updated_at
)

VALUES (
	100003
	,'유원상'
	,'1996-01-01'
	,'M'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);


INSERT INTO salaries (
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100003
	,1000000000
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);

INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100003
	,'D009'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);

INSERT INTO title_emps (
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100003
	,'T008'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);

-- 4. 나와 짝궁의 소속 부서를 D009로 변경해주세요.

INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100003
	,'D009'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);


UPDATE department_emps
SET
	dept_code = 'D006'
	,end_at = NOW()

WHERE emp_id = 100003;

UPDATE department_emps
SET
	dept_code = 'D009'

WHERE emp_id = 100003;

-- 5. 짝궁의 모든 정보를 삭제해 주세요.

DELETE FROM department_emps
WHERE emp_id = 100003;

DELETE FROM salaries
WHERE emp_id = 100003;

DELETE FROM title_emps
WHERE emp_id = 100003;

DELETE FROM employees
WHERE emp_id = 100003;

-- 6. 'D009'부서의 관리자를 나로 변경해 주세요

UPDATE department_managers
SET
	end_at = DATE(NOW())

WHERE dept_mgr_id = 64;

INSERT INTO department_managers (
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100002
	,'D009'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);

-- 7. 오늘 날짜부로 나의 직책을 '대리'로 변경해 주세요.

INSERT INTO title_emps (
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
)

VALUES (
	100002
	,'T002'
	,DATE(NOW())
	,NULL
	,NOW()
	,NOW()
);



UPDATE title_emps
SET
	title_code = 'T003'
	
WHERE title_emp_id = 181458;


-- 8. 최저 연봉 사원의 사번과 이름, 연봉을 출력해 주세요.

-- 8
SELECT
	employees.emp_id
	,employees.name
	,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND employees.fire_at IS NULL
		WHERE salaries.salary IN (
			SELECT 
				MIN(salaries.salary)
			FROM salaries
			WHERE salaries.end_at IS NULL	
		);

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.

SELECT
	AVG(salaries.salary)
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND salaries.end_at IS NULL;
		
-- 10. 사번이 54321인 사원의 지금까지 평균 연봉을 출력해 주세요.
	
SELECT
	AVG(salaries.salary)
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND employees.emp_id = '54321';
	
-- 11번. 아래 구조의 테이블을 작성하는 SQL을 작성해 주세요.


CREATE TABLE users (
userid		INT(10)	UNSIGNED	PRIMARY KEY AUTO_INCREMENT
,username 	VARCHAR(30) 		NOT NULL
,authflg		CHAR(1) 				DEFAULT '0'
,birthday		DATE 				NOT NULL
,created_at	DATETIME 			DEFAULT CURRENT_DATE()
);

-- 12번. [01]에서 만든 테이블에 아래 데이터를 입력해 주세요.

INSERT INTO users (
	username
	,authflg
	,birthday
	,created_at
)

VALUES (
	'그린'
	,'0'
	,'2024-01-26'
	,NOW()
	);

-- 13번. [02]에서 만든 레코드를 아래 데이터로 갱신해 주세요.

UPDATE users
SET
	username = '테스터'
	,authflg = '1'
	,birthday = '2007-03-01'
WHERE userid = 1;

-- 14번. 02]에서 만든 레코드를 삭제해 주세요.

DELETE FROM users
WHERE userid = 1;

-- 15번. [01]에서 만든 테이블에 아래 Column을 추가해 주세요.

ALTER TABLE users 
ADD COLUMN 
	addr	VARCHAR(100) NOT NULL DEFAULT '-'
;

-- 16번. [01]에서 만든 테이블을 삭제해 주세요.

DROP TABLE users;

-- 17번. 아래 테이블에서 유저명, 생일, 랭크명을 출력해 주세요.

SELECT 
	users.username
	,users.birthday
	,rankmanagement.rankname
FROM users
	JOIN rankmanagement
		ON users.userid = rankmanagement.userid;