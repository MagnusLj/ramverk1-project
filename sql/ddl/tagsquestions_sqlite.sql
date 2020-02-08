--
-- Creating a table.
--



--
-- Table Tags
--

--
-- Ämnen
--
-- 1 Geografi
-- 2 Historia
-- 3 Kultur/Litteratur
-- 4 Natur/Vetenskap
-- 5 Sport/Fritid
-- 6 Underhållning
--

DROP TABLE IF EXISTS Tagsquestions;
CREATE TABLE Tagsquestions (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "questionid" INTEGER NOT NULL,
    "tagid" VARCHAR NOT NULL
);

-- INSERT INTO Tagsquestions (
--     "questionid",
--     "tagid"
-- ) VALUES (
--     1,
--     4
-- )
-- ;
--
-- INSERT INTO Tagsquestions (
--     "questionid",
--     "tagid"
-- ) VALUES (
--     1,
--     1
-- )
-- ;
--
-- INSERT INTO Tagsquestions (
--     "questionid",
--     "tagid"
-- ) VALUES (
--     1,
--     2
-- )
-- ;
--
-- INSERT INTO Tagsquestions (
--     "questionid",
--     "tagid"
-- ) VALUES (
--     2,
--     4
-- )
-- ;
--
-- INSERT INTO Tagsquestions (
--     "questionid",
--     "tagid"
-- ) VALUES (
--     2,
--     1
-- )
-- ;
--
-- INSERT INTO Tagsquestions (
--     "questionid",
--     "tagid"
-- ) VALUES (
--     2,
--     5
-- )
-- ;
