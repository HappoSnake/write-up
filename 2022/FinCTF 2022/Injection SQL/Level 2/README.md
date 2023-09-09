# Level 2

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 
<img src=../SQL_Challenge.png>

# Sources
- https://finctf.ettic.net/challenges#Level%201-22
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
```
Nous pouvons injecter
```
' or true;
```
<img src=./solution.png>