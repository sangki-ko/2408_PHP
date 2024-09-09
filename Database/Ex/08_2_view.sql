-- 사원의 사번, 이름, 현재 직급명, 현재 소속 부서명, 현재 연봉 조회

SELECT
	employees.emp_id
	,employees.name
	,titles.title
	,departments.dept_name
	,salaries.salary
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
			AND title_emps.end_at IS NULL
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND salaries.end_at IS NULL
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
			AND department_emps.end_at IS NULL
	JOIN titles
		ON title_emps.title_code = titles.title_code
	JOIN departments
		ON departments.dept_code = department_emps.dept_code
			AND departments.end_at IS NULL
	ORDER BY employees.emp_id ASC;
		
-- view 생성
CREATE VIEW view_emp_now_data
AS
SELECT
	employees.emp_id
	,employees.name
	,titles.title
	,departments.dept_name
	,salaries.salary
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
			AND title_emps.end_at IS NULL
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND salaries.end_at IS NULLview_emp_now_data
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
			AND department_emps.end_at IS NULL
	JOIN titles
		ON title_emps.title_code = titles.title_code
	JOIN departments
		ON departments.dept_code = department_emps.dept_code
			AND departments.end_at IS NULL
	ORDER BY employees.emp_id ASC;
	
-- view 사용

SELECT * FROM view_emp_now_data;

-- view 삭제

DROP VIEW view_emp_now_data;











