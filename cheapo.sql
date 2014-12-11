CREATE TABLE User
(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
FirstName varchar(20) NOT NULL,
LastName varchar(20) NOT NULL,
Password varchar(50) NOT NULL,
Username varchar(20)NOT NULL
);

CREATE TABLE Message
(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
body varchar(5000),
subject varchar(50),
user_id int,
FOREIGN KEY(user_id) REFERENCES User(id)
);


CREATE TABLE Recipients
(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
message_id int NOT NULL,
recipient_id int NOT NULL,
FOREIGN KEY(message_id) REFERENCES Message(id),
FOREIGN KEY(recipient_id) REFERENCES User(id)
);

CREATE TABLE Message_read
(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
message_id int NOT NULL,
reader_id int NOT NULL,
_date date,
FOREIGN KEY(message_id) REFERENCES Message(id),
FOREIGN KEY(reader_id) REFERENCES User(id)
);
