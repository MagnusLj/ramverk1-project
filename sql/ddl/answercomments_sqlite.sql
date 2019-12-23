--
-- Creating a sample table.
--



--
-- Table Book
--
DROP TABLE IF EXISTS Answercomments;
CREATE TABLE Answercomments (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "answerid" INTEGER NOT NULL,
    "text" TEXT,
    "nick" TEXT,
    "created" DATETIME DEFAULT (STRFTIME('%Y-%m-%d %H:%M', 'NOW', 'localtime'))
);

INSERT INTO Answercomments (
    "answerid",
    "text",
    "nick"
) VALUES (
    1,
    "Hur vet du det, har du räknat dem själv?",
    "Snubbe3"
)
;


INSERT INTO Answercomments (
    "answerid",
    "text",
    "nick"
) VALUES (
    2,
    "Vilken sorts trä är det?",
    "Snubbe4"
)
;



INSERT INTO Answercomments (
    "answerid",
    "text",
    "nick"
) VALUES (
    3,
    "Danskarna alltså? Man kan inte lita på såna.",
    "Snubbe5"
)
;




INSERT INTO Answercomments (
    "answerid",
    "text",
    "nick"
) VALUES (
    4,
    "Det är en väldigt omvälvande tanke.",
    "Snubbe6"
)
;


INSERT INTO Answercomments (
    "answerid",
    "text",
    "nick"
) VALUES (
    4,
    "Är inte det farligt med såna wormholes?",
    "Snubbe7"
)
;
