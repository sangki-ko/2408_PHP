

-- WHERE 절 사용하는 subQuery
-- D001 부서장의 사번과 이름을 출력

SELECT 
	emp_id
FROM department_managers

WHERE end_at IS NULL
AND dept_code = 'D001';



SELECT *
FROM employees
WHERE 
	emp_id IN (
		SELECT 
			emp_id
		FROM 
			department_managers
		WHERE 
			end_at IS NULL
		-- AND
-- 			dept_code = 'D001'
) ;

-- 현재 직책이 T006인 사원의 사번과 이름, 생일을 출력해주세요


SELECT 
	emp_id
FROM title_emps

WHERE end_at IS NULL
AND title_code = 'T006';



SELECT
	employees.emp_id
	,employees.name
	,employees.birth
FROM
	employees
WHERE
	employees.emp_id IN (
	SELECT 
		title_emps.emp_id
	FROM 
		title_emps
	WHERE 
		title_emps.end_at IS NULL
	AND
		 title_emps.title_code = 'T006');
		 

-- 현재 D002의 부서장이 해당 부서에 소속된 날짜를 출력

SELECT
	department_managers.emp_id
	,department_managers.dept_code
FROM
	department_managers
WHERE department_managers.end_at IS NULL
		AND
		department_managers.dept_code = 'D002';


SELECT 
	department_emps.*
FROM department_emps
WHERE
		(department_emps.emp_id, department_emps.dept_code) IN (
	SELECT
		department_managers.emp_id
		,department_managers.dept_code
	FROM
		department_managers
	WHERE 
		department_managers.end_at IS NULL
		AND
		department_managers.dept_code = 'D002');
		

-- 연관서브쿼리

SELECT
	employees.*
FROM 
	employees
WHERE
	employees.emp_id IN(
		SELECT 
			department_managers.emp_id
		FROM 
			department_managers
		WHERE
			department_managers.emp_id = employees.emp_id
		);


-- ---------------------------------
-- SELECT절에서 사용되는 sub query
-- ---------------------------------

-- 사원별 평균 연봉과 사번, 이름을 출력

SELECT 
	employees.emp_id
	,employees.name
	,(
		SELECT 
			AVG(salaries.salary)
		FROM 
			salaries
		WHERE
			employees.emp_id = salaries.emp_id		
	) AS avg_sal
FROM
	employees
;

-- ----------------------------
-- FROM 절에 사용되는 sub query
-- ----------------------------

SELECT
	qwer.*
FROM (
	SELECT
		employees.emp_id
		,employees.name
	FROM 
		employees	
) AS qwer
;

-- ----------------------------
-- insert 문에서 sub query 사용
-- ----------------------------

INSERT INTO 
	employees (
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
	(SELECT emp.NAME FROM employees emp WHERE emp.emp_id = 1000)
	,'2000-01-01'
	,'M'
	,DATE(NOW())
	,NULL
	,NULL
	,NOW()
	,NOW()
	,NULL
);


-- ----------------------------
-- update 문에서 sub query 사용
-- ----------------------------

UPDATE 
	employees
SET
	employees.gender = (
		SELECT 
			emp.gender
		FROM employees emp
		WHERE emp.emp_id = 100006
	)
WHERE
	employees.emp_id = (
	SELECT MAX(emp2.emp_id)
	FROM employees emp2	
);



UPDATE
	employees
SET
	employees.gender = 'X'
WHERE 
	employees.emp_id = 100006;

	
	