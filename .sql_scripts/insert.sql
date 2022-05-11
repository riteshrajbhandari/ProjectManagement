INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL)
VALUES('Ritesh', 'Rajbhandari', '05/06/2022', 'riteshrajbh', 'HelloWorld', 'Customer', 'rajbhandari.ritesh@hotmail.com', 'images\deli.jpg');

INSERT INTO SHOP(SHOP_NAME,
USER_ID)VALUES
('Fresh Bakery', 101);

INSERT INTO CATEGORY(CATEGORY_NAME,
CATEGORY_DESC)VALUES
('Bakery', 'Everything bakery related. Bread, cookies, desserts, sweets.');




-- insert a trader first
-- INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL)
-- VALUES('Sajid', 'Miya', '05/11/2022', 'sajid', 'HelloWorld', 'Trader', 'sajid.miya@hotmail.com');


--then inseert an offer

INSERT INTO OFFER(OFFER_ID,
OFFER_DURATION_DAYS,
START_DATE,
OFFER_AMT,
OFFER_PERCENTAGE)
VALUES(0, 0,'05/11/2022',0,0);


INSERT INTO PRODUCT(PRODUCT_NAME,
UNIT_PRICE,
STOCK,

AVAILABLE,
SHORT_DESCRIPTION,
PRODUCT_DESCRIPTION,
-- REPORT_ID,
IMG_URL,
RATING,
FK2_SHOP_ID,
FK3_CATEGORY_ID)
VALUES('Bread', 0.99, 4, 1, 'Its literally bread','Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!', 'images\Screenshot 2022-04-09 184212.png',2.5, 1, 1);




INSERT INTO REVIEW(

REVIEW_TITLE,
REVIEW_TEXT,
REVIEW_DATE,
RATING,
FK1_PRODUCT_ID,
FK2_USER_ID)
VALUES('Good bread', 'This bread is very good. I buy this everyday.','05/11/2022', 4.5, 1, 101);

--remove all columns that are already present as foreign keys