--------------------------------------------------------------
-- Database creation Script

-- Auto-Generated by QSEE-SuperLite (c) 2001-2004 QSEE-Technologies Ltd.

-- Verbose generation: ON

-- note: spaces within table/column names have been replaced by underscores (_)

-- Target DB: SQL2

-- Entity Model :Decomposite Diagram

-- To drop the tables generated by this script run -
--   'D:\OneDrive\Documents\1. Study stuff\The British College\Project Management\sql\freshmart_drop.sql'

--------------------------------------------------------------

-- Drop tables --
-- DROP TABLE PRODUCT_CART_PRODUCT;
-- DROP TABLE PRODUCT_contains_WISHLIST_PRODUCT;
-- DROP TABLE CART_CART_PRODUCT;
-- DROP TABLE ORDER_contains_ORDER_REPORT;
-- DROP TABLE WISHLIST_contains_WISHLIST_PRODUCT;
-- DROP TABLE ORDER_contains_ORDER_PRODUCT;
DROP TABLE PAYMENT CASCADE CONSTRAINTS;
DROP TABLE REVIEW CASCADE CONSTRAINTS;
DROP TABLE ORDERS CASCADE CONSTRAINTS;
DROP TABLE CART CASCADE CONSTRAINTS;
DROP TABLE CART_PRODUCT CASCADE CONSTRAINTS;
DROP TABLE WISHLIST CASCADE CONSTRAINTS;
DROP TABLE PRODUCT CASCADE CONSTRAINTS;
DROP TABLE SHOP CASCADE CONSTRAINTS;
DROP TABLE CATEGORY CASCADE CONSTRAINTS;
DROP TABLE OFFER CASCADE CONSTRAINTS;
DROP TABLE COLLECTION_SLOT CASCADE CONSTRAINTS;
DROP TABLE REPORT CASCADE CONSTRAINTS;
DROP TABLE USERS CASCADE CONSTRAINTS;
DROP TABLE WISHLIST_PRODUCT CASCADE CONSTRAINTS;
DROP TABLE ORDER_PRODUCT CASCADE CONSTRAINTS;
DROP TABLE ORDER_REPORT CASCADE CONSTRAINTS;

--------------------------------------------------------------
-- Table Creation --

-- Each entity on the model is represented by a table that needs to be created within the Database.
-- Within SQL new tables are created using the CREATE TABLE command.
-- When a table is created its name and its attributes are defined.
-- The values of which are derived from those specified on the model.
-- Certain constraints are sometimes also specified, such as identification of primary keys.

-- Create a Database table to represent the "PAYMENT" entity.
CREATE TABLE PAYMENT(
	payment_id	INTEGER NOT NULL,
	payment_method	VARCHAR(20),
	net_price	FLOAT(8),
	user_id	INTEGER,
	payed_amt	FLOAT(8),
	returned_amt	FLOAT(8),
	payment_date	DATE,
	order_id	INTEGER,
	fk1_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "PAYMENT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_PAYMENT PRIMARY KEY (payment_id)
);

-- Create a Database table to represent the "REVIEW" entity.
CREATE TABLE REVIEW(
	review_id	INTEGER NOT NULL,
	product_id	INTEGER,
	review_title	VARCHAR(20),
	review_text	VARCHAR(100),
	user_id	INTEGER,
	fk1_product_id	INTEGER NOT NULL,
	fk2_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "REVIEW".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_REVIEW PRIMARY KEY (review_id)
);

-- Create a Database table to represent the "ORDERs" entity.
CREATE TABLE ORDERS(
	order_id	INTEGER NOT NULL,
	gross_price	INTEGER,
	order_date	DATE,
	discount_amt	FLOAT(8),
	slot_id	INTEGER,
	order_time DATE,
	cart_id	INTEGER,
	fk1_payment_id	INTEGER NOT NULL,
	-- Specify FK as unique to maintain 1:1 relationship
	UNIQUE(fk1_payment_id),
	fk2_slot_id	INTEGER NOT NULL,
	fk3_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "ORDERS".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_ORDERS PRIMARY KEY (order_id)
);

-- Create a Database table to represent the "CART" entity.
CREATE TABLE CART(
	cart_id	INTEGER NOT NULL,
	user_id	INTEGER,
	fk1_order_id	INTEGER NOT NULL,
	-- Specify FK as unique to maintain 1:1 relationship
	UNIQUE(fk1_order_id),
	fk2_user_id	INTEGER NOT NULL,
	-- Specify FK as unique to maintain 1:1 relationship
	UNIQUE(fk2_user_id),
	-- Specify the PRIMARY KEY constraint for table "CART".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_CART PRIMARY KEY (cart_id)
);

-- Create a Database table to represent the "CART_PRODUCT" entity.
CREATE TABLE CART_PRODUCT(
	cart_id	INTEGER NOT NULL,
	product_id	INTEGER NOT NULL,
	product_quantity	INTEGER,
	total_price	INTEGER,
	-- Specify the PRIMARY KEY constraint for table "CART_PRODUCT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_CART_PRODUCT PRIMARY KEY (cart_id,product_id)
);

-- Create a Database table to represent the "WISHLIST" entity.
CREATE TABLE WISHLIST(
	wishlist_id	INTEGER NOT NULL,
	user_id	INTEGER,
	fk1_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "WISHLIST".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_WISHLIST PRIMARY KEY (wishlist_id)
);

-- Create a Database table to represent the "PRODUCT" entity.
CREATE TABLE PRODUCT(
	product_id	INTEGER NOT NULL,
	product_name	VARCHAR(20),
	unit_price	FLOAT(8),
	stock	INTEGER,
	shop_id	INTEGER,
	offer_id	INTEGER,
	category_id	INTEGER,
	available	INTEGER,
	product_description	VARCHAR(100),
	report_id	INTEGER,
	img_url VARCHAR(100),
	fk1_offer_id	INTEGER,
	fk2_shop_id	INTEGER NOT NULL,
	fk3_category_id	INTEGER NOT NULL,
	fk4_report_id	INTEGER,
	-- Specify the PRIMARY KEY constraint for table "PRODUCT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_PRODUCT PRIMARY KEY (product_id)
);

-- Create a Database table to represent the "SHOP" entity.
CREATE TABLE SHOP(
	shop_id	INTEGER NOT NULL,
	shop_name	VARCHAR(20),
	user_id	INTEGER,
	fk1_trader_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "SHOP".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_SHOP PRIMARY KEY (shop_id)
);

-- Create a Database table to represent the "CATEGORY" entity.
CREATE TABLE CATEGORY(
	category_id	INTEGER NOT NULL,
	category_name	VARCHAR(8),
	category_desc	VARCHAR(100),
	-- Specify the PRIMARY KEY constraint for table "CATEGORY".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_CATEGORY PRIMARY KEY (category_id)
);

-- Create a Database table to represent the "OFFER" entity.
CREATE TABLE OFFER(
	offer_id	INTEGER NOT NULL,
	user_id	INTEGER,
	offer_duration_days	INTEGER,
	start_date	DATE,
	offer_amt	FLOAT(8),
	offer_percentage	FLOAT(8),
	fk1_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "OFFER".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_OFFER PRIMARY KEY (offer_id)
);

-- Create a Database table to represent the "COLLECTION_SLOT" entity.
CREATE TABLE COLLECTION_SLOT(
	slot_id	INTEGER NOT NULL,
	collection_day	VARCHAR(20),
	collection_time	DATE,
	-- Specify the PRIMARY KEY constraint for table "COLLECTION_SLOT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_COLLECTION_SLOT PRIMARY KEY (slot_id)
);

-- Create a Database table to represent the "REPORT" entity.
CREATE TABLE REPORT(
	report_id	INTEGER NOT NULL,
	report_date	DATE,
	report_title	VARCHAR(8),
	report_body	VARCHAR(8),
	user_id	INTEGER,
	fk1_user_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "REPORT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_REPORT PRIMARY KEY (report_id)
);

-- Create a Database table to represent the "USER" entity.
CREATE TABLE USERS(
	user_id	INTEGER NOT NULL,
	first_name	VARCHAR(20),
	last_name	VARCHAR(20),
	report_id	INTEGER,
	date_joined	DATE,
	username	VARCHAR(20),
	password	VARCHAR(50),
	user_type	VARCHAR(10),
	email	VARCHAR(50),
	-- Specify the PRIMARY KEY constraint for table "USER".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_USER PRIMARY KEY (user_id)
);

-- Create a Database table to represent the "WISHLIST_PRODUCT" entity.
CREATE TABLE WISHLIST_PRODUCT(
	product_id	INTEGER NOT NULL,
	wishlist_id	INTEGER NOT NULL,
	product_quantity	INTEGER,
	-- Specify the PRIMARY KEY constraint for table "WISHLIST_PRODUCT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_WISHLIST_PRODUCT PRIMARY KEY (product_id,wishlist_id)
);

-- Create a Database table to represent the "ORDER_PRODUCT" entity.
CREATE TABLE ORDER_PRODUCT(
	order_id	INTEGER NOT NULL,
	product_id	INTEGER NOT NULL,
	fk1_product_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "ORDER_PRODUCT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_ORDER_PRODUCT PRIMARY KEY (order_id,product_id)
);

-- Create a Database table to represent the "ORDER_REPORT" entity.
CREATE TABLE ORDER_REPORT(
	order_id	INTEGER NOT NULL,
	report_id	INTEGER NOT NULL,
	fk1_report_id	INTEGER NOT NULL,
	-- Specify the PRIMARY KEY constraint for table "ORDER_REPORT".
	-- This indicates which attribute(s) uniquely identify each row of data.
	CONSTRAINT	pk_ORDER_REPORT PRIMARY KEY (order_id,report_id)
);


-- --------------------------------------------------------------
-- -- Create LINK tables --

-- -- These tables do not appear as entities on the model. The reason they are created
-- -- is to allow certain types of relationships to be implemented in a Relational type Database.
-- -- Each link table tends to represent a specific relationship that appears on the model.
-- -- The attributes contained in link tables are identified from the entities at either side
-- -- of the relationship. i.e. they do not define attributes in their own right.
-- -- Indeed foreign key constraints are always created to ensure referential integrity between the
-- -- link table attributes and the primary key attributes on which they are based.

-- -- Create a link table to represent the "PRODUCT_CART_PRODUCT" relationship.
-- -- The attributes of this table are taken from the primary keys of table "PRODUCT" and
-- -- table "CART_PRODUCT", i.e. each end of the relationship. A link table was created
-- -- because "PRODUCT_CART_PRODUCT" is a one to many relationship with optionality at the one side.
-- -- notice how the primary key is only based on the key of the table at the many side, i.e. table "CART_PRODUCT".
-- CREATE TABLE PRODUCT_CART_PRODUCT(
-- 	s_product_id	INTEGER NOT NULL,
-- 	d_cart_id	INTEGER NOT NULL,
-- 	d_product_id	INTEGER NOT NULL,
-- 	PRIMARY KEY (d_cart_id,d_product_id),
-- 	FOREIGN KEY(s_product_id) REFERENCES PRODUCT(product_id),
-- 	FOREIGN KEY(d_cart_id,d_product_id) REFERENCES CART_PRODUCT(cart_id,product_id)
-- );

-- -- Create a link table to represent the "contains" relationship.
-- -- The attributes of this table are taken from the primary keys of table "PRODUCT" and
-- -- table "WISHLIST_PRODUCT", i.e. each end of the relationship. A link table was created
-- -- because "contains" is a one to many relationship with optionality at the one side.
-- -- notice how the primary key is only based on the key of the table at the many side, i.e. table "WISHLIST_PRODUCT".
-- CREATE TABLE PRODUCT_contains_WISHLIST_PRODUCT(
-- 	s_product_id	INTEGER NOT NULL,
-- 	d_product_id	INTEGER NOT NULL,
-- 	d_wishlist_id	INTEGER NOT NULL,
-- 	PRIMARY KEY (d_product_id,d_wishlist_id),
-- 	FOREIGN KEY(s_product_id) REFERENCES PRODUCT(product_id),
-- 	FOREIGN KEY(d_product_id,d_wishlist_id) REFERENCES WISHLIST_PRODUCT(product_id,wishlist_id)
-- );

-- -- Create a link table to represent the "CART_CART_PRODUCT" relationship.
-- -- The attributes of this table are taken from the primary keys of table "CART" and
-- -- table "CART_PRODUCT", i.e. each end of the relationship. A link table was created
-- -- because "CART_CART_PRODUCT" is a one to many relationship with optionality at the one side.
-- -- notice how the primary key is only based on the key of the table at the many side, i.e. table "CART_PRODUCT".
-- CREATE TABLE CART_CART_PRODUCT(
-- 	s_cart_id	INTEGER NOT NULL,
-- 	d_cart_id	INTEGER NOT NULL,
-- 	d_product_id	INTEGER NOT NULL,
-- 	PRIMARY KEY (d_cart_id,d_product_id),
-- 	FOREIGN KEY(s_cart_id) REFERENCES CART(cart_id),
-- 	FOREIGN KEY(d_cart_id,d_product_id) REFERENCES CART_PRODUCT(cart_id,product_id)
-- );

-- -- Create a link table to represent the "contains" relationship.
-- -- The attributes of this table are taken from the primary keys of table "ORDER" and
-- -- table "ORDER_REPORT", i.e. each end of the relationship. A link table was created
-- -- because "contains" is a one to many relationship with optionality at the one side.
-- -- notice how the primary key is only based on the key of the table at the many side, i.e. table "ORDER_REPORT".
-- CREATE TABLE ORDER_contains_ORDER_REPORT(
-- 	s_order_id	INTEGER NOT NULL,
-- 	d_order_id	INTEGER NOT NULL,
-- 	d_report_id	INTEGER NOT NULL,
-- 	PRIMARY KEY (d_order_id,d_report_id),
-- 	FOREIGN KEY(s_order_id) REFERENCES ORDER(order_id),
-- 	FOREIGN KEY(d_order_id,d_report_id) REFERENCES ORDER_REPORT(order_id,report_id)
-- );

-- -- Create a link table to represent the "contains" relationship.
-- -- The attributes of this table are taken from the primary keys of table "WISHLIST" and
-- -- table "WISHLIST_PRODUCT", i.e. each end of the relationship. A link table was created
-- -- because "contains" is a one to many relationship with optionality at the one side.
-- -- notice how the primary key is only based on the key of the table at the many side, i.e. table "WISHLIST_PRODUCT".
-- CREATE TABLE WISHLIST_contains_WISHLIST_PRODUCT(
-- 	s_wishlist_id	INTEGER NOT NULL,
-- 	d_product_id	INTEGER NOT NULL,
-- 	d_wishlist_id	INTEGER NOT NULL,
-- 	PRIMARY KEY (d_product_id,d_wishlist_id),
-- 	FOREIGN KEY(s_wishlist_id) REFERENCES WISHLIST(wishlist_id),
-- 	FOREIGN KEY(d_product_id,d_wishlist_id) REFERENCES WISHLIST_PRODUCT(product_id,wishlist_id)
-- );

-- -- Create a link table to represent the "contains" relationship.
-- -- The attributes of this table are taken from the primary keys of table "ORDER" and
-- -- table "ORDER_PRODUCT", i.e. each end of the relationship. A link table was created
-- -- because "contains" is a one to many relationship with optionality at the one side.
-- -- notice how the primary key is only based on the key of the table at the many side, i.e. table "ORDER_PRODUCT".
-- CREATE TABLE ORDER_contains_ORDER_PRODUCT(
-- 	s_order_id	INTEGER NOT NULL,
-- 	d_order_id	INTEGER NOT NULL,
-- 	d_product_id	INTEGER NOT NULL,
-- 	PRIMARY KEY (d_order_id,d_product_id),
-- 	FOREIGN KEY(s_order_id) REFERENCES ORDER(order_id),
-- 	FOREIGN KEY(d_order_id,d_product_id) REFERENCES ORDER_PRODUCT(order_id,product_id)
-- );


--------------------------------------------------------------
-- Alter Tables to add fk constraints --

-- Now all the tables have been created the ALTER TABLE command is used to define some additional
-- constraints.  These typically constrain values of foreign keys to be associated in some way
-- with the primary keys of related tables.  Foreign key constraints can actually be specified
-- when each table is created, but doing so can lead to dependency problems within the script
-- i.e. tables may be referenced before they have been created.  This method is therefore safer.

-- Alter table to add new constraints required to implement the "PRODUCT_OFFER" relationship

-- This constraint ensures that the foreign key of table "PRODUCT"
-- correctly references the primary key of table "OFFER"

ALTER TABLE PRODUCT ADD CONSTRAINT fk1_PRODUCT_to_OFFER FOREIGN KEY(fk1_offer_id) REFERENCES OFFER(offer_id);

-- Alter table to add new constraints required to implement the "REVIEW_PRODUCT" relationship

-- This constraint ensures that the foreign key of table "REVIEW"
-- correctly references the primary key of table "PRODUCT"

ALTER TABLE REVIEW ADD CONSTRAINT fk1_REVIEW_to_PRODUCT FOREIGN KEY(fk1_product_id) REFERENCES PRODUCT(product_id);

-- Alter table to add new constraints required to implement the "ORDER_PAYMENT" relationship

-- This constraint ensures that the foreign key of table "ORDER"
-- correctly references the primary key of table "PAYMENT"

ALTER TABLE ORDERS ADD CONSTRAINT fk1_ORDER_to_PAYMENT FOREIGN KEY(fk1_payment_id) REFERENCES PAYMENT(payment_id);

-- Alter table to add new constraints required to implement the "ORDER_COLLECTION_SLOT" relationship

-- This constraint ensures that the foreign key of table "ORDER"
-- correctly references the primary key of table "COLLECTION_SLOT"

ALTER TABLE ORDERS ADD CONSTRAINT fk2_ORDER_to_COLLECTION_SLOT FOREIGN KEY(fk2_slot_id) REFERENCES COLLECTION_SLOT(slot_id);

-- Alter table to add new constraints required to implement the "PRODUCT_SHOP" relationship

-- This constraint ensures that the foreign key of table "PRODUCT"
-- correctly references the primary key of table "SHOP"

ALTER TABLE PRODUCT ADD CONSTRAINT fk2_PRODUCT_to_SHOP FOREIGN KEY(fk2_shop_id) REFERENCES SHOP(shop_id);

-- Alter table to add new constraints required to implement the "REPORT_USER" relationship

-- This constraint ensures that the foreign key of table "REPORT"
-- correctly references the primary key of table "USER"

ALTER TABLE REPORT ADD CONSTRAINT fk1_REPORT_to_USER FOREIGN KEY(fk1_user_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "CART_ORDER" relationship

-- This constraint ensures that the foreign key of table "CART"
-- correctly references the primary key of table "ORDER"

ALTER TABLE CART ADD CONSTRAINT fk1_CART_to_ORDER FOREIGN KEY(fk1_order_id) REFERENCES ORDERS(order_id);

-- Alter table to add new constraints required to implement the "PRODUCT_CATEGORY" relationship

-- This constraint ensures that the foreign key of table "PRODUCT"
-- correctly references the primary key of table "CATEGORY"

ALTER TABLE PRODUCT ADD CONSTRAINT fk3_PRODUCT_to_CATEGORY FOREIGN KEY(fk3_category_id) REFERENCES CATEGORY(category_id);

-- Alter table to add new constraints required to implement the "contains" relationship

-- This constraint ensures that the foreign key of table "ORDER_REPORT"
-- correctly references the primary key of table "REPORT"

-- ALTER TABLE ORDER_REPORT ADD CONSTRAINT fk1_ORDER_REPORT_to_REPORT FOREIGN KEY(fk1_report_id) REFERENCES REPORT(report_id);

-- Alter table to add new constraints required to implement the "belongs_to" relationship

-- This constraint ensures that the foreign key of table "ORDER_PRODUCT"
-- correctly references the primary key of table "PRODUCT"

-- ALTER TABLE ORDER_PRODUCT ADD CONSTRAINT fk1_ORDER_PRODUCT_to_PRODUCT FOREIGN KEY(fk1_product_id) REFERENCES PRODUCT(product_id);

-- Alter table to add new constraints required to implement the "OFFER_USER" relationship

-- This constraint ensures that the foreign key of table "OFFER"
-- correctly references the primary key of table "USER"

ALTER TABLE OFFER ADD CONSTRAINT fk1_OFFER_to_USER FOREIGN KEY(fk1_user_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "SHOP_USER" relationship

-- This constraint ensures that the foreign key of table "SHOP"
-- correctly references the primary key of table "USER"

ALTER TABLE SHOP ADD CONSTRAINT fk1_SHOP_to_USER FOREIGN KEY(fk1_trader_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "PAYMENT_USER" relationship

-- This constraint ensures that the foreign key of table "PAYMENT"
-- correctly references the primary key of table "USER"

ALTER TABLE PAYMENT ADD CONSTRAINT fk1_PAYMENT_to_USER FOREIGN KEY(fk1_user_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "CART_USER" relationship

-- This constraint ensures that the foreign key of table "CART"
-- correctly references the primary key of table "USER"

ALTER TABLE CART ADD CONSTRAINT fk2_CART_to_USER FOREIGN KEY(fk2_user_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "ORDER_USER" relationship

-- This constraint ensures that the foreign key of table "ORDER"
-- correctly references the primary key of table "USER"

ALTER TABLE ORDERS ADD CONSTRAINT fk3_ORDER_to_USER FOREIGN KEY(fk3_user_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "WISHLIST_USER" relationship

-- This constraint ensures that the foreign key of table "WISHLIST"
-- correctly references the primary key of table "USER"

ALTER TABLE WISHLIST ADD CONSTRAINT fk1_WISHLIST_to_USER FOREIGN KEY(fk1_user_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "REVIEW_USER" relationship

-- This constraint ensures that the foreign key of table "REVIEW"
-- correctly references the primary key of table "USER"

ALTER TABLE REVIEW ADD CONSTRAINT fk2_REVIEW_to_USER FOREIGN KEY(fk2_user_id) REFERENCES USERS(user_id);

-- Alter table to add new constraints required to implement the "PRODUCT_REPORT" relationship

-- This constraint ensures that the foreign key of table "PRODUCT"
-- correctly references the primary key of table "REPORT"

ALTER TABLE PRODUCT ADD CONSTRAINT fk4_PRODUCT_to_REPORT FOREIGN KEY(fk4_report_id) REFERENCES REPORT(report_id);


--------------------------------------------------------------
-- End of DDL file auto-generation
--------------------------------------------------------------
DROP SEQUENCE users_seq;
CREATE SEQUENCE users_seq;
create or replace trigger add_new_user
BEFORE
insert on users
for each row
begin
  if :NEW.user_id is null then 
    select users_seq.nextval into :NEW.user_id from sys.dual; 
  end if; 
end;
/


DROP SEQUENCE product_seq;
CREATE SEQUENCE product_seq;
create or replace trigger add_new_product
BEFORE
insert on product
for each row
begin
  if :NEW.product_id is null then 
    select product_seq.nextval into :NEW.product_id from sys.dual; 
  end if; 
end;
/


DROP SEQUENCE shop_seq;
CREATE SEQUENCE shop_seq;
create or replace trigger add_new_shop
BEFORE
insert on shop
for each row
begin
  if :NEW.shop_id is null then 
    select shop_seq.nextval into :NEW.shop_id from sys.dual; 
  end if; 
end;
/


DROP SEQUENCE category_seq;
CREATE SEQUENCE category_seq;
create or replace trigger add_new_category
BEFORE
insert on category
for each row
begin
  if :NEW.category_id is null then 
    select category_seq.nextval into :NEW.category_id from sys.dual; 
  end if; 
end;
/
commit;
/