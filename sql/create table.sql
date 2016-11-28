DROP TABLE IF EXISTS commentaires_aide;
DROP TABLE IF EXISTS aides;
DROP TABLE IF EXISTS commentaires_article;
DROP TABLE IF EXISTS articles;
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
mail_utilisateur VARCHAR(100) NOT NULL,
pass_utilisateur VARCHAR(245) NOT NULL,
note_utilisateur INT NOT NULL DEFAULT 0,
fichiers_utilisateur TEXT NULL,
lv_utilisateur int(1) NOT NULL DEFAULT 0,
date_ajout_utilisateur DATETIME NOT NULL,
date_last_modification_utilisateur DATETIME NOT NULL,
verif_utilisateur int(1) NOT NULL DEFAULT 0
)
ENGINE=InnoDB;

CREATE TABLE liens_utilisateurs(
id_lien_utilisateur INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
lien_utilisateur_id_utilisateur_1 INT NOT NULL,
lien_utilisateur_id_utilisateur_2 INT NOT NULL,
lv_lien_utilisateur int(1) NOT NULL DEFAULT 1,
accept_lien_utilisateur int(1) NOT NULL DEFAULT 0,
accept_private_message_lien_utilisateur int(1) NOT NULL DEFAULT 0,
CONSTRAINT fk_lien_utilisateur_id_utilisateur_1 FOREIGN KEY (lien_utilisateur_id_utilisateur_1) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_lien_utilisateur_id_utilisateur_2 FOREIGN KEY (lien_utilisateur_id_utilisateur_2) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE private_messages(
id_private_message INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
private_message_id_utilisateur_1 INT NOT NULL,
private_message_id_utilisateur_2 INT NOT NULL,
titre_private_message VARCHAR(100) NOT NULL,
texte_private_message TEXT NOT NULL,
CONSTRAINT fk_private_message_id_utilisateur_1 FOREIGN KEY (private_message_id_utilisateur_1) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_private_message_id_utilisateur_2 FOREIGN KEY (private_message_id_utilisateur_2) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE articles(
id_article INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
article_id_utilisateur INT NOT NULL,
titre_article VARCHAR(255) NOT NULL,
mots_clef_article VARCHAR(200) NULL,
texte_article TEXT NOT NULL,
accept_article int(1) NOT NULL DEFAULT 0,
date_ajout_article DATETIME NOT NULL,
date_last_modification_article DATETIME NOT NULL,
publication_article INT(1) NOT NULL DEFAULT 0,
CONSTRAINT fk_article_id_utilisateur FOREIGN KEY (article_id_utilisateur) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE aides(
id_aide INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
aide_id_utilisateur INT NOT NULL,
titre_aide VARCHAR(255) NOT NULL,
mots_clef_aide VARCHAR(200) NULL,
texte_aide TEXT NOT NULL,
nv_cercle_aide int(1) NOT NULL DEFAULT 0,
date_ajout_aide DATETIME NOT NULL,
date_last_modification_aide DATETIME NOT NULL,
publication_aide INT(1) NOT NULL DEFAULT 0,
CONSTRAINT fk_aide_id_utilisateur FOREIGN KEY (aide_id_utilisateur) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE commentaires_article(
id_commentaire_article INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
commentaire_article_id_utilisateur INT NOT NULL,
commentaire_article_id_article int NOT NULL,
texte_commentaire_article TEXT NOT NULL,
date_ajout_commentaire_article DATETIME NOT NULL,
date_last_modification_commentaire_article DATETIME NOT NULL,
CONSTRAINT fk_commentaire_article_id_utilisateur FOREIGN KEY (commentaire_article_id_utilisateur) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_commentaire_article_id_article FOREIGN KEY (commentaire_article_id_article) REFERENCES articles(id_article) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE commentaires_aide(
id_commentaire_aide INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
commentaire_aide_id_utilisateur INT NOT NULL,
commentaire_aide_id_aide int NOT NULL,
texte_commentaire_aide TEXT NOT NULL,
date_ajout_commentaire_aide DATETIME NOT NULL,
date_last_modification_commentaire_aide DATETIME NOT NULL,
CONSTRAINT fk_commentaire_aide_id_utilisateur FOREIGN KEY (commentaire_aide_id_utilisateur) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_commentaire_aide_id_aide FOREIGN KEY (commentaire_aide_id_aide) REFERENCES aides(id_aide) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB;