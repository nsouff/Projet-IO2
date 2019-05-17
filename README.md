# Projet-IO2
## But
Ce site a été réalisé dans le cadre d'un projet de la matière Internet et outils lors du 2ème semestre de ma première année de licence informatique
## Instructions
### Base de donnée
Pour faire marcher le site: Créer une base de données du nom de Site, puis créer un utilisateur s'appelant site avec le mot de passe 'IO2_site' en lui accordant les droits sur cette base de données (si vous voulez utiliser d'autre nom changez les paramètres de la fonction dans connex_BD.php)
En étant dans la base de données Site, utilisez la commande source de mysql avec le fichier 'create_DB.sql', vous avez désormais la base de données du site.
Le root sera déjà inscrit.

### Dossier CV et lettre de motivation
Le projet contient également deux dossiers CV et Motiv, ceux ci seront vides, si les droits ne sont pas à 733 veuillez s'il vous plaît à faire un chmod 733 sur ces deux dossiers.

### Voir le site avec des exemples
Si vous voulez ajouter des exemples au site utilisez le fichier 'create_example.sql', en l'utilisant comme source, vous aurez un certain nombre d'utilisateur et d'entreprise, vous pouvez allez voir leur mot de passe et email dans le fichier.
Voilà quelques exemples d'utilisateurs avec en premier leur adresse mail et en deuxième leur mot de passe:

* le root: 'root@gmail.com', 'root_IO2_emploi'
* un administrateur: 'admin1@gmail.com', 'admin_mdp_1'
* un utilisateur quelconque: 'exempleuser@gmail.com', 'exemple'
* une entreprise validé: 'a@gmail.com', 's'
* une entreprise non validé: 'a@hotmail.fr', 's'

A noter que le mot de passe de toutes les entreprises que nous avons crée pour l'exemple est 's' et que celui de tous les utilisateurs (autre que root/administrateur) est 'exemple'

Il n'y a aucun exemple d'utilisateur qui a postulé à une annonce, cependant nous invitons à le faire et à voir le résultat (seul les fichiers .docx, .doc et .pdf sont acceptés).
De plus une fois avoir postulé nous vous invitons à regarder le résultats du côté de l'entreprise pour pouvoir lire le CV et potentiellement la lettre de motivation.

### Autres
On peut également retrouver les instructions dans le fichier INSTRUCTION.txt

Le fichier Rapport_IO2.pdf est le rapport du projet à rendre
## Contributeurs
* Zoghely Anys
* Souffan Nathan
