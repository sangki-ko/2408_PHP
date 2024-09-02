-- INSERT 문 : 신규 데이터를 저장

-- 기본구조
-- INSERT INTO 테이블명 ( 컬럼1, 컬럼2....)
-- VALUES (값1, 값2....);
-- 순서는 상관 없지만 ERD 순서에 맞게 작성을 하는걸 지향

INSERT INTO employees(
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)

VALUES (
	'최상기'
	,'2002-01-04'
	,'M'
	,'2024-09-02'
	,NULL
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
);

-- select insert
INSERT INTO employees(
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)
SELECT
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
FROM employees
WHERE emp_id = 100002
;

-- 자신의 직급정보 삽입
-- 자신의 급여정보 삽입
-- 자신의 소속부서 삽입

INSERT INTO title_emps(
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)

SELECT
	100002
	,'T002'
	,'2024-09-02'
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
FROM title_emps
WHERE emp_id = 100002
;

-- 자신의 급여정보 삽입
INSERT INTO salaries(
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)

VALUES (
	100002
	,1000000000
	,'2024-09-02'
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
);

-- 자신의 소속부서 삽입

INSERT INTO department_emps(
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)

VALUES (
	'100002'
	,'D002'
	,'2024-09-02'
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
);

