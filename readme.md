Etape pour installer [ de mon coté ] :
1 - ( Gitbash ) command : composer create-project symfony/skeleton "nom"
2 - ( Gitbash ) command : cd "nom"
3 - ( Gitbash ) command : composer req api
4 - ( Gitbash ) command : php bin/console doctrine:database:create
5 - ( Gitbash ) command : php bin/console doctrine:schema:create
6 - ( Gitbash ) command : composer req server --dev
7 - ( Gitbash ) command : php bin/console server:run

Récupérer le projet :
1 - ( Gitbash ) command : git clone "mon github"
2 - ( Gitbash ) command : php bin/console server:run
3 - ( Gitbash ) Si la base n'a jamais été créé : php bin/console doctrine:database:create
4 - ( Gitbash ) Si le schema n'a jamais été créé : php bin/console doctrine:schema:create
5 - ( Gitbash ) Si les tables ne sont pas créer ( ou pas à jour ) php bin/console doctrine:schema:update --force
6 - Le lancer sur le navigateur

Faire un CRUD avec PostMan :

Allez dans
->Body
->Selectionner raw
->Selectionner JSON

Exemple : POST Product

Mettre cette url : http://127.0.0.1:8000/api/products
->Placer dans l'aeraText :
 {
    "name": "test name",
    "description": "test description",
    "price": 10,
    "stock": 5,
    "picture": "image.png"
  }

  Un product est ensuite créé

Exemple : PUT ( associé un produit à une category )
Mettre cette url : http://127.0.0.1:8000/api/products/1
{
    "category": "/api/categories/1"
}
