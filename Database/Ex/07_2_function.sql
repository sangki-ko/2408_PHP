-- 내장함수 : 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- CAST(값 AS 데이터타입 문자라는 뜻),
-- CONVERT(값, 데이터타입)
SELECT 
	1234
	,CAST(1234 AS CHAR(4))
	,CONVERT(1234, CHAR(4))
;

-- 제어 흐름 함수
-- IF(수식, 참일 때에, 거짓일 때))
-- 수식의 참 또는 거짓에 따라 결과를 분기하는 함수
-- 종류가 두 가지인 상황에 사용한다고 한다.

SELECT 
	emp_id
	,gender
	,IF(gender = 'M', '남자', '여자') AS ko_gender
FROM 
	employees
;

-- IFNULL(수식1, 수식2)
-- 수식 1이 NULL이면 수식2를 반환
-- 수식 1이 NULL이 아니면 수식 1을 반환

SELECT 
	emp_id
	,end_at
	,IFNULL(end_at, '9999-01-01') AS NULL1
	,IFNULL(deleted_at, '삭제')
FROM	salaries
;

-- NULLIF(수식1, 수식2)
-- 수식1과 수식2가 같은지를 판단
-- 참이면 NULL을 반환, 거짓이면 수식1을 반환

SELECT 
	emp_id
	,gender
	,NULLIF(gender, 'F')
FROM employees
;

-- CASE 문 :
-- CASE 체크하려는 수식
-- 	WHEN 분기수식1 THEN 결과1
-- 	WHEN 분기수식2 THEN 결과2
-- 	ELSE 결과4
-- END

-- 비교 연산자 사용할 땐 수식을 넣지 않는다
SELECT
	*
	,CASE
		WHEN salary >= 30000000 THEN '남자'
		WHEN salary <= 100000000 THEN '여자'
		ELSE '모름'
	END
FROM salaries
;

SELECT
	*
	,case 
		when salaries.salary>=40000000 then 'superman'
		when salaries.salary>=30000000 then 'man'
		when salaries.salary>=20000000 then 'average'
		ELSE 'wonder'
	END
from salaries;

SELECT
	emp_id
	,salary
	,CASE
		WHEN salary <= 30000000
			THEN '평범'
				ELSE '많다'
	END AS '월급'		
FROM salaries
;


-- --------------
-- 문자열 함수
-- --------------

-- CONCAT(문자열1, 문자열2 .....)
-- 문자열을 연결하는 함수

SELECT CONCAT ('안녕하세요.','    ', 'DB입니다.');

-- CONCAT_WS(구분자, 문자열1, 문자열2.....)
-- 문자열 사이에 구분자를 넣어 연결하는 함수

SELECT CONCAT_WS (', ', '딸기', '바나나', '수박', '오렌지', '망고')

-- FORMAT (숫자, 소수 자릿수)
-- 소숫 자리수 : 내가 준 수만큼 소수점 개수가 나온다

SELECT FORMAT(50000000000000, 2);

-- LEFT(문자열, 숫자)
-- 문자열을 왼쪽부터 숫자길이 만큼 잘라 반환

SELECT LEFT('abcde', 5);

-- RIGHT(문자열, 숫자)
-- 문자열을 오른쪽부터 숫자길이 만큼 잘라 반환

SELECT RIGHT('abcde', 2);


-- UPPER(문자열)
-- 소문자를 대문자로 변경한다.

SELECT UPPER('fuck');

-- LOWER(문자열)
-- 대문자를 소문자로 변경한다.

SELECT LOWER('FUCK');

-- LPAD(문자열, 길이, 채울 문자열)
-- LPAD에 L은 LEFT의 약자이다.
-- 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 삽입해 반환

SELECT LPAD('321', '7', '3');

-- RPAD(문자열, 길이, 채울 문자열)
-- RPAD의 R은 RIGHT의 약자이다.
-- 문자열을 포함해 길이만큼 채울 문자여릉ㄹ 오른쪽에 삽입해 반환

SELECT RPAD('0', '7', '2');

-- TRIM()
-- 좌우 공백을 제거해주는 함수

SELECT 
	*
	 TRIM()
	 WHERE name
	 FROM employees;

-- RTRIM (문자열) : 오른쪽 공백을 제거
-- LTRIM (문자열) : 왼쪽 공백을 제거


-- TRIM(방향 문자열1 FROM 문자열2)
-- 방향을 지정해서 문자열 2에서 문자열 1을 제거하여 반환
-- 방향은 LEADING(좌), BOTH(좌우), TRAILING(우) 지정 가능

SELECT TRIM(both 'ab' FROM 'abcdeab');


-- SUBSTRING(문자열, 시작위치, 길이)
-- 문자열을 시작위치에서 길이만큼 잘라서 반환

SELECT SUBSTRING('abcdef', 1, 6);

-- SUBSTRING_INDEX(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수번째가 나오면 그 이후부터 버림\
-- 구분자는 문자열에 어떤 단어든 넣어도 괜찮음
-- 음수로 설정하면 기준이 오른쪽으로 바뀜
-- 양수로 설정하면 기준이 왼쪽으로 됨

SELECT SUBSTRING_INDEX('미어캣_그린_테스트', '그린', -1);

-- -----------
-- 수학함수
-- -----------

-- CEILING(값) : 올림
-- FLOOR(값) : 버림
-- ROUND(값) : 반올림 

SELECT CEILING(1.2), FLOOR(1.9), ROUND(1.5);

-- TRUNCATE(값, 정수)
-- 소수점 기준으로 정수 위치까지 구하고 나머지는 버림

SELECT TRUNCATE(1.2345, 2);

-- -----------------
-- 날짜 및 시간 함수
-- -----------------

-- now() : 현재 날짜 및 시간을 반환(YYYY-MM-DD hh:mi:ss)

SELECT NOW();

-- DATE(데이트 형식의 값)
-- 해당 값을 YYYY-MM-DD 형식으로 변환

SELECT DATE(NOW());

-- ADDDATE(날짜1, INTERVAL 날짜2)

SELECT ADDDATE('2024-01-01', INTERVAL 1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL -1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL 1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL -1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL 1 WEEK);
SELECT ADDDATE('2024-01-01', INTERVAL -1 WEEK);
SELECT ADDDATE('2024-01-01', INTERVAL 1 DAY);
SELECT ADDDATE('2024-01-01', INTERVAL -1 DAY);
SELECT ADDDATE('2024-01-01', INTERVAL 1 HOUR);
SELECT ADDDATE('2024-01-01', INTERVAL -1 HOUR);
SELECT ADDDATE('2024-01-01', INTERVAL 1 MINUTE);
SELECT ADDDATE('2024-01-01', INTERVAL -1 MINUTE);
SELECT ADDDATE('2024-01-01', INTERVAL 1 SECOND);
SELECT ADDDATE('2024-01-01', INTERVAL -1 SECOND);



-- ------------
-- 집계함수
-- ------------

-- SUM(컬럼) : 해당 컬럼의 합계 출력
-- MAX() : 해당 컬럼의 최대값 출력
-- MIN() : 해당 컬럼의 컬럼의 최소값 출력
-- AVG() : 해당 컬럼의 평균 출력
-- COUNT() 해당 컬럼의 총 수를 출력

SELECT 
	SUM(salary)
	,max(salary)
	,min(salary)
	,avg(salary)
 FROM salaries;

SELECT
	COUNT(fire_t) 
	,COUNT(*)
FROM employees

-- COUNT(*) : 검색 결과의 총 레코드 수를 출력
-- COUNT(컬럼) : 검색 결과 중 해당 컬럼의 값이null이 아닌 정보만 가져옴



-- ------------
-- 순위 함수
-- ------------

SELECT
	emp_id
	,salary
	,ROW_NUMBER() OVER(ORDER BY salary DESC) AS sal_rank
FROM salaries
LIMIT 5;

-- ROW_NUMBER() OVER(ORDER BY 속성명 DESC/ASC)
-- 레코드에 순위를 매겨 반환
-- 동일한 값이 있는 경우에도 각 행에 고유한 번호를 부여

