CREATE TABLE dipendenti (
    matricola VARCHAR(10) PRIMARY KEY,
    nome VARCHAR(42) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mansione VARCHAR(255) NOT NULL,
    password VARCHAR(60) NOT NULL
);

CREATE TABLE cellulare (
    id_cellulare CHAR(10) PRIMARY KEY,
    marca CHAR(20) NOT NULL,
    garanzia CHAR(20) NOT NULL
);

CREATE TABLE manutentore (
    id_manutentore CHAR(10) PRIMARY KEY,
    nome CHAR(20) NOT NULL,
    foto CHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    ruolo VARCHAR(50) NOT NULL
);

CREATE TABLE richiesta (
    id_richiesta INTEGER PRIMARY KEY AUTO_INCREMENT,
    dipendente_matricola VARCHAR(10) NOT NULL,
    --cellulare_id CHAR(10) NOT NULL,
    --manutentore_id CHAR(10) NOT NULL,  
    descrizione TEXT NOT NULL,
    data DATE NOT NULL,
    stato CHAR(20) NOT NULL,
    FOREIGN KEY (dipendente_matricola) REFERENCES dipendenti(matricola),
    --FOREIGN KEY (cellulare_id) REFERENCES cellulare(id_cellulare),
    --FOREIGN KEY (manutentore_id) REFERENCES manutentore(id_manutentore)
);

CREATE TABLE problema (
    id_problema CHAR(10) PRIMARY KEY,
    tipo CHAR(20) NOT NULL,
    tempo_riparazione CHAR(20) NOT NULL
);

CREATE TABLE contiene (
    id_problema CHAR(10),
    id_richiesta INTEGER,
    PRIMARY KEY (id_problema, id_richiesta),
    FOREIGN KEY (id_problema) REFERENCES problema(id_problema) ON DELETE CASCADE,
    FOREIGN KEY (id_richiesta) REFERENCES richiesta(id_richiesta) ON DELETE CASCADE
);
