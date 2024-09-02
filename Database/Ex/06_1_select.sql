/*
	SELECT문
	데이터를 조회하기 위해 사용하는 쿼리
*/

-- 테이블에서 특정 컬럼만 조회하는 방법
-- FROM : 어떤 테이블에서
-- SELECT : ~컬럼을 찾아오다.
-- 예)
SELECT
	 emp_id, 
	 NAME
FROM 
	employees;
	
-- 테이블의 모든 컬럼의 데이터 조회
-- * :  모든 컬럼을 뜻함. (Asterrisk)
-- 선택실행 방법 : SELECT와 FROM 안에 
-- 마우스 커서를 옮긴 뒤 마우스 우클릭 선택실행
-- 혹은 드레그 후 마우스 우클릭 선택실행
SELECT *
FROM employees
;

SELECT *
FROM titles
;

-- 사원의 직책과 사번은 조회해주세요.

SELECT 
	emp_id, 
	title_code
FROM 
	title_emps
;

/*
	WHERE 절 : 특정 조건의 데이터를 조회할 때 사용
*/
-- 사번이 10000번인 사원의 모든  정보를 조회해주세요.

SELECT
	*
FROM
	employees
WHERE 
	emp_id = 10000
;

-- 이름이 "김철수"인 사원을 조회해주세요.

SELECT
	*
FROM
	employees
WHERE
	NAME = '이준형'
;

-- 비교연산자 : >(초과), <(미만), =(같다), >=(크거나 같다)
-- <=(작거나 같다), !=(~이 아니다)

-- 사번이 6 이상인 사원의 정보를 조회해주세요.
SELECT
	*
FROM	
	employees
WHERE emp_id >= 6;



-- 생일이 1990-01-01 이ㅜㅎ인 사원을 조회해주세요.
SELECT *
FROM
	employees
WHERE
	birth >= '1990-01-01';
	

-- AND,OR : 복수의 조건을 적용시키는 키워드
-- 생일이 1990-01-01 이후이고, 남자사원을 조회해주세요.


SELECT
	*
FROM
	employees
WHERE
		 birth >= '1990-01-01' 
	and gender = 'M';
	
-- 이름이 원성현이거나 반승현인 사원을 조회해주세요.

SELECT
	*
FROM
	employees
WHERE
	NAME = '원성현'
OR	NAME = '반승현'
;

-- 이름이 원성현 또는 반승현이고,
-- 생일이 1990-01-01 이후인 사원을 조회해주세요.

SELECT
	*
FROM
	employees
WHERE 
	(NAME = '원성현' 
OR NAME = '반승현')
	AND birth >= '1990-01-01';
	
-- 이름이 원성현이고 생일이 1990-01-01 이후 이거나
-- 이름이 반승현인 사원 조회

SELECT
	*
FROM
	employees
WHERE
	(NAME = '원성현'
	AND birth >= '1990-01-01')
	
	OR NAME = '반승현';
	
	
-- 직급 코드가 T001 또는 T002이고, 
-- 직급 시작일자가 2000-01-01이후인 사원의 사번과
-- 직급 코드를 조회해주세요

SELECT 
	emp_id
	,title_code
FROM	
	title_emps
WHERE	
	(title_code = 'T001'
	OR title_code = 'T002')
	
	AND 
	start_at >= '2000-01-01';
	
	
-- 생일 2000-01-01 ~ 2001-01-01인 사원 정보
-- 조회해주세요

SELECT	
	*
FROM	
	employees
WHERE
	birth >= '2000-01-01'
	and birth <= '2001-01-01';
	
-- in 연산자 : 지정한 값과 일치한 데이터 조회
-- 이름이 염문창, 지도연, 안소정인 사원정보 조회해주세요.

SELECT *
FROM
	employees
WHERE
	NAME IN(
	'염문창'
	, '지도연'
	, '안소정'	
	)
;

-- between 연산자 : 지정한 범위의 데이터를 조회
-- between '0000-00-00' and(~) '2000-00-00';

-- 생일이 2000-01-01 ~ 2001-01-01인 사원 정보 조회

SELECT *
FROM employees
WHERE
	birth BETWEEN '2000-01-01' and '2001-01-01';
	
-- LIKE 연산자 : 문자열의 내용을 조회할 때 사용한다. (주의점 : 대소문자 구분X)
-- 염씨인 사원 정보 획득
-- 염% : %를 붙이면 염 뒤에 몇 글자든 상관없이 조회함
-- %염% : 염이라는 글자가 들어있으면 다 나옴

SELECT *
FROM employees
WHERE
	NAME LIKE '최상_';
	
-- LIKE _ : 언더바의 개수만큼 글자 개수를 제한해서 조회
-- 염_ : 언더바 하나만 붙였을 땐 염으로 시작하는 두글자 이름의 인원만 조회
-- 염__ : 언더바 두 개를 붙였을 땐 염으로 시작하는 세글자 이름의 인원을 조회
-- _염 : 염으로 끝나는 두 글자 이름의 인원을 조회
-- 최상_ : 최상으로 시작하는 세글자 이름의 인원을 조회


/*
	ORDER BY 절 : 데이터를 정렬
	ORDER BY NAME ASC : 가나다 순으로 정렬
	ORDER BY NAME DESC : 내림차순 (가나다 역순으로 정렬)
*/

SELECT *
FROM employees
ORDER BY hire_at ASC;

-- 여자 사원을 이름 오름차순으로 정렬

SELECT *
FROM employees
WHERE gender = 'f'
ORDER BY birth ASC, hire_at ASC;


-- DISTINCT 키워드 : 검색 결과에서 중복되는 레코드를 없애줌
-- 직급테이블에서 사원번호 조회

SELECT distinct emp_id, title_code
FROM title_emps;

/*
	GROUP BY 절 : 그룹으로 묶어서 조회
	HAVING 절 : GROUP BY 절의 조건절
	
	집계함수 
		MAX() : 최대값
		MIN() : 최소값
		COUNT() : 개수
		AVG() : 평균
		SUM() : 합계
*/

-- 사원별 최고 연봉 조회
-- group by를 검색할 함수와 select의 함수는 같이 포함하며
-- 집계함수(통계를 내서 직접값을 가지고 올 수 있다)
-- 도 같이 적어준다.

SELECT 
	emp_id
	,MAX(salary)
FROM salaries
	GROUP BY emp_id
;


-- 사원별 최고 연봉이 5000만원이상인 사원 조회
SELECT 
	emp_id
	,MAX(salary)
FROM salaries
GROUP BY emp_id HAVING MAX(salary) >= 50000000;


-- 사원의 현재 소속 부서코드 조회하기
-- 값이 null인 데이터 검색
-- [걸럼명 IS NULL]
-- 값이 NULL이 아닌 데이터 검색
-- [걸럼명 IS NOT NULL]
SELECT *
FROM department_emps
WHERE	
	dept_code IS NULL
;
	
/*
	AS : 컬럼 또는 테이블에 별칭을 부여
*/
-- 부서별 소속 사원의 수를 구해주세요.
-- 

SELECT dept_code 
	, COUNT(*)
FROM department_emps
WHERE	end_at IS NULL
	GROUP BY dept_code;
	
	
-- LIMIT, OFFSET : 출력하는 데이터의 개수 제한

SELECT *
FROM salaries
ORDER BY emp_id ASC
LIMIT 1 OFFSET 5;

-- 재직중인 사원의 연봉 상위 5명 조회

SELECT 
	*
FROM salaries
WHERE	end_at IS NULL
ORDER BY salary DESC
LIMIT 5;


-- SELECT문의 기본 구조
SELECT [DISTINCT] {컬럼명}
FROM [테이블명]
WHERE [쿼리 조건]
GROUP BY [컬럼명] HAVING [집계함수 조건]
ORDER BY [컬럼명 ASC || 컬럼명 DESC]
LIMIT [n} OFFSET [n]
;
