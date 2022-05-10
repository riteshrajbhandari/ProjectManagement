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
SHORT_DESCRIPTION,
PRODUCT_DESCRIPTION,
REPORT_ID,
IMG_URL,
RATING,
FK2_SHOP_ID,
FK3_CATEGORY_ID)
VALUES('Bread', 0.99, 4, 1, 1, 1, 'Its literally bread','Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!', 1011, 'images\Screenshot 2022-04-09 184212.png',2.5, 1, 1);

INSERT INTO REVIEW(
PRODUCT_ID,
REVIEW_TITLE,
REVIEW_TEXT,
USER_ID,
RATING,
FK1_PRODUCT_ID,
FK2_USER_ID)
VALUES(1,'Good bread', 'This bread is very good. I buy this everyday.' ,1, 4.5, 1, 1);

--remove all columns that are already present as foreign keys