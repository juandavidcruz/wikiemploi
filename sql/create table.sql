DROP TABLE IF EXISTS liens_utilisateurs;
DROP TABLE IF EXISTS utilisateurs;

CREATE TABLE utilisateurs(
id_utilisateur INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_utilisateur VARCHAR(40) NULL,
prenom_utilisateur VARCHAR(40) NULL,
adresse_utilisateur VARCHAR(100) NULL,
cp_utilisateur int(5) NULL,
ville_utilisateur VARCHAR(163) NULL,
pays_utilisateur varchar(2) NOT NULL DEFAULT 'FR',
mail_utilisateur VARCHAR() NOT NULL,
pass_utilisateur PASSWORD NOT NULL,
note_utilisateur INT() NOT NULL DEFAULT 0,
fichiers_utilisateur varchar() NULL,
lv_utilisateur int(1) NOT NULL DEFAULT 0,
date_ajout_utilisateur DATETIME NOT NULL,
date_last_modification_utilisateur DATETIME NOT NULL,
verif_utilisateur int(1) NOT NULL DEFAULT 0,
)
ENGINE=InnoDB;
CREATE TABLE liens_utilisateurs(
id_lien_utilisateur INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
utilisateur_id_1 INT NOT NULL,
utilisateur_id_2 INT NOT NULL,
lv_lien_utilisateur int(1) NOT NULL DEFAULT 1,
accept_lien_utilisateur int(1) NOT NULL DEFAULT 0,
CONSTRAINT fk_utilisateur_id_1 FOREIGN KEY (utilisateur_id_1) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_utilisateur_id_2 FOREIGN KEY (utilisateur_id_2) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB;
