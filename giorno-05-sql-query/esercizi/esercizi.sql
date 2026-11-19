--sql
--5.1
SELECT titolo, anno FROM libri ORDER BY anno DESC

--5.2
SELECT titolo, anno FROM libri WHERE anno BETWEEN 1960 AND 1975 ORDER BY anno;

--5.3
SELECT titolo, anno FROM libri WHERE titolo 	LIKE	'%il %';

--5.4
SELECT titolo, pagine FROM libri ORDER BY pagine DESC LIMIT 3;

--5.5
SELECT titolo FROM libri WHERE pagine IS NULL;

--5.6
SELECT DISTINCT nazionalita FROM autori ORDER BY nazionalita;

--5.7
SELECT COUNT(*) AS totale_libri FROM libri;

--5.8
SELECT ROUND(AVG(pagine), 1) AS media, MIN(pagine) AS minimo, MAX(pagine) AS massimo
FROM libri;

--5.9
SELECT genere_id, COUNT(*) AS n_libri
FROM libri
GROUP BY genere_id;

--5.10
SELECT anno, COUNT(*) AS n_libri
FROM libri
GROUP BY anno
HAVING COUNT(*) >= 2;

--5.11
SELECT l.titolo, e.nome AS editore
FROM libri l
JOIN editori e ON l.editore_id = e.id;

--5.12
SELECT l.titolo, e.nome AS editore
FROM libri l
LEFT JOIN editori e ON l.editore_id = e.id;

--5.13
   SELECT g.nome AS genere, COUNT(l.id) AS n_libri
FROM generi g
LEFT JOIN libri l ON l.genere_id = g.id
GROUP BY g.id, g.nome
ORDER BY n_libri DESC

--5.14
SELECT l.titolo, CONCAT(a.nome, ' ', a.cognome) AS autore
FROM libri l
JOIN libri_autori la ON la.libro_id = l.id
JOIN autori a        ON a.id = la.autore_id
ORDER BY l.titolo

--5.15
SELECT a.nome, a.cognome
FROM autori a
LEFT JOIN libri_autori la ON la.autore_id = a.id
WHERE la.libro_id IS NULL;

--5.16
SELECT s.nome, s.cognome
FROM soci s
LEFT JOIN prestiti p ON p.socio_id = s.id
WHERE p.id IS NULL;

--5.17
SELECT CONCAT(s.nome, ' ', s.cognome) AS socio,
       l.titolo,
       p.data_prestito,
       DATEDIFF(CURRENT_DATE, p.data_prestito) AS giorni
FROM prestiti p
JOIN soci s  ON s.id = p.socio_id
JOIN libri l ON l.id = p.libro_id
WHERE p.data_restituzione IS NULL
ORDER BY p.data_prestito;

--5.18
SELECT l.titolo, COUNT(p.id) AS n_prestiti
FROM libri l
JOIN prestiti p ON p.libro_id = l.id
GROUP BY l.id, l.titolo
ORDER BY n_prestiti DESC, l.titolo
LIMIT 5;

--5.19
SELECT CONCAT(s.nome, ' ', s.cognome) AS socio,
       COUNT(p.id) AS prestiti_chiusi,
       ROUND(AVG(DATEDIFF(p.data_restituzione, p.data_prestito)), 1) AS giorni_medi
FROM soci s
JOIN prestiti p ON p.socio_id = s.id
WHERE p.data_restituzione IS NOT NULL
GROUP BY s.id, s.nome, s.cognome
ORDER BY giorni_medi DESC;

--5.20
UPDATE prestiti
SET data_restituzione = CURRENT_DATE
WHERE libro_id = 8 AND data_restituzione IS NULL;

--5.22
DELETE FROM editori WHERE nome = 'Sellerio';
DELETE FROM editori WHERE nome = 'Adelphi';
SELECT titolo, editore_id FROM libri WHERE id IN (11, 12);

--5