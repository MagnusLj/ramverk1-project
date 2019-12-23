--
-- Creating a sample table.
--



--
-- Table Book
--
DROP TABLE IF EXISTS Answers;
CREATE TABLE Answers (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "questionid" INTEGER NOT NULL,
    "text" TEXT,
    "nick" TEXT,
    "created" DATETIME DEFAULT (STRFTIME('%Y-%m-%d %H:%M', 'NOW', 'localtime'))
);

INSERT INTO Answers (
    "questionid",
    "text",
    "nick"
) VALUES (
    1,
    "Det har spekulerats om det länge med alla möjliga resultat från 12 till 351 triljoner. Det korrekta svaret är 7324453 stycken.",
    "Expert1"
)
;


INSERT INTO Answers (
    "questionid",
    "text",
    "nick"
) VALUES (
    1,
    "Det finns bara 17 bultar i Ölandsbron, resten sitter ihop med träpluggar.",
    "Expert3"
)
;



INSERT INTO Answers (
    "questionid",
    "text",
    "nick"
) VALUES (
    2,
    "Det är en bra fråga. Svaret är att det är närheten till Öresund med dess vindar och en allmänt motvindsfrämjande stadsplanering och gömda fläktsystem som sattes dit av danskarna strax innan Skåne blev svenskt som samverkar till den ständiga motvinden.",
    "Expert1"
)
;




INSERT INTO Answers (
    "questionid",
    "text",
    "nick"
) VALUES (
    2,
    "Det är på grund av Malmös närhet till ett intergalaktiskt wormhole. I staden Hugamottu på planeten Betelgeuse 3B, som är på andra sidan wormholet, är det alltid medvind.",
    "Expert2"
)
;
