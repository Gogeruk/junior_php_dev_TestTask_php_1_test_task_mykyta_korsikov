

git clone https://github.com/Gogeruk/junior_php_dev_TestTask_php_1_test_task_mykyta_korsikov

1.
cd junior_php_dev_TestTask_php_1_test_task_mykyta_korsikov/
docker-compose up -d

2.
docker ps

3.
docker exec -it <php container id> /bin/bash

4.
composer install

5,
docker exec -it <mysql container id> mysql -u root -ppassword db

6.
MAKE TWO TABLES

create table users(
   id INT NOT NULL AUTO_INCREMENT,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   role INT NOT NULL,
   PRIMARY KEY ( id )
);

create table main_data(
   id INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(255) NOT NULL,
   body VARCHAR(255) NOT NULL,
   user VARCHAR(255) NOT NULL,
   button VARCHAR(255) NOT NULL,
   PRIMARY KEY ( id )
);


7.
GO TO
http://localhost:8080/

8.
CLICK STUFF