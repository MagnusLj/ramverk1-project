--
-- Creating a table.
--



--
-- Table Tags
--

--
-- Ämnen
-- Underhållning, Natur/Vetenskap, Kultur/Litteratur, Geografi, Historia, Sport/Fritid,
--
DROP TABLE IF EXISTS Tags;
CREATE TABLE Tags (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "questionid" INTEGER NOT NULL,
    "tag" VARCHAR NOT NULL
);

INSERT INTO Tags (
    "questionid",
    "tag"
) VALUES (
    1,
    "Natur/Vetenskap"
)
;

INSERT INTO Tags (
    "questionid",
    "tag"
) VALUES (
    1,
    "Geografi"
)
;

INSERT INTO Tags (
    "questionid",
    "tag"
) VALUES (
    1,
    "Historia"
)
;

INSERT INTO Tags (
    "questionid",
    "tag"
) VALUES (
    2,
    "Natur/Vetenskap"
)
;

INSERT INTO Tags (
    "questionid",
    "tag"
) VALUES (
    2,
    "Geografi"
)
;

INSERT INTO Tags (
    "questionid",
    "tag"
) VALUES (
    2,
    "Sport/Fritid"
)
;
