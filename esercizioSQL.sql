CREATE TABLE dipendenti(
    matricola CHAR(10) PRIMARY KEY,
    nome CHAR(20) NOT NULL,
    email CHAR(20) NOT NULL,
    mansione CHAR(20) NOT NULL,
    password CHAR(20) NOT NULL
);

CREATE TABLE cellulare(
    id_cellulare CHAR(10) PRIMARY KEY,
    marca CHAR(20) NOT NULL,
    garanzia CHAR(20) NOT NULL
);

CREATE TABLE manutentore(
    id_manutentore CHAR(10) PRIMARY KEY,
    nome CHAR(20) NOT NULL,
    foto CHAR(20) NOT NULL,
    email CHAR(20) NOT NULL,
    password CHAR(20) NOT NULL
);

CREATE TABLE richiesta(
    id_richiesta CHAR(10) PRIMARY KEY,
    dipendente_Matricola CHAR(10) NOT NULL,
    Cellulare_ID CHAR(10) NOT NULL,
    Manutentore_ID CHAR(10) NOT NULL,  
    descrizione CHAR(20) NOT NULL,
    data DATE NOT NULL,
    stato CHAR(20) NOT NULL,
    CONSTRAINT gino FOREIGN KEY (dipendente_Matricola) REFERENCES dipendenti(matricola),
    CONSTRAINT marco FOREIGN KEY (Cellulare_ID) REFERENCES cellulare(id_cellulare),
    CONSTRAINT filippo FOREIGN KEY (Manutentore_ID) REFERENCES manutentore(id_manutentore)
);

CREATE TABLE problema(
    id_problema CHAR(10) PRIMARY KEY,
    tipo CHAR(20) NOT NULL,
    tempoRiparazione CHAR(20) NOT NULL
);

CREATE TABLE contiene(
    id_problema INT REFERENCES problema(id_problema) ON DELETE CASCADE,
    id_richiesta INT REFERENCES richiesta(id_richiesta) ON DELETE CASCADE
);

ALTER TABLE contiene ADD PRIMARY KEY (id_problema, id_richiesta);
