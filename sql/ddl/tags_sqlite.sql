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
    "geografi"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "historia"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "kulturlitteratur"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "naturvetenskap"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "sportfritid"
)
;

INSERT INTO Tags (
    "tag"
) VALUES (
    "underhallning"
)
;
