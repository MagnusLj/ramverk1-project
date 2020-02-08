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
    "userid" INTEGER,
    "created" DATETIME DEFAULT (STRFTIME('%Y-%m-%d %H:%M', 'NOW', 'localtime'))
);
--
-- INSERT INTO Questions (
--     "title",
--     "text",
--     "nick",
--     "userid"
-- ) VALUES (
--     "Hur många bultar finns det i Ölandsbron?",
--     "Det här har jag undrat över länge. Jag minns inte om frågan nånsin besvarades i Nile City. Är det någon som vet?",
--     "Banarne",
--     1
-- )
-- ;
--
-- INSERT INTO Questions (
--     "title",
--     "text",
--     "nick",
--     "userid"
-- ) VALUES (
--     "Varför är det alltid motvind i Malmö?",
--     "Det har jag alltid undrat över. Det kvittar om man svänger runt ett hörn så har man motvind ändå. Ibland har man fortfarande motvind än om man vänder och cyklar åt andra hållet. Kan någon upplysa mig om det här?",
--     "adambertil",
--     2
-- )
-- ;
