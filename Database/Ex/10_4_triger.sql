-- 트리거 생성

DELIMITER $$

CREATE TRIGGER del_emp
BEFORE DELETE
	ON employees
FOR EACH ROW
BEGIN 
	DELETE FROM department_emps 
	WHERE emp_id = OLD.emp_id;
	
	DELETE FROM department_managers 
	WHERE emp_id = OLD.emp_id;
	
	DELETE FROM salaries 
	WHERE emp_id = OLD.emp_id;
	
	DELETE FROM title_emps 
	WHERE emp_id = OLD.emp_id;   
END $$

DELIMITER ;


DELETE FROM employees
WHERE emp_id = 1;

SELECT *
FROM employees
WHERE emp_id = 4000;

UPDATE employees
SET NAME = '호랑이' WHERE emp_id = 4000;

SELECT *
FROM employees
WHERE emp_id = 4000;


-- 트리거 조회
SHOW TRIGGERS;
 