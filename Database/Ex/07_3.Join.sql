-- ---------------------------------------------------------------
-- JOIN문 : 두 개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력
-- ---------------------------------------------------------------

-- INNER JOIN
-- 두 테이블이 공통적으로 만족하는 레코드를 출력(교집합)
-- 사원 번호, 이름,소속부서코드를 출력

SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
	,departments.dept_name
FROM employees
JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		AND department_emps.end_at IS NULL
		AND employees.fire_at IS NULL
JOIN departments
		ON departments.dept_code = department_emps.dept_code
		;
		
-- LEFT OUTER JOIN (LEFT JOIN으로 줄여서 많이 사용)
-- 왼쪽 테이블을 기준 테이블로 두고 JOIN을 실행
-- 기준 테이블의 모든 데이터를 출력하고
-- 조인 대상 테이블에 없는 값은 NULL로 출력

-- 모든 사원의 사번, 이름, 부서장 시작날짜

SELECT 
	employees.emp_id
	,employees.name
	,department_managers.start_at
	,departments.dept_name
FROM employees
	LEFT JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
		AND department_managers.end_at IS NULL
	  LEFT JOIN departments
--  	ON department_managers.dept_code = departments.dept_code
ORDER BY start_at DESC;
		
		
--

SELECT
	employees.emp_id
	,employees.name
	,department_managers.start_at
FROM department_managers
	RIGHT JOIN employees
		ON	department_managers.emp_id = employees.emp_id
WHERE
	department_managers.end_at IS NULL
ORDER BY department_managers.start_at DESC;


-- UNION
-- 두 개 이상이 쿼리의 결과를 합쳐서 출력

SELECT *
FROM
	employees
WHERE 
	emp_id IN(1, 3)
UNION ALL
SELECT *
FROM
	employees
WHERE 
	emp_id IN(3, 6);

-- SELF JOIN
-- 자기 자신을 조인
-- 슈퍼바이저인 사원의 정보 출력

SELECT
	emp1.emp_id
	,emp1.name
FROM employees emp1
	JOIN employees emp2
		ON emp1.emp_id = emp2.sup_id
;

SELECT
	name
	,emp_id
FROM employees
WHERE sup_id IS NOT NULL;

