-- DB 생성
-- CREATE DATABASE shop;

-- DB 선택
-- USE shop;

-- DB 삭제
-- DROP DATABASE shop;

-- 상품 목록 테이블
-- pk(id), 상품명(product_name), 가격(price), 작성일, 수정일, 삭제일

-- 주문 테이블(orders)
-- pk(id), 주문번호(order_id), 총 가격(total_price)
-- 회원PK(user_id), 작성일, 수정일, 삭제일

-- ------------
-- 테이블 생성
-- ------------

CREATE TABLE users (
	id				BIGINT(20)			PRIMARY KEY			AUTO_INCREMENT
	,NAME			VARCHAR(50)			NOT NULL
	,addr			VARCHAR(15)			NOT NULL
	,gender		CHAR(1)				NOT NULL				COMMENT 'M = 남자, F = 여자'
	,tel			VARCHAR(20)			NOT NULL				COMMENT '- 제외하고 숫자만'
	,created_at	TIMESTAMP			NOT NULL				DEFAULT CURRENT_TIMESTAMP()
	,updated_at	TIMESTAMP			NOT NULL				DEFAULT CURRENT_TIMESTAMP()
	,deleted_at	TIMESTAMP
);

CREATE TABLE orders (
	id					BIGINT(20)			PRIMARY KEY			AUTO_INCREMENT
	,user_id			BIGINT(20)			NOT NULL
	,order_id		VARCHAR(50)			NOT NULL
	,total_price	BIGINT(15)			NOT NULL						
	,created_at		TIMESTAMP			NOT NULL				DEFAULT CURRENT_TIMESTAMP()
	,updated_at		TIMESTAMP			NOT NULL				DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		TIMESTAMP
);

CREATE TABLE products (
	id					BIGINT(20)			PRIMARY KEY			AUTO_INCREMENT
	,product_name	VARCHAR(100)		NOT NULL
	,price			BIGINT(20)			NOT NULL
	,created_at		TIMESTAMP			NOT NULL				DEFAULT CURRENT_TIMESTAMP()
	,updated_at		TIMESTAMP			NOT NULL				DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		TIMESTAMP
);


-- -----------
-- 테이블 제거
-- -----------
DROP TABLE orders;products
DROP TABLE users, products;

-- -------------
-- 테이블 비우기
-- -------------
TRUNCATE ;

-- -----------------------------------
-- ALTER : 테이블의 구조를 수정하는 문
-- -----------------------------------
-- FK 추가 방법


-- ALTER TABLE [테이블명] ADD CONSTRAINT [Constraint명] FOREIGN KEY (Constraint 부여 컬럼명) REFERENCES 참조테이블명(참조테이블 컬럼명) [ON DELETE 동작 / ON UPDATE 동작];
-- 

ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY	(user_id)
REFERENCES users (id);
ON DELETE CASCADE

ALTER TABLE [테이블명]
ADD CONSTRAINT [Constraint명]
FOREIGN KEY	(CONSTRAINT 부여 컬럼명)
REFERENCES 참조테이블명 (참조테이블 컬럼명);
ON DELETE '동작' / ON UPDATE '동작'


-- ---------
-- 컬럼 수정
-- ---------

ALTER TABLE users
MODIFY 
	id	 
	BIGINT(20)		
	PRIMARY KEY		
	AUTO_INCREMENT 	
	UNSIGNED;
	
-- UNSIGNED : 부호없음 설정
	
-- ---------
-- 컬럼 추가
-- ---------

ALTER TABLE users
ADD COLUMN
	birth
	DATE
	NOT NULL
;

-- ---------
-- 컬럼 제거
-- ---------

ALTER TABLE users
DROP COLUMN
	id;
	
	
-- pk 부호없음 추가

ALTER TABLE orders
DROP CONSTRAINT fk_orders_user_id;

ALTER TABLE users
DROP COLUMN id;

ALTER TABLE users
ADD COLUMN
	id
	BIGINT(20)
	UNSIGNED
;

ALTER TABLE users
ADD PRIMARY KEY(id);

ALTER TABLE 테이블명 MODIFY 컬럼명 INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

ALTER TABLE 
	users
MODIFY COLUMN id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE 
	orders
MODIFY COLUMN user_id BIGINT(20) UNSIGNED NOT NULL;