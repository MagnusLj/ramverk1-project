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
    "questiontitle" TEXT,
    "text" TEXT,
    "nick" TEXT,
    "userid" INTEGER,
    "created" DATETIME DEFAULT (STRFTIME('%Y-%m-%d %H:%M', 'NOW', 'localtime'))
);

-- INSERT INTO Answers (
--     "questionid",
--     "questiontitle",
--     "text",
--     "nick",
--     "userid"
-- ) VALUES (
--     1,
--     "Hur många bultar finns det i Ölandsbron?",
--     "Det har spekulerats om det länge med alla möjliga resultat från 12 till 351 triljoner. Det korrekta svaret är 7324453 stycken.",
--     "adambertil",
--     2
-- )
-- ;
--
--
-- INSERT INTO Answers (
--     "questionid",
--     "questiontitle",
--     "text",
--     "nick",
--     "userid"
-- ) VALUES (
--     1,
--     "Hur många bultar finns det i Ölandsbron?",
--     "Det finns bara 17 bultar i Ölandsbron, resten sitter ihop med träpluggar.",
--     "Banarne",
--     1
-- )
-- ;
--
--
--
-- INSERT INTO Answers (
--     "questionid",
--     "questiontitle",
--     "text",
--     "nick",
--     "userid"
-- ) VALUES (
--     2,
--     "Varför är det alltid motvind i Malmö?",
--     "Det är en bra fråga. Svaret är att det är närheten till Öresund med dess vindar och en allmänt motvindsfrämjande stadsplanering och gömda fläktsystem som sattes dit av danskarna strax innan Skåne blev svenskt som samverkar till den ständiga motvinden.",
--     "adambertil",
--     2
-- )
-- ;
--
--
--
--
-- INSERT INTO Answers (
--     "questionid",
--     "questiontitle",
--     "text",
--     "nick",
--     "userid"
-- ) VALUES (
--     2,
--     "Varför är det alltid motvind i Malmö?",
--     "Det är på grund av Malmös närhet till ett intergalaktiskt wormhole. I staden Hugamottu på planeten Betelgeuse 3B, som är på andra sidan wormholet, är det alltid medvind.",
--     "Banarne",
--     1
-- )
-- ;
