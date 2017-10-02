DROP TABLE users;
DROP TABLE comments;
CREATE TABLE users (name TEXT);
CREATE TABLE comments (id INTEGER PRIMARY KEY, comment TEXT, username TEXT);
INSERT INTO users VALUES ('John');
INSERT INTO comments (comment, username) VALUES ('Hello!', '');
