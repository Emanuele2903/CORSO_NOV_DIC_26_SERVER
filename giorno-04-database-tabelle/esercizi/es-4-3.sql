
-- Gaddemn as focchiu beib --

USE lezione_sql;

CREATE TABLE soci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    data_iscrizione DATE DEFAULT (CURRENT_DATE)
);

CREATE TABLE prestiti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    socio_id INT NOT NULL,
    libro_id INT UNSIGNED NOT NULL,
    data_prestito DATE NOT NULL,
    data_restituzione DATE DEFAULT NULL,
    FOREIGN KEY (libro_id) REFERENCES libri(id),
    FOREIGN KEY (socio_id) REFERENCES soci(id)
);

INSERT INTO soci (nome, cognome, email)
VALUES
('Anna', 'Rossi', 'anna@example.com'),
('Marco', 'Bianchi', 'marco@example.com'),
('Luca', 'Verdi', 'luca@example.com');