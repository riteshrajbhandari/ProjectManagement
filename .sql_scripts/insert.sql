INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL) 
VALUES('Ritesh', 'Rajbhandari', '05/06/2022', 'riteshrajbh', 'HelloWorld', 'Customer', 'rajbhandari.ritesh@hotmail.com');

INSERT INTO SHOP(SHOP_NAME,
FK1_TRADER_ID)VALUES
('Fresh Bakery', 1);

INSERT INTO CATEGORY(CATEGORY_NAME,
CATEGORY_DESC)VALUES
('Bakery', 'Everything bakery related. Bread, cookies, desserts, sweets.');

INSERT INTO PRODUCT(PRODUCT_NAME,
UNIT_PRICE,
STOCK,
SHOP_ID,
CATEGORY_ID,
AVAILABLE,
PRODUCT_DESCRIPTION,
REPORT_ID,
IMG_URL,
FK2_SHOP_ID,
FK3_CATEGORY_ID)
VALUES('Bread', 0.99, 4, 1, 1, 1, 'Its literally bread', 1011, 'images\Screenshot 2022-04-09 184212.png', 1, 1);


--remove all columns that are already present as foreign keys





--INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL) 
--VALUES('Ritesh', 'Rajbhandari', '05/06/2022', 'riteshrajbh', 'HelloWorld', 'Customer', 'rajbhandari.ritesh@hotmail.com');

--INSERT INTO SHOP(SHOP_NAME,
--FK1_TRADER_ID)VALUES
--('Fresh Bakery', 1);

INSERT INTO CATEGORY(CATEGORY_NAME,
CATEGORY_DESC)VALUES
('Bakery', 'Everything bakery related. Bread, cookies, desserts, sweets.');

INSERT INTO PRODUCT(PRODUCT_NAME,
UNIT_PRICE,
STOCK,
SHOP_ID,
CATEGORY_ID,
AVAILABLE,
PRODUCT_DESCRIPTION,
REPORT_ID,
IMG_URL,
FK2_SHOP_ID,
FK3_CATEGORY_ID)
VALUES('Bread', 0.99, 4, 1, 1, 1, 'Its literally bread', 1011, 'images\Screenshot 2022-04-09 184212.png', 1, 1);
