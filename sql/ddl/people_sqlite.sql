--
-- Creating a sample table.
--



--
-- Table Book
--
DROP TABLE IF EXISTS People;
CREATE TABLE People (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "nick" TEXT NOT NULL,
    "email" VARCHAR NOT NULL
);

INSERT INTO People (
    "nick",
    "email"
) VALUES (
    "User1",
    "a@b.se"
)

;
