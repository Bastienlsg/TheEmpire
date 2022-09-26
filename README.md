Pour créer ce projet nous avons fait cette commande :
    symfony new --webapp TheEmpire

Nous avons ajouté un .envsample, il suffit de le renommer .env et d'y ajouter ce qu'il faut pour la connexion à la BDD

Pour créer la BDD nous avons fait cette commande :
    php bin/console doctrine:database:create