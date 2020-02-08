--
-- Creating a sample table.
--



--
-- Table Book
--
DROP TABLE IF EXISTS Questioncomments;
CREATE TABLE Questioncomments (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "questionid" INTEGER NOT NULL,
    "text" TEXT,
    "nick" TEXT,
    "userid" INTEGER,
    "created" DATETIME DEFAULT (STRFTIME('%Y-%m-%d %H:%M', 'NOW', 'localtime'))
);

-- INSERT INTO Questioncomments (
--     "questionid",
--     "text",
--     "nick"
-- ) VALUES (
--     1,
--     "Är det nån som vet det? Johan Rheborg kanske?",
--     "Snubbe1"
-- )
-- ;
--
--
-- INSERT INTO Questioncomments (
--     "questionid",
--     "text",
--     "nick"
-- ) VALUES (
--     1,
--     "Vem bryr sig? Det är väl tillräcklig många.",
--     "Snubbe2"
-- )
-- ;
--
--
--
-- INSERT INTO Questioncomments (
--     "questionid",
--     "text",
--     "nick"
-- ) VALUES (
--     2,
--     "Jag kör bil så jag bryr mig inte.",
--     "Snubbe1"
-- )
-- ;
--
--
--
--
-- INSERT INTO Questioncomments (
--     "questionid",
--     "text",
--     "nick"
-- ) VALUES (
--     2,
--     "Men flytta till Östersund då, där är det säkert bättre.",
--     "Snubbe2"
-- )
-- ;
