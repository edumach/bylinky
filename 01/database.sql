CREATE DATABASE bylinky;

CREATE USER 'user'@'localhost' IDENTIFIED BY '12345';

GRANT ALL PRIVILEGES ON bylinky.* TO 'user'@'localhost';

FLUSH PRIVILEGES;
