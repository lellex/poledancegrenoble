# Thème Wordpress pour http://poledancegrenoble.fr/

## Setup

Le template est basé sur [FoundationPress](https://foundationpress.olefredrik.com/). Il nécéssite npm version 0.10.x et bower.

`npm install && bower install`

Lancer le serveur de développement

`grunt`


## Deploiement

Le site utilise ftp pour le déploiement. Pour l'utiliser avec git et [git-ftp](https://github.com/git-ftp/git-ftp) : 

`git ftp push --remote-root public_html/wp-content/themes/PoleDanceGrenoble
`
