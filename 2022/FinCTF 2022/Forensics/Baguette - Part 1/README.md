# Baguette - Part 1

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 

Bonjour,

Peux-tu m'aider à retrouver ma baguette ?

J'ai par erreur formaté mon Pc, et j'ai complètement oublié de faire une sauvegarde avant :( Ce n'est pas forcément gênant, sauf pour un fichier qui s'appelle baguette.

J'ai cherché partout chez moi et je n'ai rien trouvé. Je me suis souvenu que j'avais partagé ma baguette avec quelqu'un il y a de cela 1 mois ou deux, via un site de partage en ligne, où tu peux partager un fichier avec un simple mot de passe.

Apparemment, ils avaient mal sécurisé la BDD et il y a eu une fuite d'information ! J'ai pu retrouver l'archive zip de mon fichier chiffré, ainsi qu'une valeur bizarre comme mot de passe, sur un forum obscure du Dark Web (ThugLife!)

J'ai essayé le mot de passe indiqué dans la fuite (voir fuite.csv) pour ouvrir leur archive zip, mais cela ne marche pas. Cela ne m'avance pas trop. J'ai maintenant deux mots de passe à trouver :(

Est-ce que tu peux me donner un coup de main pour retrouver le mot de passe de leur archive zip, afin que je puisse essayer de retrouver le mot de passe de ma baguette ensuite ? Je ne sais pas trop quoi faire :(

Qui sait, tu peux peut-être me trouver les deux mots de passe ^^ !

Merci beaucoup de ton aide.

Michel.

PS. Le password du zip est le premier flag.


# Sources
- https://finctf.ettic.net/challenges#Baguette%20-%20Part%201-37
- [fuite.csv](./fuite.csv)
- [c3a86.zip](./c3a86.zip)


# Solution
## 1. Nous avons un indice qui nous dit que le mot de passe est composé de 9 nombres (^\d{9}$)
## Le hash est d'une longueur de 40 caractères qui nous fait penser à du SHA-1
## Utilisons John the ripper en inscrivant le hash dans un fichier hash.txt

```
john -format=raw-sha1 --incremental-digits ./hash.txt
```