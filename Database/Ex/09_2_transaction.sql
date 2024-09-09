-- Transaction 시작

START TRANSACTION;

-- insert

INSERT INTO employees (
	NAME, birth, gender, hire_at
)
VALUES (
	'최상기', '2002-01-04', 'T', DATE(NOW())
)
;

-- select
SELECT *
FROM employees
WHERE NAME = '최상기';

-- rollback
ROLLBACK;

-- commit
COMMIT;