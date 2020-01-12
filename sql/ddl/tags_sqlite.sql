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
DROP TABLE IF EXISTS Tags;
CREATE TABLE Tags (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "tag" VARCHAR NOT NULL
);

INSERT INTO Tags (
    "tag"
) VALUES (
    "Geografi"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "Historia"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "Kultur/Litteratur"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "Natur/Vetenskap"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "Sport/Fritid"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "Underhållning"
)
;
