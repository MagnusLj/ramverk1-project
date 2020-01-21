--
-- Creating a User table.
--



--
-- Table User
--
--DROP TABLE IF EXISTS User;
--CREATE TABLE User (
--    "id" INTEGER PRIMARY KEY NOT NULL,
--    "nick" TEXT UNIQUE NOT NULL,
--    "password" TEXT,
--    "created" TIMESTAMP,
--    "updated" DATETIME,
--    "deleted" DATETIME,
--    "active" DATETIME
--);

DROP TABLE IF EXISTS User;
CREATE TABLE User (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "nick" TEXT NOT NULL,
    "email" VARCHAR NOT NULL,
    "gravatarUrl" VARCHAR NOT NULL,
    "password" TEXT,
    "created" TIMESTAMP,
    "updated" DATETIME,
    "deleted" DATETIME,
    "active" DATETIME,
    "points" INTEGER
);
