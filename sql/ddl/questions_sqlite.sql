--
-- Creating a sample table.
--



--
-- Table Book
--
DROP TABLE IF EXISTS Questions;
CREATE TABLE Questions (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "title" TEXT,
    "text" TEXT,
    "nick" TEXT,
    "created" TIMESTAMP
);

INSERT INTO Questions (
    "title",
    "text",
    "nick"
) VALUES (
    "First title",
    "First text",
    "User1"
)
;

INSERT INTO Questions (
    "title",
    "text",
    "nick"
) VALUES (
    "Second title",
    "Second text",
    "User2"
)
;
