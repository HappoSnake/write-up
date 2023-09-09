# Jamais sans mon riz - flag 4

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 

Viens en apprendre un peu plus sur ta vraie passion, et profites-en pour peaufiner tes connaissances sur les vulnérabilités webs! Une suite de défis qui progressent en difficulté tout au long du parcours, de débutant à expérizmenté.


# Sources
- https://finctf.ettic.net/challenges#Flag%202-33


# Solution
## 1. Il y a une page pour téléverser des images dans la partie admin. Utilisons la vulnérabilité LFI pour comprendre le code source de la page [upload.php](../upload.php)
```
?postid=php://filter/convert.base64-encode/resource=admin/upload.php
```

## 2. Nous savons que :
- les extensions sont valider dans la page [upload.php](../upload.php) (jpg et png)
- les fichiers son téléversés dans le répertoire '/var/www/uploads/session_id()/' à partir de la page [upload.php](../upload.php)
- le flag 4 est dans une variable d'environnement qui est le mot de passe de l'utilisateur admin : [login.php](../login.php)

## 3. Nous allon téléverser le fichier [flagPHP.jpg](../flagPHP.jpg)flag.jpg avec du code php 

