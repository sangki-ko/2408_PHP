-- 직책테이블의 모든 정보를 조회해주세요

SELECT *
FROM titles
;


-- 급여가 60,000,000이하인 사원의 사번을 조회해 주세요.

SELECT emp_id
FROM salaries
WHERE end_at IS NULL
	AND salary <= 60000000;
	
	
-- 급여가 60,000,000원에서 70,000,000원인 사원의 사번을 조회해 주세요.

SELECT
	emp_id
FROM salaries
WHERE end_at IS NULL
 AND salary <= 70000000
 AND salary >= 60000000;
 
 
-- 사원 번호가 10001, 10005인 사원의 사원 테이블의 모든 정보를 조회해 주세요

SELECT *
FROM employees
WHERE emp_id = 10001 OR emp_id = 10005;


-- 직급명에 '사'가 모함된 사원의 사번과 직급을 조회해 주세요.

SELECT 
	titles.title_code
	,titles.title
FROM 
	titles
	
WHERE titles.title LIKE '%사%';


-- 사원 이름 오름차순으로 정렬해서 조회해 주세요.

SELECT
	NAME
FROM
	employees
ORDER BY 
	NAME ASC; 


-- 사원별 전체 급여의 평균을 조회해 주세요

SELECT
	emp_id
	,AVG(salary)
FROM
	salaries
GROUP BY emp_id;


--  사원별 전체 급여 평균이 30,000,000 ~ 50,000,000인, 사원 번호와 평균급여를 조회해주세요

SELECT
	emp_id
	,AVG(salary) avg_sal
FROM
	salaries
GROUP BY emp_id
	HAVING AVG(salary) BETWEEN 30000000 AND 50000000;
	
	
-- 사원별 전체 급여 평균이 70,000,000이상인, 사원의 사번, 이름, 성별을 조회해주세요.

SELECT
	employees.emp_id
	,employees.name
	,employees.gender
FROM 
	employees
WHERE employees.emp_id IN (
	SELECT
		salaries.emp_id
	FROM 
		salaries
	GROUP BY salaries.emp_id
		HAVING 
			AVG(salary) >= 70000000);
		
		
-- 	sub query
	SELECT
		salaries.emp_id
	FROM 
		salaries
	GROUP BY salaries.emp_id
		HAVING AVG(salaries.salary) >= 70000000;
		
		
-- 현재 직급이 'T005'인, 사원의 사원번호와 이름을 조회해 주세요.

SELECT 
	emp_id
	,name
FROM employees
WHERE emp_id IN (
	SELECT 
		emp_id
	FROM	
		title_emps
	WHERE 
		end_at IS NULL
	AND 
		title_code = 'T005')
	ORDER BY emp_id ASC
;


SELECT 
	emp_id
FROM	
	title_emps
WHERE 
	end_at IS NULL
AND title_code = 'T005';


SELECT *
FROM department_managers
WHERE end_at IS NULL;

SELECT 
	employees.name
	,departments.dept_name
	,salaries.salary
FROM employees
	JOIN department_managers
		ON	employees.emp_id = department_managers.emp_id
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
	JOIN departments
		ON department_managers.dept_code = departments.dept_code
	WHERE end_at IS NULL;

