Ce site repertorie mes (premières) créations de dev.

L'accès à la partie admin peut se faire grâce au bouton qui se trouve sur toutes les pages.
Pour la connection, il faut utiliser

            l'identifiant : admin
            le mot de passe :  admin

Il faut créer dans MySQL une base de données au nom de "mon_book" (oui, le 15ème de ce nom) et importer la bdd qui se trouve dans le dossier sql.

Il faut vérifier et modifier, si besoin, $utilisateur et $motdepasse de connexion à MySQL dans le fichier config.php qui se trouve à la racine ainsi que le chemin d'URL_SITE.


AVERTISSEMENTS :

- Je n'ai pas réussi à ajouter de nouveaux projets à partir du site. Les nouveaux projets s'enregistrent avec l'id_projet "0". Je sais que je peux trouver comment faire, mais là mon cerveau fume.
- J'ai tenté de cripter le mdp des users, mais je n'arrive pas à les décripter au moment de la saisie.
- La pagination laisse à désirer.
- Lorsqu'on modifie un projet il faut impérativement indiquer les techno car autrement elles s'effacent et les technos du site ne sont plus indéxées.
- Il y a un souci avec les images car j'ai voulu insérer une colonne url_image dans le tableau, mais finalement elle ne me sert à rien et il faut que j' l'enleve. A ce point, je suis trop cuite pour le faire, mais je vais m'en occuper.

Courage !

Et merci pour ces cours merveilleux :)
