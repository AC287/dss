CREATE TABLE IF NOT EXISTS wpii_indidata (
  `firstname` varchar(255),
  `lastname` varchar(255),
  `team` varchar(255),
  `iq1` int(2),
  `iq2` int(2),
  `iq3` int(2),
  `iq4` int(2),
  `iq5` int(2),
  `iq6` int(2),
  `iq7` int(2),
  `iq8` int(2),
  `iq9` int(2),
  `iq10` int(2),
  `iq11` int(2),
  `iq12` int(2),
  `iq13` int(2),
  `iq14` int(2),
  `iq15` int(2),
  `step4` int(2),
  `step5` int(2),
  `individualscore` int(2)
);

CREATE TABLE IF NOT EXISTS wpii_teamdata (
  `team` varchar(255),
  `tq1` int(2),
  `tq2` int(2),
  `tq3` int(2),
  `tq4` int(2),
  `tq5` int(2),
  `tq6` int(2),
  `tq7` int(2),
  `tq8` int(2),
  `tq9` int(2),
  `tq10` int(2),
  `tq11` int(2),
  `tq12` int(2),
  `tq13` int(2),
  `tq14` int(2),
  `tq15` int(2)
);

CREATE TABLE IF NOT EXISTS wpii_questions (
  `q1` varchar(255),
  `q2` varchar(255),
  `q3` varchar(255),
  `q4` varchar(255),
  `q5` varchar(255),
  `q6` varchar(255),
  `q7` varchar(255),
  `q8` varchar(255),
  `q9` varchar(255),
  `q10` varchar(255),
  `q11` varchar(255),
  `q12` varchar(255),
  `q13` varchar(255),
  `q14` varchar(255),
  `q15` varchar(255)
);

INSERT INTO `wpii_questions` (
  `q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`,`q11`,`q12`,`q13`,`q14`,`q15`
) VALUES (
  "Flashlight(4-battery size)",
  "Jackknife",
  "Sectional Air Map of the Area",
  "Plastic Raincoat(large size)",
  "Magnetic Compass",
  "Compress Kit with Gauze",
  ".45 Caliber Pistol (loaded)",
  "Parachute(red and white)",
  "Bottle of Salt Tablets(1000 tablets)",
  "1 Quart (.9 liter) of Water per Person",
  "Book Entitled Edible Animals of the Desert",
  "Pair of Sunglasses per Person",
  "2 Quarts (1.89 liter) of 180 Proof Vodka",
  "1 Top Coat per Person",
  "Cosmetic Mirror"
);
