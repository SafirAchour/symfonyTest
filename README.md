A technical test using the Symfony Framework and the 'FizzBuzz' algorithm.

Instructions:

Pour rappel, le but et d'afficher tous les entiers entre 1 à 100, sauf pour les entiers :
•	Multiple de 3 et de 5 => remplacer par FizzBuzz
•	Multiple de 5 => remplacer par Fizz
•	Multiple de 3 => Remplacer par Buzz
Cet exercice est un classique de l'algorithmique, vous n'aurez aucun soucis à trouver l'algorithme sur Internet.


Simplement, au lieu de les afficher de manière statique, nous allons utiliser Symfony, voici l'énoncé :

•	Créer une entité Integer afin de gérer les entiers de 1 à 100, non multiples de 3 et 5
•	Créer une entité FizzBuzz afin de gérer les entiers multiples de 3 ET 5
•	Créer une entité Fizz afin de gérer les entiers multiples de 5
•	Créer une entité Buzz afin de gérer les entiers multiples de 3
Pour chacune des entités, créer un contrôleur avec, à minima, une méthode pour hydrater les tables (les remplir).
(L'utilisation d'une interface serait appréciée).

Dans une vue, avoir  quatre buttons  pour exécuter ces méthodes (Routing !).

Dans une autre vue, avoir la liste des 4 listes d'entiers dans l'ordre avec, à chaque fois, le mot clé correspondant. Les 4 listes doivent donc être mergés.

Exemple :

•	1
•	2
•	3 Buzz
•	4
•	5 Fizz
•	etc.

Remarque : Je ne devrais pas pouvoir ajouter 5 à une autre table que Fizz, pour cela, il est recommandé de déclencher une exception quand le cas se produit.
