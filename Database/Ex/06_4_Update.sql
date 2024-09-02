-- UPDATE문 : 기존 데이터를 수정

-- 기본구조
-- UPDATE 테이블명
-- SET 컬럼1 = 값1, 컬럼2 = 값2.....
-- WHERE 절을 적어야함 (안 적으면 해당 레코드에 있는 모든 레코드가 수정된다)


UPDATE employees
SET 
	gender='M'
	,updated_at = NOW()
WHERE emp_id = 100002
;



-- 나의 직급을 'T005로 변경해 주세요
-- 현재 급여가 26,000,000원 이하인 직원의 급여를 50,000,000원

UPDATE title_emps
SET 
	title_code = 'T005'
WHERE emp_id = 100002
;

UPDATE salaries
SET 
	salary = 50000000
WHERE salary <= 26000000
;

SELECT *
FROM salaries
WHERE salary <= 26000000
;