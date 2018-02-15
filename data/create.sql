-- App Sec Demo
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS comments;
CREATE TABLE users (name TEXT);
CREATE TABLE comments (id INTEGER PRIMARY KEY, comment TEXT, username TEXT);
INSERT INTO users VALUES ('Admin');
INSERT INTO comments (comment, username) VALUES ('Welcome!', 'Admin');
INSERT INTO comments (comment, username) VALUES ('Hello', '');

-- Hit Tracker
DROP TABLE IF EXISTS hits;
CREATE TABLE hits (count INTEGER);
INSERT INTO hits VALUES (0);
