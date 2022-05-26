-- INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER)
-- VALUES('Ritesh', 'Rajbhandari', '05/06/2022', 'riteshrajbh', 'HelloWorld', 'Customer', 'rajbhandari.ritesh@hotmail.com', 'images/deli.jpg', 'M');

INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, VERIFIED, DATE_OF_BIRTH)
VALUES('Ritesh(Trader)', 'Rajbhandari', '05/06/2022', 'trader_one', 'db8ac1c259eb89d4a131b253bacfca5f319d54f2', 'Trader', 'rajbhandari.ritesh@hotmail.com', 'images/deli.jpg', 'M', 1, '12/01/2000');

INSERT INTO SHOP(SHOP_NAME,
USER_ID)VALUES
('Fresh Bakery', 101);



INSERT INTO OFFER(OFFER_ID,
OFFER_DURATION_DAYS,
START_DATE,
OFFER_AMT,
OFFER_PERCENTAGE)
VALUES(0, 0,'05/11/2022',0,0);









insert into category(CATEGORY_NAME, CATEGORY_DESC) values ('Bakery', 'this is brrrrread');
insert into category(CATEGORY_NAME, CATEGORY_DESC) values ('Butchers', 'this is butcher');
insert into category(CATEGORY_NAME, CATEGORY_DESC) values ('Greengrocer', 'this is a vegetable');
insert into category(CATEGORY_NAME, CATEGORY_DESC) values ('Fishmonger', 'this is fishy');
insert into category(CATEGORY_NAME, CATEGORY_DESC) values ('Delicatessen', 'this is cured meat and olives and stuff');


 


INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, VERIFIED, DATE_OF_BIRTH)
VALUES('Tej', 'Rana', '05/06/2022', 'tejj', '92ebd8ec0b6f26d2c2b1ef25b3260a9a44cf730a', 'Trader', 'tej.r12@gmail.com', 'images/baker.jpeg', 'M', 1, '12/01/2000');

INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, VERIFIED, DATE_OF_BIRTH)
VALUES('Madan', 'Karki', '05/06/2022', 'kmadan', 'fb464ec99929d760e016f677dd8537570621835b', 'Trader', 'karkimadan@gmail.com.com', 'images/butcher.jpeg', 'M', 1, '12/01/2000');

INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, VERIFIED, DATE_OF_BIRTH)
VALUES('Hari', 'Shrestha', '05/06/2022', 'harish', '46ebaaa2b80c7a3459b80353e085aaeed5aff2ff', 'Trader', 'shari@gmail.com', 'images/greengrocer.jpeg', 'M', 1, '12/01/2000');

INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, VERIFIED, DATE_OF_BIRTH)
VALUES('Krishna', 'Poudel', '05/06/2022', 'krishnaa', '8e3ee9d5d3c305f9525b9cb6d284c5236c15c503', 'Trader', 'poudelk1h@gmail.com.com', 'images/fishmonger.png', 'M', 1, '12/01/2000');

INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, VERIFIED, DATE_OF_BIRTH)
VALUES('Ramesh', 'Shah', '05/06/2022', 'sramesh', '53edd6990376d7b5f512d2b5556613ca2567f04c', 'Trader', 'shah123@gmail.com', 'images/delecaties.jpeg', 'M', 1, '12/01/2000');

INSERT INTO SHOP(SHOP_NAME, USER_ID)
VALUES('Tej Bakery', 102);

INSERT INTO SHOP(SHOP_NAME, USER_ID)
VALUES('Madan Meat Shop', 103);

INSERT INTO SHOP(SHOP_NAME, USER_ID)
VALUES('Hari grocery', 104);

INSERT INTO SHOP(SHOP_NAME, USER_ID)
VALUES('Krishna Fish Shop', 105);

INSERT INTO SHOP(SHOP_NAME, USER_ID)
VALUES('Ramesh Delecaties', 106);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Chuck'),
 9,
 10,
 1,
 'Its part of beef',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\chuck.jpeg',
 3,
 2);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Ribs'),
 8,
 10,
 1,
 'Its part of beef',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\Ribs.jpeg',
 3,
 2);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Sirloin'),
 15,
 7,
 1,
 'Its part of beef',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\sirloin.jpeg',
 3,
 2);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Brisket'),
 21,
 10,
 1,
 'Its part of beef',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\brisket.jpeg',
 3,
 2);



INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Chicken breast'),
5,
 15,
 1,
 'Its part of chicken',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\chicken_breast.jpeg',
 3,
 2);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Drumstick'),
 0.99,
 4,
 1,
 'Its part of chicken',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\drumstick.jpeg',
 3,
 2);




INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Chicken thigh'),
 6,
 20,
 1,
 'Its part of chicken',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\chicken_thigh.jpeg',
 3,
 2);




INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Chicken wings'),
 6,
 25,
 1,
 'Its part of chickenf',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\chicken_wings.jpeg',
 3,
 2);

 
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
VALUES(UPPER('Bread'), 0.99, 4, 1, 'Its literally bread','Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!', 'images\Screenshot 2022-04-09 184212.png',2.5, 1, 1);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Doughnut'),
 3,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\doughnut.jpeg',
 1,
 1);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Banana Muffin'),
 4,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\banana_muffin.jpeg',
 1,
 1);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Apple Pie'),
 7,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\apple_pie.jpeg',
 1,
 1);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Cheesecake'),
 8,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\cheesecake.jpeg',
 1,
 1);



INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Brownies'),
 7,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\brownies.jpeg',
 1,
 1);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Chocolate Cake'),
 9,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\chocolate_cake.jpeg',
 1,
 1);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Shortbread Cookies'),
 5,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\shortbread_cookies.jpeg',
 1,
 1);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Gingerbread cookies'),
 3,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\gingerbread_cookies.jpeg',
 1,
 1);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Chocolate chip cookies'),
 4,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\chocolate_chip_cookies.jpeg',
 1,
 1);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Bagel'),
 3,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\bagel.jpeg',
 2,
 1);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Bun'),
 2,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\bun.jpeg',
 2,
 1);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Cinnamon rolls'),
 3,
 7,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\cinnamon_rolls.jpeg',
 2,
 1);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Biscuit'),
 2,
 10,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\biscuit.jpeg',
 2,
 1);



INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Milk bread loaf'),
2,
 15,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\milk_bread_loaf.jpeg',
 2,
 1);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Brown bread loaf'),
 3,
 4,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\brown_bread.jpeg',
 2,
 1);



INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Sourdough loaf'),
 5,
 25,
 1,
 'Its a bakery product',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\sourdough_loaf.jpeg',
 2,
 1);

 
INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Potatoes'),
 3,
 10,
 1,
 'Its a vegetble',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\potatoes.jpeg',
 4,
 3);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Tomatoes'),
 4,
 10,
 1,
 'Its a vegetble',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\tomatoes.jpeg',
 4,
 3);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Carrots'),
 7,
 10,
 1,
 'Its a vegetble',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\carrots.jpeg',
 4,
 3);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Lettuce'),
 8,
 10,
 1,
 'Its a vegetble',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\lettuce.jpeg',
 4,
 3);



INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Onion'),
 7,
 10,
 1,
 'Its a vegetble',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\onion.jpeg',
 4,
 3);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Salmon'),
 35,
 10,
 1,
 'Its a fish',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\salmon.jpeg',
 5,
 4);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Trout'),
 17,
 10,
 1,
 'Its a fish',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\trout.jpeg',
 5,
 4);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Mackerel'),
 9,
 10,
 1,
 'Its a fish',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\mackerel.jpeg',
 5,
 4);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Cod'),
 10,
 10,
 1,
 'Its a fish',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\cod.jpeg',
 5,
 4);



INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Tuna'),
 14,
 10,
 1,
 'Its a fish',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\tuna.jpeg',
 5,
 4);


INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Chorizo'),
 35,
 10,
 1,
 'Its cured meat',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\chorizo.webp',
 6,
 5);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Pancetta'),
 17,
 10,
 1,
 'Its cured meat',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\pancetta.jpeg',
 6,
 5);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Prosciutto'),
 9,
 10,
 1,
 'Its cured meat',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\prosciutto.jpeg',
 6,
 5);

INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Pepperoni'),
 10,
 10,
 1,
 'Its cured meat',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\pepperoni.jpeg',
 6,
 5);



INSERT INTO PRODUCT(PRODUCT_NAME,
 UNIT_PRICE,
  STOCK, 
  AVAILABLE, 
  SHORT_DESCRIPTION, 
  PRODUCT_DESCRIPTION, 
  IMG_URL, 
  FK2_SHOP_ID, 
  FK3_CATEGORY_ID)
VALUES(UPPER('Gherkins'),
 14,
 10,
 1,
 'Its a pickle',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente unde dicta deserunt ipsam voluptas atque nobis voluptatum veniam! Quam velit ex tenetur, 
 repellendus eum impedit alias odio eaque modi perferendis ipsa eos consequatur id rerum laborum vitae, fugit amet reiciendis!',
 'images\gherkins.jpeg',
 6,
 5);

 INSERT INTO REVIEW(

REVIEW_TITLE,
REVIEW_TEXT,
REVIEW_DATE,
RATING,
FK1_PRODUCT_ID,
FK2_USER_ID)
VALUES('very very good', 'I looovveeeee this product! Would buy again!','05/11/2022', 4.5, 14, 101);

INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, VERIFIED, DATE_OF_BIRTH)
VALUES('Ritesh', 'Rajbhandari', '05/06/2022', 'customer', 'db8ac1c259eb89d4a131b253bacfca5f319d54f2', 'Customer', 'rajbhandari.ritesh@hotmail.com', 'images/deli.jpg', 'M', 1, '12/01/2000');

insert into payment (
PAYMENT_METHOD,
NET_PRICE,
PAYED_AMT,
RETURNED_AMT,
PAYMENT_DATE,
FK1_USER_ID)
VALUES('paypal', 50, 50, 0, '05/26/2022',107);

insert into collection_slot(COLLECTION_DAY, COLLECTION_TIME)
VALUES('Wed 01-Jun-22', '13:00 - 16:00');

insert into orders(
GROSS_PRICE,
ORDER_DATE,
FK1_PAYMENT_ID,
FK2_SLOT_ID,
FK3_USER_ID)
VALUES(5,'05/26/2022',1, 1, 107);

insert into order_product(
ORDER_ID,
PRODUCT_ID,
PRODUCT_QUANTITY
)VALUES(1, 25, 2);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very very good',
 'The buns were very fresh and fluffy',
 '05/11/2022', 5, 20, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'The cheese cake was really good',
 '05/11/2022', 4, 13, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'The salmon was really fresh',
 '05/11/2022', 4, 31, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very   very good',
 'the brisket was really of good quality. the marbelling was lovely',
 '05/11/2022', 5, 4, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'The cut was average size but good in quality',
 '05/11/2022', 3.5, 1, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('good',
 'The ribs had less meat compared to before',
 '05/11/2022', 3, 2, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'The breasts were in bigger in size and worth the price',
 '05/11/2022', 4.5, 5, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'The meet was fresh, would buy again',
 '05/11/2022', 4, 6, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('Average',
 'Not so great',
 '05/11/2022', 2.5, 7, 107);
INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('Average',
 'The size was small',
 '05/11/2022', 2.5, 8, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  very good',
 'The bread was really fresh and tasty',
 '05/11/2022', 5, 9, 107);
INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'Really tasty doughnut, would order again',
 '05/11/2022', 5, 10, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('good',
 'Average in taste ',
 '05/11/2022', 3, 11, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'Very flavourful',
 '05/11/2022', 4, 12, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very very good',
 'Chocolaty and fudgy brownies, just how i like it to be',
 '05/11/2022', 5, 14, 107);



INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  very good',
 'Chocolaty, yum yum!!',
 '05/11/2022', 5, 15, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('bad',
 'Not so good',
 '05/11/2022', 2, 16, 107);




INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  very good',
 'Best coocie i have ever eaten',
 '05/11/2022', 5, 17, 107);


INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  very good',
 'yum yum!! Would order more of it',
 '05/11/2022', 5, 18, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('good',
 'good in taste',
 '05/11/2022', 3, 19, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('good',
 'Good in taste',
 '05/11/2022', 3, 21, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'Flufy and good in taste',
 '05/11/2022', 4, 22, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'The bread was very fresh and fluffy',
 '05/11/2022', 4, 23, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('good',
 'The loaf was very fresh and healthy',
 '05/11/2022', 3.5, 24, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'very good quality sourdough',
 '05/11/2022', 4, 25, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('very  good',
 'good quality potatoes',
 '05/11/2022', 4, 26, 107);
INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('good',
 'Fresh and good',
 '05/11/2022', 4, 27, 107);

INSERT INTO REVIEW (REVIEW_TITLE, REVIEW_TEXT, REVIEW_DATE, RATING, FK1_PRODUCT_ID, FK2_USER_ID)
VALUES('good',
 'fresh ',
 '05/11/2022', 4, 28, 107);
