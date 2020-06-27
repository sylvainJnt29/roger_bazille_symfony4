<?php

namespace App\DataFixtures;

use App\Entity\Actu;
use App\Entity\Menu;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $utilisateur1 = new Utilisateur();
        $utilisateur1->setUsername('christian')
                        ->setPassword('password')
                        ->setRoles('ROLE_USER_PROF');
        $manager->persist($utilisateur1);

        $utilisateur2 = new Utilisateur();
        $utilisateur2->setUsername('Sylvie')
                        ->setPassword('mdp_mairie')
                        ->setRoles('ROLE_USER_MAIRIE');
        $manager->persist($utilisateur2);

        $utilisateur3 = new Utilisateur();
        $utilisateur3->setUsername('David')
                        ->setPassword('mdp_parent')
                        ->setRoles('ROLE_USER_PARENT');
        $manager->persist($utilisateur3);

        $utilisateur4 = new Utilisateur();
        $utilisateur4->setUsername('Nolwenn')
                        ->setPassword('password_conseil')
                        ->setRoles('ROLE_USER_CONSEIL');
        $manager->persist($utilisateur4);

        $utilisateur5 = new Utilisateur();
        $utilisateur5->setUsername('sylvain')
                        ->setPassword('$2y$10$B8OR9qEX5j3lY5Fg/5lWEO8o64kZmbxi4w3x4nF9SWd7QdORrwKi2')
                        ->setRoles('ROLE_ADMIN');
        $manager->persist($utilisateur5);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $actuProf1 = new Actu();
        $actuProf1->setCreatedAt(new \DateTime('01-04-2020'))
                ->setTitre("1er Avril : poisson d’avril")
                ->setArticle("Voici quelques petites activités pour ce 1er jour du mois d’avril.
                Avril va bientôt arriver et les petits poissons d’avril aussi. J’adore cette période
                de l’année où les beaux jours commencent à venir, le soleil, les fleurs, les bonnes
                odeurs d’herbes coupées, les balades plus longues en extérieur… Le printemps ! Et aussi
                mon anniversaire, je suis pile poil née le 1er avril, d’où l’envie de mettre les bouchées
                doubles pour ce jour festif !
                Le 1er avril est l’occasion idéale pour sortir les poissons de toutes sortes. Les petits,
                les gros, les moches, les beaux, les tordus, les drôles, les gonflés, les maigrichons.
                Et hop on dégaine un poisson pour le coller sur le dos de son voisin :p Et on oublie pas d’y ajouter
                quelques blagues rigolotes (ou pas) pour bien se mettre dans l’ambiance de ce jour farceur.
                En attendant l’arrivée du 1er avril, je vous invite à proposer des moments créatifs à votre (vos)
                enfants pour patienter avant le jour J. Des bricolages de poissons d’avril pour petits et grands qui
                devrait inspirer nos chers bambins. Vous pouvez visitez leshumeurscreatives.com pour trouver des choses sympas!")
                ->setImage('actuProf1.png')
                ->setCategorie('prof');
        $manager->persist($actuProf1);
            
        $actuProf2 = new Actu();
        $actuProf2->setCreatedAt(new \DateTime('26-02-2020'))
                ->setTitre("A la découverte du surf")
                ->setArticle("Les élèves de cycle 3 ont découvert le surf avec l’ESB. Grégory Salaün les a initié au monde
                la glisse et de la mer durant 5 semaines.
                Chaque mardi, les élèves se sont rendus à la plage des blancs sablons au Conquet, par demi-groupe ils ont été initiés
                au surf et au bodyboard. Les moniteurs ont sensibilisé les élèves à la préservation de l’océan mais aussi aux dangers 
                qu’il peut représenter.
                Pour responsabiliser les élèves, des combinaisons ont été prêtées par le club aux élèves n’en possédant pas, 
                ils en ont eu la charge duranttout le cycle.
                Les élèves ont pu en parallèle pratiquer d’autres activités pédagogiques avec notamment la découverte de la faune et 
                la flore du littoral, du patrimoine historique du Conquet et la réalisation de croquis du littoral réinvestis en 
                géographie. De plus des activités plus ludiques et artistiques ont été proposées comme la création de mandalas en land’art,
                de la pêche à pied ou des jeux collectifs.
                L’ensemble des activités a été fortement apprécié par les élèves et leurs enseignantes.")
                ->setImage('actuProf2.png')
                ->setCategorie('prof');
        $manager->persist($actuProf2);

        $actuProf3 = new Actu();
        $actuProf3->setCreatedAt(new \DateTime('02-09-2019'))
                ->setTitre("Liste des fournitures du CM1")
                ->setArticle("-    1 trousse -petites cartouches d’encre bleue effaçable -effaceurs -4 stylos à bille à pointe fine 
                : bleu, rouge, vert et noir -1 crayon gris HB -1 porte-mine 0,5 mm  -1 étui à mines 0,5 mm HB -1 gomme blanche -1
                taille-crayons avec réservoir -1 stick de colle -crayons feutres à pointe moyenne -crayons de couleur  -3 crayons
                surligneurs fluorescents -1 stylo à plume -1 ardoise blanche et un chiffon -2 crayons velléda ( de couleurs différentes ) 
                -1 équerre -1 compas sur lequel on peut visser un crayon -1 règle plate graduée 30 cm -1 paire de ciseaux à 
                bouts ronds -1 agenda plutôt qu’un cahier de textes -1 chiffon -1 blouse ( une vieille chemise ou un vieux
                tee-shirt à manches longues) -1 grand classeur rigide  (2 anneaux – diamètre 70 mm) -1 grand classeur rigide
                (4 anneaux – diamètre 30 mm) -2 jeux d'intercalaires maxi format (6 et 12 intercalaires) -1 boîte d’œillets 
                -1 paquet de feuilles mobiles quadrillées blanches ( 21 x 29,7 – Seyes ). -100 pochettes plastiques transparentes
                perforées ( à ranger dans une pochette qui restera en classe) -1 trieur (12 compartiments) -du papier transparent
                pour couvrir les livres et des étiquettes autocollantes -1 cahier pour le travail du soir -1 paire de ballerines
                à semelles blanches -1 paquet de mouchoirs -     Pas deblanco à l’école -     une photo d'identité ( pour le badge)")
                ->setImage('actuProf3.png')
                ->setCategorie('prof');
        $manager->persist($actuProf3);

        $actuProf4 = new Actu();
        $actuProf4->setCreatedAt(new \DateTime('27-03-2020'))
                ->setTitre("Continuité pédagogique")
                ->setArticle("Bonjour à tous, enfants et parentsDans nos classes de PS/MS, la priorité est donnée aux manipulations
                et au bon déroulement de la vie en groupe. Nous n’avons donc pas souhaité donner des fiches d’activités aux enfants
                mais plutôt des suggestions d’activités qui leur permettront d’entretenir leurs acquis et d’avoir un temps de «travail»
                régulier.Les activités peuvent être proposées plusieurs fois.A ces activités s’ajoutent les activités rituelles.Bien 
                conscientes qu’il ne sera pas aisé pour tous les parents de cumuler leur travail, leur télé travail, la vie quotidienne 
                et la classe à la maison, nous vous proposons de programmer 1 à 2 activités chaque jour. Il est préférable d’être régulier
                que de proposer trop d’activités concentrées sur une journée.Vous pouvez utiliser un code (passer un fluo sur l’activité
                réalisée, prendre une photo de l’enfant en action, coller une gommette sur la feuille récapitulative) pour varier les
                activités au fil des jours.Les enfants apprennent en jouant...alors JOUEZ!En souhaitant vous retrouver en classe très 
                vite pour reprendre le cours habituel de la vie scolaire, nous vous souhaitons le meilleur. Prenez soin de vous et vos 
                proches.")
                ->setImage('actuProf4.png')
                ->setCategorie('prof');
        $manager->persist($actuProf4);

        $actuProf5= new Actu();
        $actuProf5->setCreatedAt(new \DateTime('06-04-2020'))
                ->setTitre("Résultat du concours de dessin du Printemps")
                ->setArticle("Bonjour a tous et a toutes! Après le vote ayant eu lieu toute cette semaine à l'école,
                les élèves ont votés à 83,46% pour le dessin de Nina, inspiré du cèlèbre peintre et sculpteur Brésilien Romero Britto.
                Félicitations !")
                ->setImage('actuProf5.png')
                ->setCategorie('prof');
        $manager->persist($actuProf5);

        $actuProf6= new Actu();
        $actuProf6->setCreatedAt(new \DateTime('15-04-2020'))
                ->setTitre("La Kermesse de fin d'année")
                ->setArticle("Dimanche 26 juin, la kermesse de l'école  se déroulera dans la cour de la nouvelle école. 
                Les bénévoles et les nouveaux stands tels que la ferme pédagogique, le bar à ongles, les sumos sont prêts
                pour le plaisir de tous. Pas de défilé pour les enfants, cette année. Ils proposeront un programme de chants 
                et de danses concoctés spécialement pour cette première kermesse. Le soir, un cochon grillé sera servi. Les
                tickets seront en vente sur place lors de l'ouverture des portes à 14 h.")
                ->setImage('actuProf6.png')
                ->setCategorie('prof');
        $manager->persist($actuProf6);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $actuPeri1= new Actu();
        $actuPeri1->setCreatedAt(new \DateTime('02-09-2019'))
                ->setTitre("L’accueil périscolaire")
                ->setArticle("Ce service accueille les enfants de l'etablissement, avant et après l’école. Cet accueil se déroule
                au sein des locaux, dans la partie réservée à ces activités.
                Sur place, une équipe de professionnels prendra en charge votre ou vos enfants et se chargera des transmissions d’informations 
                éventuelles (restaurants scolaires, prise en charge de l’enfant à l’entrée ou à la sortie de l’école).
                Matin et soir les enfants peuvent jouer ou se détendre selon leurs envies.")
                ->setImage('actuPeri1.png')
                ->setCategorie('periscolaire');
        $manager->persist($actuPeri1);

        $actuPeri2= new Actu();
        $actuPeri2->setCreatedAt(new \DateTime('02-09-2019'))
                ->setTitre("Les activités")
                ->setArticle("Nos chères petites têtes blondes n'auront pas le temps de s'ennuyer avec toutes les activités proposées
                par nos accompagnant aggrés ! Atelier lecture, gymnase, chant, danse et tout un tas d'activités créatrices leurs seront propo
                sées tout au long de l'année. Si vous avez des suggestions, n'hésitez pas !")
                ->setImage('actuPeri2.png')
                ->setCategorie('periscolaire');
        $manager->persist($actuPeri2);

        $actuPeri3= new Actu();
        $actuPeri3->setCreatedAt(new \DateTime('04-06-2019'))
                ->setTitre("Départ à la retraite...")
                ->setArticle("Après 36 ans de service au sein de notre établissement, il est temps pour Madame Dubec de prendre une
                retraite méritée ! L'A.P.E et l'école souhaitant lui rendre hommage, nous organiseront un pot de départ le dernier vendredi
                du mois de Juin à 17h00 à la salle communale! Venez nombreux !")
                ->setImage('actuPeri3.png')
                ->setCategorie('periscolaire');
        $manager->persist($actuPeri3);
        
        $actuPeri4= new Actu();
        $actuPeri4->setCreatedAt(new \DateTime('03-09-2019'))
                ->setTitre("Modalités d’inscription et tarif")
                ->setArticle("Lors de l’inscription qui s’effectue en Mairie, un règlement et une fiche de renseignements sont remis
                aux parents qui doivent en prendre connaissance les renseigner, les signer et fournir les pièces demandées. La validation 
                de l’inscription devient effective à la restitution de ces documents en mairie. Tout changement concernant les renseignements
                doit être signalé en mairie.Les réservations de l’accueil périscolaire de votre (vos) enfant(s) se font uniquement via le
                Portail Famille (page d’accueil du site communal). Pour vous connecter, il vous sera demandé votre identifiant et votre mot
                de passe.")
                ->setImage('actuPeri4.png')
                ->setCategorie('periscolaire');
        $manager->persist($actuPeri4);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $actuTap1= new Actu();
        $actuTap1->setCreatedAt(new \DateTime('02-09-2019'))
                ->setTitre("ULTIMATE HOCKEY - encadré par Clément -")
                ->setArticle("L'Ultimate est un sport utilisant un frisbee et opposant 2 équipes de 7 joueurs.C'est sport sans contact
                et rapide qui se joue sur un terrain similaire à celui d’un terrain de football (quand il se joue à l'extérieur).
                L’équipe offensive doit déplacer le disque à l’aide de passes jusqu’à ce qu’il soit attrapé dans la zone de but
                défensive de l’équipe adverse, ce qui résulte en un but. Il est interdit de courir avec le disque ; un joueur
                doit s’arrêter lorsqu’il prend possession du disque, établir un point de pivot avec le pied et tenter une passe
                à un coéquipier. Une passe incomplète ou une interception constitue un revirement et le jeu change immédiatement
                de direction. Tous les joueurs peuvent être lanceurs, receveurs et défenseurs. Un nombre de points, 
                habituellement de 11 à 21, est préétabli pour une joute et chaque but compte pour un point.")
                ->setImage('actuTap1.png')
                ->setCategorie('tap');
        $manager->persist($actuTap1);

        $actuTap2= new Actu();
        $actuTap2->setCreatedAt(new \DateTime('12-09-2019'))
                ->setTitre("ACROSPORT - encadré par Prescillia -")
                ->setArticle("L’acrosport  (ou  gymnastique  acrobatique  ou  encore  acrogym),  est  une activité 
                gymnique artistique, mélangeant danse, gymnastique au sol et cirque. Elle consiste en la pratique de figures
                acrobatiques et d’enchaînements chorégraphiés sur un thème musical.")
                ->setImage('actuTap2.png')
                ->setCategorie('tap');
        $manager->persist($actuTap2);

        $actuTap3= new Actu();
        $actuTap3->setCreatedAt(new \DateTime('09-09-2019'))
                ->setTitre("ATELIER BRACELETS BRESILIENS - encadré par Margot -")
                ->setArticle("Un bracelet brésilien est un bracelet de fils de coton colorés et tressés.
                Modèle de bracelet brésilien aperçu d'un modèle de bracelet issu d'Amérique latine où il est traditionnellement
                fabriqué, il aurait été popularisé par les travellers qui en auraient transmis la technique au gré de leurs voyages.")
                ->setImage('actuTap3.png')
                ->setCategorie('tap');
        $manager->persist($actuTap3);

        $actuTap4= new Actu();
        $actuTap4->setCreatedAt(new \DateTime('10-01-2020'))
                ->setTitre("DECOUVERTE DE JEUX DE CARTES - encadré par Léa -")
                ->setArticle("Tarot, Belote, Rami... A 32 ou 54 cartes, par équipe ou en individuel, les enfants vont découvrir
                différents jeux de cartes.")
                ->setImage('actuTap4.png')
                ->setCategorie('tap');
        $manager->persist($actuTap4);

        $actuTap5= new Actu();
        $actuTap5->setCreatedAt(new \DateTime('13-01-2020'))
                ->setTitre("ATELIER CROCHET - encadré par Elsa -")
                ->setArticle("Réaliser un ouvrage au crochet se dit « crocheter ». Le crochet sert de décoration pour l'intérieur 
                d'une maison, tel un napperon ou un rideau, par exemple. Utilisé avec du fil de laine et des diamètres relativement
                élevés, il peut servir à fabriquer des étoffes continues, qui ont toutes les vertus du tricot, bien qu'un peu
                moins élastiques. C'est ainsi que l'on peut créer des vêtements. ")
                ->setImage('actuTap5.png')
                ->setCategorie('tap');
        $manager->persist($actuTap5);

        $actuTap6= new Actu();
        $actuTap6->setCreatedAt(new \DateTime('03-02-2020'))
                ->setTitre("ATELIER CUISINE - encadré par Thierry -")
                ->setArticle("Le goût vient en cuisinant ! Il est parfois bien plus facile de faire découvrir de nouveaux
                goûts lorsque les enfants cuisinent eux-mêmes. Toutes les recettes de cuisine sont illustrées et expliquées.
                Nous vous proposons une cuisine familiale pratique et rapide à faire, pour apprendre la cuisine de tous
                les jours.")
                ->setImage('actuTap6.png')
                ->setCategorie('tap');
        $manager->persist($actuTap6);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $actuParent1= new Actu();
        $actuParent1->setCreatedAt(new \DateTime('16-03-2020'))
                ->setTitre("Concours « Non au harcèlement »")
                ->setArticle("Les élèves de CM2 ont reçu du rectorat un courrier fort agréable : la classe est  lauréat académique
                du concours.  Leur création  vidéo intitulée  « Merci » a séduit le jury réuni le 11 mars.           
                Compte tenu du contexte actuel, la cérémonie de remise des prix est reportée en septembre 2020.  
                Cette production a été transmise au ministère de l’Education Nationale afin de concourir au  national.
                Les résultats sont attendus début juin. A suivre !
                Ce lien permet de visionner la vidéo des CM2 : https://drive.google.com/file/d/16HRNM5qUubcx9G3jK3cxmui9SFdI_fiZ/view?usp=drivesdk")
                ->setImage('actuParent1.png')
                ->setCategorie('parent');
        $manager->persist($actuParent1);

        $actuParent2= new Actu();
        $actuParent2->setCreatedAt(new \DateTime('06-05-2020'))
                ->setTitre("Intervention en CM2 : les dangers des réseaux sociaux et d’internet.")
                ->setArticle("Benoît Clavier, qui travaille pour l'association \"Stop Harcelement\" interviendra à partir du
                lundi 11 juin 2020 et ce pour toute la semaine dans notre école. Le but de l'intervention, sensibiliser les plus jeunes 
                aux dangers des réseaux sociaux et d'Internet.")
                ->setImage('actuParent2.png')
                ->setCategorie('parent');
        $manager->persist($actuParent2);

        $actuParent3= new Actu();
        $actuParent3->setCreatedAt(new \DateTime('07-05-2020'))
                ->setTitre("Semaine du 11 au 15 mai : semaine du goût")
                ->setArticle("Les élèves de maternelle PS fêtent la semaine du goût. Un jour, une couleur : lundi vert,
                mardi orange, jeudi rouge et vendredi jaune. Tous les matins, ils goûtent des fruits et légumes crus de
                la couleur du jour !")
                ->setImage('actuParent3.png')
                ->setCategorie('parent');
        $manager->persist($actuParent3);

        $actuParent4= new Actu();
        $actuParent4->setCreatedAt(new \DateTime('20-05-2020'))
                ->setTitre("Vente de gâteaux -  APE  -")
                ->setArticle("L’APE reprend ses habitudes gourmandes : 0,50 euro la part de gâteaux fabrication maison.
                Les bénéfices permettent à tous les élèves de faire des sorties scolaires.")
                ->setImage('actuParent4.png')
                ->setCategorie('parent');
        $manager->persist($actuParent4);

        $actuParent5= new Actu();
        $actuParent5->setCreatedAt(new \DateTime('20-03-2020'))
                ->setTitre("Semaine du 23 au 30 mars :")
                ->setArticle("Chacun se mobilise pour assurer une continuité pédagogique avec compétence et créativité : 
                programmation déposée sur le drive, vidéos, liens, classroom .....
                Les profs d'école consacrent du temps en télétravail à leur classe, à a gestion de l'angoisse des parents :
                trop de travail, pas assez de travail, comment faire pour bien apprendre ?..... Ce sont des questions enssentielles
                de pédagogie dont chacun cherche encore les réponses.
                Un accueil téléphonique à distance est toujours assuré pendant cette période difficile pour tous de confinement.
                Un  espoir qui viendra ensoleiller notre journée : c'est aujourd'hui l'arrivée du printemps.")
                ->setImage('actuParent5.png')
                ->setCategorie('parent');
        $manager->persist($actuParent5);

        $actuParent6= new Actu();
        $actuParent6->setCreatedAt(new \DateTime('18-02-2020'))
                ->setTitre("Commande mugs et de tabliers décorés par les dessins des enfants")
                ->setArticle("Dernier délai aujourd'hui pour commander vos mugs et tabliers décorés par les dessins des enfants !
                Si vous n'avez pas encore remis le bon de commande à l'enseignant, contactez rapidement l'APE par mail 
                pour nous indiquer votre commande.")
                ->setImage('actuParent6.png')
                ->setCategorie('parent');
        $manager->persist($actuParent6);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $actuConseil1= new Actu();
        $actuConseil1->setCreatedAt(new \DateTime('08-06-2020'))
                ->setTitre("Conseil d’école du mardi 4 juin 2019")
                ->setArticle("Élections des représentants des parents d’élèves 2020-2021 :
                Le Décret 2019-838 et l’Arrêté du 19 août 2019 modifiant l’arrêté du 13 mai 1985 donnent la possibilité 
                pour les établissements scolaires d’organiser un vote exclusivement par correspondance sur décision du directeur
                d’école et après consultation du conseil d’école. Cette année, aucun vote n’a eu lieu à l’urne. Le vote 
                exclusif par correspondance peut donc être proposé pour la rentrée prochaine sans pénaliser les électeurs.
                Avis du conseil d’école: favorable")
                ->setImage('actuConseil1.png')
                ->setCategorie('conseil');
        $manager->persist($actuConseil1);

        $actuConseil2= new Actu();
        $actuConseil2->setCreatedAt(new \DateTime('08-11-2019'))
                ->setTitre("Conseil d’école du mardi 5 novembre 2019")
                ->setArticle("Les exercices de sécurité :
                Le Plan Particulier de Mise en Sûreté (PPMS) a été remis à jour pour l’année 2019-2020. Il permet d’établir la
                situation précise de l’école face aux risques majeurs. Durant l’année scolaire, l’école organise plusieurs exercices,
                dont un porte sur une alerte intrusion. Les exercices permettent de répéter les postures (confinement, évacuation, se 
                cacher-s’enfermer) correspondant aux différents risques et sont adaptés aux âges de vos enfants.
                Concernant la surveillance des accès à l’école, la communauté de communes s’est engagée dans un plan de sécurisation
                périmétrique des établissements primaires (portillons d’entrée et visiophone) effectif dans notre école depuis la rentrée 2019.
                → La nécessité d’installer un système d’alerte différenciée est à nouveau soulignée par le conseil d’école (évacuation /
                confinement / intrusion). La demande est formulée à la communauté de communes par l’intermédiaire de M. Journet qui en prend note.
                → En cas d’urgence, mais aussi lors de sorties occasionnelles, les classes peuvent être amenées à emprunter la porte « vitrail » 
                ou le portail donnant sur la rue de la Sommevue en face de la rue de la salle Wilbault.
                Le conseil d’école suggère d’interroger Monsieur le Maire sur la possibilité d’y installer des barrières de protection pour 
                les piétons. Mme Lemeret demande également si, au même endroit, la place de stationnement située au bout du passage piéton
                pourrait être déplacée afin qu’aucune voiture ne gêne la traversée des enfants.")
                ->setImage('actuConseil2.png')
                ->setCategorie('conseil');
        $manager->persist($actuConseil2);

        $actuConseil3= new Actu();
        $actuConseil3->setCreatedAt(new \DateTime('05-03-2020'))
                ->setTitre("Conseil d’école du 3 mars 2020")
                ->setArticle("Création d’une nouvelle aire de jeux financée par le Conseil Régionnal:
                Cette aire de jeu comprendra 67 m2 de sol souple dont 39 m2 sur la zone de jeu 
                (toboggans, passage incliné, passage plat, escaliers…). L’installation est prévue pour les 
                vacances de printemps. Les membres du conseil d’école saluent la création de ce nouvel espace.")
                ->setImage('actuConseil3.png')
                ->setCategorie('conseil');
        $manager->persist($actuConseil3);

        $actuConseil4= new Actu();
        $actuConseil4->setCreatedAt(new \DateTime('06-04-2020'))
                ->setTitre("Conseil d’école du 02 avril 2020")
                ->setArticle("Le  Règlement  Intérieur  de  l’école  s’inscrit  intégralement  dans  le Règlement-Type 
                départemental des écoles maternelles et élémentaires publiques de la Sarthe arrêté le 10 avril 2015. Il 
                rappelle les droits et devoirs des membres de la communauté éducative et spécifie les caractéristiques
                propres à l’école. Il sera donné pour signature à chaque famille, dès que possible après ce Conseil d’École.
                Un parent, usager des services périscolaires, informe que certains enfants trouvent que le goûter proposé en
                fin de journée n’est pas assez conséquent. La remarque formulée sera communiquée aux services. La proposition
                de Règlement est lue, commentée et complétée. Le Règlement Intérieur a été ensuite adopté à l’unanimité.
                Madame  CASTILLON  présente  les  2  PPMS  (Plan Particulier  de Mise  en Sécurité)  qui  seront déposés,
                auprès  de  la  DSDEN (Direction  des Services Départementaux  de  l’Éducation Nationale), comme  
                celle-ci  le  demande,  pour  le  15  novembre.  Il s’agit  des  protocoles  écrits  de scénarios de
                protection et de mise à l’abri des élèves, en cas, d’une part, d’Attentat ou d’Intrusion dans l’école
                d’une personne malveillante, et, d’autre part, de Risques Majeurs (comme un risque chimique). Un
                exercice, expliqué aux enfants et dont les parents sont informés  de  la  date,  doit  être  effectué 
                pour  chacun  de  ces  plans  au  cours  de  l’année scolaire.  L’exercice concernant « l’Attentat-Intrusion »
                (=se cacher en attendant les secours) a été réalisé ce matin et celui concernant « les Risques Majeurs » 
                (=se confiner en attendant les secours) sera réalisé au printemps 2020. Il est à noter que les travaux effectués
                (clôture, -5- portails sécurisés) permettent le contrôle des entrées et sorties dans l’école et rendent
                très difficile l’entrée dans l’école pour quelqu’un non averti. À ces exercices s’ajoutent les exercices
                d’évacuation pour Incendie qui sont à effectuer au minimum 2 fois dans l’année. Le premier a eu lieu le 24 septembre.")
                ->setImage('actuConseil4.png')
                ->setCategorie('conseil');
        $manager->persist($actuConseil4);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $menu1 = new Menu();
        $menu1->setCarteMenu("menu1.png")
            ->setTarifAbonne(2.50)
            ->setTarifPassager(3.10);
        $manager->persist($menu1);
        
        $menu2 = new Menu();
        $menu2->setCarteMenu("menu2.png")
            ->setTarifAbonne(2.80)
            ->setTarifPassager(3.20);
        $manager->persist($menu2);

        $menu3 = new Menu();
        $menu3->setCarteMenu("menu3.png")
            ->setTarifAbonne(3.50)
            ->setTarifPassager(4.10);
        $manager->persist($menu3);

        $menu4 = new Menu();
        $menu4->setCarteMenu("menu4.png")
            ->setTarifAbonne(2.60)
            ->setTarifPassager(3.90);
        $manager->persist($menu4);

        $menu5 = new Menu();
        $menu5->setCarteMenu("menu5.png")
            ->setTarifAbonne(2.70)
            ->setTarifPassager(3.10);
        $manager->persist($menu5);

        $menu6 = new Menu();
        $menu6->setCarteMenu("menu6.png")
            ->setTarifAbonne(3.10)
            ->setTarifPassager(3.60);
        $manager->persist($menu6);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $question1 = new Question();
        $question1->setQuestion("Bonjour, où en est le dossier concernant la réparation  de  la  gouttière  (fuite  au  niveau  du  perron)  et 
                nettoyage  de  l'évacuation
                sous  la  gouttière (travaux prévus pour l'an dernier et non réalisés).");
        $manager->persist($question1);

        $reponse1 = new Reponse();
        $reponse1->setQuestion($question1)
                ->setUtilisateur($utilisateur4)
                ->setReponse("Suite à l'appel d'offre lancé par la mairie, le devis est encore en cours auprès de l'entreprise retenue.");
        $manager->persist($reponse1);

        $question2 = new Question();
        $question2->setQuestion("Je suis en pénurie de cartouche d'encre, pouvons nous imprimer les devoirs à l'école?");
        $manager->persist($question2);

        $reponse2 = new Reponse();
        $reponse2->setQuestion($question2)
                ->setUtilisateur($utilisateur4)
                ->setReponse("Oui bien sur vous pouvez vous rendre au secrétariat en allant chercher votre enfant et en respectant les gestes barrierres !");
        $manager->persist($reponse2);

        $question3 = new Question();
        $question3->setQuestion("Y aura-t-il un projet d'école (comme les contes d'antan l'an dernier) ?  ");
        $manager->persist($question3);

        $reponse3 = new Reponse();
        $reponse3->setQuestion($question3)
                ->setUtilisateur($utilisateur4)
                ->setReponse("Oui, cette année le projet commun pour toutes les classes et de repeindre le mur qui longe le portail de l'entrée.
                En consultation avec l'équipe pédagogie et après vote des élèves, le thème retenu sera \"les quatres saisons\".");
        $manager->persist($reponse3);

        $question4 = new Question();
        $question4->setQuestion("Qu'en est il de la visite de l'infirmière scolaire initialement prévue pour les GS cette année ??");
        $manager->persist($question4);

        $reponse4 = new Reponse();
        $reponse4->setQuestion($question4)
                ->setUtilisateur($utilisateur4)
                ->setReponse("En raison du confinement et des conditions sanitaires actuelles, l’infirmière scolaire n’a pas
                pu réaliser les visites de GS comme cela était initialement prévu. Les élèves devraient être vus dès le mois 
                de septembre en CP. Un mail d’information a été adressé par le directeur aux familles dont  les  enfants bénéficient
                d’un PAI pour les informer de la procédure de reconduction afin que tout soit opérationnel à la rentrée.");
        $manager->persist($reponse4);

        $manager->flush();
    }
}