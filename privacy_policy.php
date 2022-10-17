<?php
include("connect.php");
include("constant.php");
include("utils.php");
include("header.php");

//<!-- div clear => Push Sticky Header For Hiding Content -->
echo '<div class="clear-homepage-header"></div>';
echo '<div class="clear-homepage-header"></div>';

echo '<div style="margin-left:20px; width:60vw; margin: auto;">';

echo '<div style="text-align:center;"><h1>POLITIQUE DE CONFIDENTIALITÉ<br>DONNÉES PERSONNELLES</h1></div>';


echo '<br>';
echo '<br>';
echo '<br>';


echo '<div>';
echo '<h2 class="h2-lh-mb">Définitions<br></h2>
        <p class="bold">
        <span class="bolder">L\'Éditeur</span>
        <span class="lighter"> : La personne, physique ou morale, 
        qui édite les services de communication au public en ligne.</span></p>

        <p class="bold"><span class="bolder">
        Le Site </span><span class="lighter">  : L\'ensemble des sites, pages Internet et services en ligne proposés par l\'Éditeur.
        </span></p>

        <p class="bold"><span class="bolder">
        L\'Utilisateur</span><span class="lighter"> : La personne utilisant le Site et les services.
        </span></p>';
echo '</div>';


echo '<br>';
echo '<br>';


echo '<div>';
echo '<h2 class="h2-lh-mb">1- Nature des données collectées</h2>';

echo '<p class="bold"><span class="bolder">
Dans le cadre de l\'utilisation des Sites, l\'Éditeur est susceptible de collecter les catégories 
de données suivantes concernant ses Utilisateurs :</span><br>
<span class="lighter">
Données de connexion (adresses IP, journaux d\'événements...)
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">2- Communication des données personnelles à des tiers</h2>';
echo '<p class="bold">
<span class="bolder">Pas de communication à des tiers</span><br>
<span class="lighter">
Vos données ne font l\'objet d\'aucune communication à des tiers. Vous êtes toutefois informés 
qu\'elles pourront être divulguées en application d\'une loi, d\'un règlement ou en vertu d\'une 
décision d\'une autorité réglementaire ou judiciaire compétente.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">3- Information préalable pour la communication des données personnelles à des tiers en cas de fusion / absorption </h2>';

echo '<p class="bold">
<span class="bolder">
Information préalable et possibilité d’opt-out avant et après la fusion / acquisition</span><br>
<span class="lighter">
Dans le cas où nous prendrions part à une opération de fusion, d’acquisition ou à toute autre 
forme de cession d’actifs, nous nous engageons à garantir la confidentialité de vos données 
personnelles et à vous informer avant que celles-ci ne soient transférées ou soumises à de 
nouvelles règles de confidentialité.</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">4- Agrégation des données</h2>';
echo '<p class="bold">
<span class="bolder">
Agrégation avec des données non personnelles
</span><br>
<span class="lighter">
Nous pouvons publier, divulguer et utiliser les informations agrégées (informations relatives à 
tous nos Utilisateurs ou à des groupes ou catégories spécifiques d\'Utilisateurs que nous 
combinons de manière à ce qu\'un Utilisateur individuel ne puisse plus être identifié ou 
mentionné) et les informations non personnelles à des fins d\'analyse du secteur et du marché, 
de profilage démographique, à des fins promotionnelles et publicitaires et à d\'autres fins 
commerciales.
</span>
<br>
<span class="bolder">
Agrégation avec des données personnelles disponibles sur les comptes sociaux de l\'Utilisateur
</span><br>
<span class="lighter">
Si vous connectez votre compte à un compte d’un autre service afin de faire des envois croisés, 
ledit service pourra nous communiquer vos informations de profil, de connexion, ainsi que toute 
autre information dont vous avez autorisé la divulgation. Nous pouvons agréger les informations 
relatives à tous nos autres Utilisateurs, groupes, comptes, aux données personnelles disponibles 
sur l’Utilisateur.
</span>
</p>';
echo "</div>";

echo "<br>";
echo "<br>";

echo "<div>";

echo '<h2 class="h2-lh-mb">5- Collecte des données d\'identité</h2>';
echo '<p>
<span class="bolder">
Consultation libre
</span><br>
<span class="lighter">
La consultation du Site ne nécessite pas \'inscription ni d\'identification préalable. Elle peut 
s\'effectuer sans que vous ne communiquiez de données nominatives vous concernant (nom, 
prénom, adresse, etc). Nous ne procédons à aucun enregistrement de données nominatives 
pour la simple consultation du Site.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">6- Collecte des données d\'identification</h2>';

echo '<p class="bold">
<span class="bolder">
Utilisation de l\identifiant de l\'utilisateur pour proposition de mise en relation et offres commerciales
</span><br>
<span class="lighter">
Nous utilisons vos identifiants électroniques pour rechercher des relations présentes par 
connexion, par adresse mail ou par services. Nous pouvons utiliser vos informations de contact 
pour permettre à d\'autres personnes de trouver votre compte, notamment via des services tiers 
et des applications clientes. Vous pouvez télécharger votre carnet d\'adresses afin que nous 
soyons en mesure de vous aider à trouver des connaissances sur notre réseau ou pour 
permettre à d\'autres Utilisateurs de notre réseau de vous trouver. Nous pouvons vous proposer 
des suggestions, à vous et à d\'autres Utilisateurs du réseau, à partir des contacts importés de 
votre carnet d’adresses. Nous sommes susceptibles de travailler en partenariat avec des 
sociétés qui proposent des offres incitatives. Pour prendre en charge ce type de promotion et 
d\'offre incitative, nous sommes susceptibles de partager votre identifiant électronique.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">7- Collecte des données du terminal</h2>';
echo '<p class="bold">
<span class="bolder">
Aucune collecte des données techniques
</span><br>
<span class="lighter">
Nous ne collectons et ne conservons aucune donnée technique de votre appareil (adresse IP, 
fournisseur d\'accès à Internet...).
</span>
</p>';
echo '</div>';


echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">8- Cookies</h2>';
echo '<p class="bold">
<span class="bolder">
Durée de conservation des cookies
</span>
<br>
<span class="lighter">
Conformément aux recommandations de la CNIL, la durée maximale de conservation des 
cookies est de 13 mois au maximum après leur premier dépôt dans le terminal de l\'Utilisateur, 
tout comme la durée de la validité du consentement de l\’Utilisateur à l\’utilisation de ces cookies. 
La durée de vie des cookies n’est pas prolongée à chaque visite. Le consentement de 
l\’Utilisateur devra donc être renouvelé à l\'issue de ce délai.</span><br><br>

<span class="bolder">
Finalité cookies
</span>
<br>
<span class="lighter">
Les cookies peuvent être utilisés pour des fins statistiques notamment pour optimiser les 
services rendus à l\'Utilisateur, à partir du traitement des informations concernant la fréquence 
d\'accès, la personnalisation des pages ainsi que les opérations réalisées et les informations 
consultées.<br>
Vous êtes informé que l\'Éditeur est susceptible de déposer des cookies sur votre terminal. Le 
cookie enregistre des informations relatives à la navigation sur le service (les pages que vous 
avez consultées, la date et l\'heure de la consultation...) que nous pourrons lire lors de vos visites 
ultérieures.</span><br>

<span class="bolder">
Droit de l\'Utilisateur de refuser les cookies
</span>
<br>
<span class="lighter">
Vous reconnaissez avoir été informé que l\'Éditeur peut avoir recours à des cookies. Si vous ne 
souhaitez pas que des cookies soient utilisés sur votre terminal, la plupart des navigateurs vous 
permettent de désactiver les cookies en passant par les options de réglage.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">9 - Conservation des données techniques</h2>';
echo '<p class="bold">
<span class="bolder">
Durée de conservation des données techniques
</span>
<br>
<span class="lighter">
Les données techniques sont conservées pour la durée strictement nécessaire à la réalisation 
des finalités visées ci-avant.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">10- Délai de conservation des données personnelles et d\'anonymisation </h2>';
echo '<p class="bold">
<span class="bolder">
Pas de conservation des données
</span><br>
<span class="lighter">
Nous ne conservons aucune donnée personnelle au delà de votre durée de connexion au 
service pour les finalités décrites dans les présentes Politique de confidentialité.
Suppression des données après suppression du compte
Des moyens de purge de données sont mis en place afin d\'en prévoir la suppression effective 
dès lors que la durée de conservation ou d\'archivage nécessaire à l\'accomplissement des 
finalités déterminées ou imposées est atteinte. Conformément à la loi n°78-17 du 6 janvier 1978 
relative à l\'informatique, aux fichiers et aux libertés, vous disposez par ailleurs d\'un droit de 
suppression sur vos données que vous pouvez exercer à tout moment en prenant contact avec 
l\'Éditeur.
</span><br>

<span class="bolder">
Suppression des données après 3 ans d\'inactivité
</span><br>
<span class="lighter">
Pour des raisons de sécurité, si vous ne vous êtes pas authentifié sur le Site pendant une 
période de trois ans, vous recevrez un e-mail vous invitant à vous connecter dans les plus brefs 
délais, sans quoi vos données seront supprimées de nos bases de données.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">11- Suppression du compte</h2>';
echo '<p class="bold">
<span class="bolder">
Suppression du compte à la demande
</span><br>
<span class="lighter">
L\'Utilisateur a la possibilité de supprimer son Compte à tout moment, par simple demande à 
l\'Éditeur OU par le menu de suppression de Compte présent dans les paramètres du Compte le 
cas échéant.</span><br>
<span class="bolder">
Suppression du compte en cas de violation de la Politique de Confidentialité
</span><br>
<span class="lighter">
En cas de violation d\'une ou de plusieurs dispositions de la Politique de Confidentialité ou de tout 
autre document incorporé aux présentes par référence, l\'Éditeur se réserve le droit de mettre fin 
ou restreindre sans aucun avertissement préalable et à sa seule discrétion, votre usage et accès 
aux services, à votre compte et à tous les Sites.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">12- Indications en cas de faille de sécurité décelée par l\'Éditeur</h2>'; 
echo '<p class="bold">
<span class="bolder">
Information de l\'Utilisateur en cas de faille de sécurité
</span><br>
<span class="lighter">
Nous nous engageons à mettre en oeuvre toutes les mesures techniques et organisationnelles 
appropriées afin de garantir un niveau de sécurité adapté au regard des risques d\'accès 
accidentels, non autorisés ou illégaux, de divulgation, d\'altération, de perte ou encore de 
destruction des données personnelles vous concernant. Dans l\'éventualité où nous prendrions 
connaissance d\'un accès illégal aux données personnelles vous concernant stockées sur nos 
serveurs ou ceux de nos prestataires, ou d\'un accès non autorisé ayant pour conséquence la 
réalisation des risques identifiés ci-dessus, nous nous engageons à :
Vous notifier l\'incident dans les plus brefs délais ;
Examiner les causes de l\'incident et vous en informer ;
Prendre les mesures nécessaires dans la limite du raisonnable afin d\'amoindrir les effets négatifs 
et préjudices pouvant résulter dudit incident.</span><br>

<span class="bolder">
Limitation de la responsabilité</span><br>
<span class="lighter">
En aucun cas les engagements définis au point ci-dessus relatifs à la notification en cas de faille 
de sécurité ne peuvent être assimilés à une quelconque reconnaissance de faute ou de 
responsabilité quant à la survenance de l\'incident en question.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">13- Transfert des données personnelles à l\'étranger</h2>';

echo '<p class="bold">
<span class="bolder">
Pas de transfert en dehors de l\'Union européenne
</span><br>
<span class="lighter">
L\'Éditeur s\'engage à ne pas transférer les données personnelles de ses Utilisateurs en dehors 
de l\'Union européenne.<br><br>
https://www.cnil.fr/fr/la-protection-des-donnees-dans-le-mondehttps://www.cnil.fr/fr/la-protectiondes-donnees-dans-le-monde
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';
echo '<h2 class="h2-lh-mb">14- Modification de la politique de confidentialité</h2>';
echo '<p class="bold">
<span class="bolder">
En cas de modification de la présente Politique de Confidentialité, engagement de ne pas 
baisser le niveau de confidentialité de manière substantielle sans l\'information préalable 
des personnes concernées</span><br>
<span class="lighter">
Nous nous engageons à vous informer en cas de modification substantielle de la présente 
Politique de Confidentialité, et à ne pas baisser le niveau de confidentialité de vos données de 
manière substantielle sans vous en informer et obtenir votre consentement.*
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';
echo '<div>';
echo '<h2 class="h2-lh-mb">15- Droit applicable et modalités de recours</h2>';
echo '<p class="bold">
<span class="bolder">
Clause d\'arbitrage
</span><br>
<span class="lighter">
Vous acceptez expressément que tout litige susceptible de naître du fait de la présente Politique 
de Confidentialité, notamment de son interprétation ou de son exécution, relèvera d\'une 
procédure d\'arbitrage soumise au règlement de la plateforme d\'arbitrage choisie d\'un commun 
accord, auquel vous adhérerez sans réserve.
</span>
</p>';
echo '</div>';

echo '<br>';
echo '<br>';

echo '<div>';

echo '<h2 class="h2-lh-mb">16- Portabilité des données</h2>';
echo '<p class="bold">

<span class="bolder"> 
Portabilité des données
</span><br>
<span class="lighter">
L\'Éditeur s\'engage à vous offrir la possibilité de vous faire restituer l\'ensemble des données 
vous concernant sur simple demande. L\'Utilisateur se voit ainsi garantir une meilleure 
maîtrise de ses données, et garde la possibilité de les réutiliser. Ces données devront être 
fournies dans un format ouvert et aisément réutilisable.
</span>
</p>';
echo '</div>';




echo '</div>';





//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';

include("footer.php");
?>