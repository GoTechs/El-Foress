  @extends('layout')

  @section('content')

    <!-- Start Content -->
    <div id="content">
      <div class="container">        
        <div class="row">
          <div class="col-md-12">
            <!-- accordion start -->
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="{{$id == 'conditions-d-utilisation' ? '' : 'collapsed'}}">
                      Conditions d’utilisation
                    </a>
                  </h4>
                </div>
                  <div id="collapseOne" class="panel-collapse collapse {{$id == 'conditions-d-utilisation' ? 'in' : ''}}">             
                  <div class="panel-body">
                    <p>Bienvenue à&nbsp;
                      <a href="http://www.foress-dz.com">www.foress-dz.com</a> et Merci de votre visite.&nbsp;
                    </p>
                    <p>Le site Internet&nbsp;&nbsp;
                      <a href="http://www.foress-dz.com">www.foress-dz.com</a>, ci-après dénommé «&nbsp;foress-dz.com&nbsp;» propose un service de dépôt et de consultation de petites annonces sur Internet plus spécifiquement destiné aux particuliers.
                    </p>
                    <p>L'accès au site, sa consultation et son utilisation sont subordonnés à l'acceptation sans réserve des présentes conditions d'utilisation de&nbsp;foress-dz.com.</p>
                    <p>&nbsp;</p>
                    <p><strong>Article 1 - Conditions d’inscription&nbsp;</strong></p>
                    <p>Nos services sont entièrement gratuits et réservés aux personnes juridiquement capables de souscrire des contrats en droit algérien. Nos services ne sont pas disponibles pour les mineurs de moins de 18 ans. Si vous ne remplissez pas ces conditions, vous ne devez pas utiliser nos services.</p>
                    <p><strong>Article 2 – Quelques définitions&nbsp;</strong></p>
                    <p>Chacun des termes mentionnés ci-dessous aura dans les présentes conditions d'utilisation du service Foress la signification suivante :&nbsp;</p>
                    <p><strong>Annonce :</strong> désigne l'ensemble des éléments et données (visuelles, textuelles, sonores, photographies, dessins), déposé par l’annonceur sous sa responsabilité éditoriale, en vue d'acheter, de vendre, d’échanger un bien ou un service et diffusé sur le Site Internet&nbsp;foress-dz.com.</p>
                    <p><strong>Annonceur :</strong> désigne toute personne physique majeure ou personne morale établie en Algérie et ayant déposé et mis en ligne une annonce via le Service&nbsp;foress-dz.com. Le terme "annonceur" regroupe dans les&nbsp;conditions d’utilisation&nbsp;les deux types d'annonceur déposant des annonces via le service&nbsp;foress-dz.com.</p>
                    <p><strong>Moyen de paiement&nbsp;:</strong> le site internet ou le service Foress ne propose aucun moyen de paiement en ligne entre le vendeur et l’acheteur. C’est la responsabilité de l’acheteur de prendre contact direct avec l’annonceur ou le vendeur.</p>
                    <p><strong>Moyen de livraison :</strong> le site internet ou le service Foress ne propose aucun moyen de livraison entre le vendeur et l’acheteur. C’est la responsabilité de l’acheteur de prendre contact direct avec l’annonceur ou le vendeur pour toute question concernant la livraison.</p>
                    <p><strong>Vendeur</strong> : désigne tout annonceur particulier ou professionnels qui propose un ou plusieurs biens à la vente et choisit d’utiliser les services Foress pour vendre des produits.&nbsp;</p>
                    <p><strong>L'annonceur "Particulier" :</strong> qui s'entend de toute personne physique majeure, agissant exclusivement à des fins privées et ayant déposé et mis en ligne une annonce à partir du Site Internet&nbsp;foress-dz.com.</p>
                    <p><strong>L'annonceur "Pro" :</strong> qui s'entend de toute personne morale, agissant exclusivement à des fins professionnelles et déposant des annonces pour donner suite à l'ouverture d'un compte pro, établie en Algérie et ayant déposé et mis en ligne une annonce à partir du Site Internet&nbsp;foress-dz.com.</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><strong>Site Internet :</strong> désigne le site internet exploité par Foress accessible principalement depuis l'URL&nbsp;
                      <a href="http://www.foress-dz.com">www.foress-dz.com</a> et permettant aux utilisateurs et aux annonceurs d'accéder via internet au service Foress.
                    </p>
                    <p><strong>Article 3 – Utilisation du service Foress</strong></p>
                    <p><strong>3.1 Description du Service Foress</strong></p>
                    <p>Le Service&nbsp;Foress&nbsp;proposé aux utilisateurs et aux annonceurs varie en fonction de la qualité de "Particulier" ou de "Pro" de l'annonceur et du support de communication utilisé.</p>
                    <p>&nbsp;</p>
                    <ul>
                      <li>La consultation de toutes les annonces diffusées</li>
                      <li>La création et l'accès au compte personnel</li>
                      <li>La gestion du compte personnel&nbsp;</li>
                      <li>La gestion (actualisation, modification etc.), à tout moment, des informations personnelles renseignées lors de la création du compte personnel</li>
                      <li>Le dépôt d'annonces</li>
                      <li>La possibilité de partager l’annonce sur les réseaux sociaux</li>
                      <li>La mise en contact avec les annonceurs</li>
                      <li>Signaler un abus en contactant l’administrateur de Foress via&nbsp;
                        <a href="http://www.foress-dz.com">www.foress-dz.com</a>
                      </li>
                    </ul>
                    <p>&nbsp;</p>
                    <p><strong>3.2 Diffusion des annonces&nbsp;</strong></p>
                    <p><strong>&nbsp;</strong></p>
                    <p>Foress&nbsp;se réserve le droit de refuser une annonce incomplète ou qui ne correspondrait pas à sa ligne éditoriale, aux chartes rédactionnelles consultable ici ou photographies consultables ici, à son éthique, à sa déontologie ainsi que toutes celles susceptibles de porter atteinte à l'ordre public, aux bonnes mœurs ou qui contreviendrait aux dispositions légales et réglementaires en vigueur. Les annonces refusées ne seront pas publiées.</p>
                    <p><strong>3.2.1 Règles générales</strong></p>
                    <p>Tout utilisateur peut devenir annonceur et déposer des annonces qui seront diffusées sur le Site Internet. L'annonceur particulier pourra déposer gratuitement son annonce depuis le site Internet à partir du formulaire de dépôt d'annonce, l'annonceur est informé que pour des raisons d'ordre technique et de modération, son annonce ne sera pas diffusée instantanément après son dépôt sur le site Internet. Toute Annonce déposée et validée sera diffusée sur le Site Internet&nbsp;
                      <a href="http://www.foress-dz.com">www.foress-dz.com</a>.
                    </p>
                    <p><strong>3.2.2 Engagement de l'Annonceur</strong></p>
                    <p>&nbsp;</p>
                    <ul>
                      <li>L'annonceur garantit détenir tous les droits (notamment des droits de propriété intellectuelle) ou avoir obtenu toutes les autorisations nécessaires à la publication de son annonce. Il s'engage à être effectivement le propriétaire du bien annoncé ou, à titre exceptionnel son ayant-droit. Dans cette hypothèse, il déclare disposer de tous les droits et autorisations nécessaires au dépôt et à la publication de l'annonce.</li>
                    </ul>
                    <p>L’annonceur garantit la conformité du Bien proposé à la vente d'une part, à la législation et à la réglementation en vigueur et, d'autre part, au contenu de l'annonce publiée sur le Site internet&nbsp;
                      <a href="http://www.foress-dz.com">www.foress-dz.com</a>.
                    </p>
                    <p>&nbsp;</p>
                    <ul>
                      <li>L'Annonceur garantit que l'Annonce ne contrevient à aucune réglementation en vigueur (notamment relatives à la publicité, à la concurrence, à la promotion des ventes, à l'utilisation de la langue française, à l'utilisation de données personnelles), ni aucun droit de tiers (notamment aux droits de propriété intellectuelle et aux droits de la personnalité) et qu'il ne comporte aucun message diffamatoire ou dommageable à l'égard de tiers.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <ul>
                      <li>S'agissant de la ou des photographie(s) du Bien illustrant l'annonce, le Client garantit :</li>
                    </ul>
                    <p>&nbsp;</p>
                    <ul>
                      <li>Pour Qu'elle(s) représente(nt) le Bien annoncé et n'est / ne sont pas susceptible(s) d'induire en erreur le public ;</li>
                    </ul>
                    <p>&nbsp;</p>
                    <ul>
                      <li>Que le Client dispose de l'ensemble des droits de propriété intellectuelle sur cette / ces photographie(s) (droit d'auteur), en vue de son / leur utilisation conformément aux présentes et, notamment, de sa reproduction au sein de la base de données de Foress et de sa diffusion au sein du Site et du Service.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>Ainsi, l'annonceur s'engage notamment à ce que l'annonce ne contienne :</p>
                    <p>&nbsp;</p>
                    <ul>
                      <li>Aucun lien hypertexte redirigeant les Utilisateurs notamment vers des sites internet exploités par tout tiers.</li>
                      <li>Aucune information fausse, mensongère ou de nature à induire en erreur les Utilisateurs.</li>
                      <li>Aucune mention diffamatoire ou de nature à nuire aux intérêts de Foress et de tout tiers.</li>
                      <li>Aucun contenu portant atteinte aux droits de propriété intellectuelle de tiers.</li>
                      <li>Aucun contenu à caractère promotionnel ou publicitaire en lien avec l'activité de l'annonceur. En effet, une Annonce est destinée à promouvoir un produit et n'est pas un support de publicité.</li>
                      <li>En cas de vente du Bien annoncé en cours de publication, le Client s'engage à supprimer son annonce sur le Site à partir de son compte Client particulier, dans ce cadre, l'annonceur déclare et reconnaît qu'il est seul responsable du contenu des annonces qu'il publie et rend accessibles aux Utilisateurs, ainsi que de tout document ou information qu'il transmet aux Utilisateurs.</li>
                      <li>L'annonceur assume l'entière responsabilité éditoriale du contenu des annonces qu'il publie. Il garantit ainsi Foress contre toute condamnation qui pourrait être prononcée à son encontre de ce fait et dégage expressément Foress de toute responsabilité qu'elle pourrait encourir.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <ul>
                      <li>En déposant toute annonce, chaque annonceur reconnaît et accepte que Foress puisse supprimer, à tout moment, sans indemnité ni droit à remboursement des sommes engagées par l'annonceur aux fins de son dépôt ou de la souscription à des Options Payantes, une annonce qui serait contraire notamment à la loi algérienne et/ou aux règles de diffusion d'annonce fixées par Foress.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>L'annonceur s'engage également à ce que son Compte Personnel et/ou son Compte Pro ne contienne:</p>
                    <p>&nbsp;</p>
                    <ul>
                      <li>Aucune information obligatoire fausse et/ou mensongère.</li>
                      <li>Aucune information portant atteinte aux droits d'un tiers.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>Dans ce cadre, le titulaire déclare et reconnaît qu'il est seul responsable des informations renseignées lors de la création de son Compte Personnel et/ou de son Compte Pro.</p>
                    <p>En créant un Compte Personnel et/ou un Compte Pro, chaque titulaire reconnaît et accepte que Foress puisse supprimer, à tout moment, sans indemnité ni droit à remboursement des sommes engagées par l'annonceur aux fins de souscription à des Options Payantes, un compte qui serait contraire notamment à la loi algérienne et/ou aux règles de diffusion fixées par Foress.</p>
                    <p><strong>3.3. Liens hypertextes</strong></p>
                    <p><strong>3.3.1. Liens à partir du Service Foress</strong></p>
                    <p>Le Service Foress peut contenir des liens hypertextes redirigeant vers des sites exploités par des tiers. Ces liens sont fournis à simple titre d'information.</p>
                    <p>Foress n'exerce aucun contrôle sur ces sites et décline toute responsabilité quant à l'accès, au contenu ou à l'utilisation de ces sites, ainsi qu'aux dommages pouvant résulter de la consultation des informations présentes sur ces sites.</p>
                    <p>La décision d'activer ces liens relève de la pleine et entière responsabilité de l'Utilisateur.</p>
                    <p><strong>3.3.2. Liens vers le Service Foress</strong></p>
                    <p>Aucun lien hypertexte ne peut être créé vers le Service Foress sans l'accord préalable et exprès de Foress.</p>
                    <p>Si un internaute ou une personne morale désire créer, à partir de son site, un lien hypertexte vers le Service Foress et ce quel que soit le support, il doit préalablement prendre contact avec Foress via Contact sur le site internet.</p>
                    <p>Tout silence de Foress devra être interprété comme un refus.</p>
                    <p><strong>3.4. Cookies et Géolocalisation</strong></p>
                    <p>Afin de faciliter la navigation sur le site Internet, des cookies peuvent être implantés dans le support de communication (notamment ordinateur, téléphone mobile, tablette numérique) des Utilisateurs afin par exemple de conserver leurs critères de recherche, de préremplir le formulaire de dépôt (mail/téléphone).</p>
                    <p>Un réglage du navigateur de son support de communication permet à tout Utilisateur de refuser l'implantation de cookies. Cependant, l'Utilisateur est informé que le refus des cookies peut perturber l'utilisation du Service Foress.</p>
                    <p><strong>3.5 Protection, collecte, utilisation et communication des données personnelles</strong></p>
                    <p><strong>3.5.1 : Protection des données personnelles</strong></p>
                    <p>Tout Utilisateur du service Foress dispose à tout moment d'un droit d'opposition, d'accès, de rectification, de suppression ainsi que d'opposition au traitement des données le concernant.</p>
                    <p>L'Utilisateur et l'annonceur Particulier peuvent exercer ce droit en contactant Foress via la rubrique "contact", présente sur le Site Internet.</p>
                    <p>Par ailleurs, afin d'informer tout tiers que l'annonceur refuse que ses données personnelles soient utilisées à des fins de démarchage commercial, Foress propose à l'annonceur d'indiquer dans l'encart « l'annonceur » de son annonce qu'il refuse d'être démarché commercialement.</p>
                    <p>L'intégration de cette mention est proposée à l'Annonceur lors du dépôt et de la prolongation de son Annonce depuis le formulaire de dépôt.</p>
                    <p>Foress n'est aucunement responsable du non-respect par un tiers du refus de l'Annonceur d'être démarché commercialement et ne donne aucune garantie, expresse ou implicite, à cet égard.</p>
                    <p><strong>3.5.2 : Collecte et utilisation des données personnelles</strong></p>
                    <p>Le dépôt d'annonce par l'annonceur implique que celui-ci remplisse un formulaire et communique une adresse email et un numéro de téléphone. Les données personnelles sont collectées dans le&nbsp;cadre:</p>
                    <p>&nbsp;</p>
                    <ul>
                      <li>Du dépôt d'annonce par l'annonceur Particulier, celui-ci remplissant un formulaire et communiquant les informations relatives au véhicule objet de l’annonce.</li>
                      <li>De la création du Compte Personnel, l'annonceur remplissant un formulaire et renseignant, a minima, les informations suivantes :
                        <ul>
                          <li>Nom</li>
                          <li>Prénom</li>
                          <li>Adresse e-mail</li>
                          <li>Code postal</li>
                          <li>Adresse</li>
                          <li>Numéro de téléphone</li>
                        </ul>
                      </li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>Toutes les informations contenues dans le Compte Personnel sont modifiables à tout moment par son titulaire.</p>
                    <p>Toutes données personnelles collectées sont susceptibles d'être utilisées par Foress aux fins suivantes :</p>
                    <p>&nbsp;</p>
                    <ul class="decimal_type">
                      <li>La gestion de l'annonce, notamment sa validation;</li>
                      <li>La publication et le suivi de l'annonce;</li>
                      <li>L'envoi de formulaires de réponses&nbsp;;</li>
                      <li>L'envoi de propositions commerciales et/ou promotionnelles, émanant uniquement de Foress et concernant exclusivement le service Foress;</li>
                      <li>L'envoi de propositions commerciales et/ou promotionnelles, émanant de sociétés tierces en relation avec Foress et ne concernant pas exclusivement le service Foress;</li>
                      <li>L'envoi d'enquêtes de satisfaction;</li>
                      <li>Statistiques;</li>
                    </ul>
                    <p><strong>3.5.3: Communication des données personnelles</strong></p>
                    <p>Par dérogation, l'Utilisateur et l'annonceur sont informés que Foress peut être amenée à communiquer les données personnelles collectées via le service Foress :</p>
                    <p>&nbsp;</p>
                    <ul class="decimal_type">
                      <li>Aux autorités administratives et judiciaires autorisées, uniquement sur réquisition judiciaire;</li>
                      <li>A la société mère et aux sociétés-sœurs de Foress;</li>
                    </ul>
                    <p><strong>3.6 Prospection commerciale et collecte déloyale</strong></p>
                    <p>L'utilisation à des fins commerciales ou de diffusion dans le public de données téléchargées à partir du Site Internet est formellement interdite, sous peine de sanction pénales.</p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="{{$id == 'politique-de-confidentialite' ? '' : 'collapsed'}}">
                      Politique de confidentialité
                    </a>
                  </h4>
                </div>
                  <div id="collapseTwo" class="panel-collapse collapse {{$id == 'politique-de-confidentialite' ? 'in' : ''}}">
                  <div class="panel-body">
                    <p><strong>Table des matières</strong></p>
                      <ol start="1" type="1">
                        <li>Généralités</li>
                        <li>Renseignements personnels que nous recueillons</li>
                        <li>Utilisation de vos renseignements personnels</li>
                        <li>Fins commerciales</li>
                        <li>Publicité</li>
                        <li>Témoins (cookies)</li>
                        <li>Renseignements personnels : accès, consultation et modification</li>
                        <li>Protection et conservation de vos renseignements personnels</li>
                        <li>Autres renseignements</li>
                      </ol>
                      <p><strong>1. Généralités</strong></p>
                      <p>La présente Politique de confidentialité décrit le règlement de Foress concernant la collecte, l'utilisation, le stockage, la diffusion et la protection de vos renseignements personnels. La présente Politique de confidentialité s'applique au site&nbsp;www.foress-dz.com&nbsp;et aux sites, applications, services et outils connexes qui intègrent par renvoi la présente (les « services »), peu importe la méthode d'accès à ces services, y compris l'accès au moyen d'appareils mobiles. Le responsable du traitement des données est Foress.</p>
                      <p><strong>Portée et consentement:</strong> En utilisant Foress et les services connexes, vous consentez expressément à la collecte, à l'utilisation, à la divulgation et à la conservation de vos renseignements personnels par Foress, conformément à la présente Politique de confidentialité et à nos conditions d'utilisation.</p>
                      <p>Foress peut modifier la présente Politique de confidentialité de temps en temps. Nous vous conseillons de le consulter régulièrement. Les changements majeurs apportés à notre politique de confidentialité seront annoncés sur notre site Web. La politique de confidentialité modifiée entrera en vigueur immédiatement après sa première publication sur notre site Web. La présente Politique de confidentialité est en vigueur en date du 1 janvier, 2017.</p>
                      <p>Foress est une société de&nbsp;Gotechs.&nbsp;Elle est donc soumise aux normes mondiales en matière de confidentialité. (règles internes contraignantes). Vous pouvez obtenir de plus amples renseignements sur le traitement de vos renseignements personnels et le respect de la vie privée dans les règles internes contraignantes.&nbsp;</p>
                      <p><strong>2. Renseignements personnels que nous recueillons</strong></p>
                      <p>Vous pouvez consulter notre site Web sans ouvrir de compte. Si vous décidez de nous fournir vos renseignements personnels, vous acceptez que cette information soit transmise et conservée sur nos serveurs. Nous recueillons les renseignements personnels suivants:</p>
                      <p><strong>Informations que nous recueillons automatiquement</strong>: Lorsque vous consultez notre site Web, utilisez nos services ou interagissez avec nos publicités ou notre contenu, nous recueillons automatiquement les données qui nous sont transmises par votre ordinateur, votre appareil mobile ou vos autres appareils d'accès.&nbsp;Ces informations incluent, sans toutefois s'y limiter:</p>
                      <ul type="disc">
                        <li>L’information de votre interaction avec notre site Web et nos services, y compris, sans toutefois s'y limiter, l'identifiant de l'appareil, le type d'appareil, les données d'emplacement, les informations sur l'ordinateur et la connexion, les statistiques de consultation des pages, le trafic vers&nbsp;www.foress-dz.com&nbsp;ou depuis celui-ci, l'URL de référence, les données de publicité, l'adresse IP et les informations de consignation Web standards;&nbsp;</li>
                        <li>Les informations recueillies par nos témoins, nos repères Web et autres outils similaires.</li>
                      </ul>
                      <p><strong>Informations que vous nous fournissez:</strong> Nous recueillons et stockons toutes les informations que vous saisissez sur notre site Web ou que vous nous fournissez lorsque vous utilisez nos services.&nbsp;Ces informations incluent, sans toutefois s'y limiter:</p>
                      <ul type="disc">
                        <li>L’information que vous nous fournissez lorsque vous ouvrez un compte ou que vous vous inscrivez à un service ;</li>
                        <li>Les informations supplémentaires que vous pourriez nous fournir par le biais des sites de médias sociaux ou les services tiers;</li>
                        <li>&nbsp;Les informations fournies dans le contexte de la résolution de litiges, de correspondances sur notre site ou de correspondances à notre intention;</li>
                        <li>Les informations concernant votre emplacement et celui de votre appareil, y compris l'identifiant unique de ce dernier si vous avez activé ce service sur votre appareil mobile;&nbsp;</li>
                        <li>Votre cv, si vous nous le faites parvenir pour considération à notre page carrières.</li>
                      </ul>
                      <p><strong>Informations d'autres sources:</strong> Nous pouvons recevoir ou recueillir d'autres informations à votre sujet auprès de tiers et les ajouter à vos informations de compte. Ces informations incluent, sans toutefois s'y limiter: des données démographiques, des données de navigation, des coordonnées supplémentaires et des données supplémentaires à votre sujet provenant d'autres sources, telles que les autorités publiques, dans la mesure permise par la loi.</p>
                      <p><strong>3. Utilisation de vos renseignements personnels</strong></p>
                      <p>Vous acceptez que nous puissions utiliser vos renseignements personnels aux fins suivantes:</p>
                      <ul type="disc">
                        <li>Vous donnez accès à nos services et à notre service de soutien à la clientèle par courriel ou par téléphone;</li>
                        <li>Prévenir, détecter et étudier les activités potentiellement interdites ou illégales, les fraudes et les intrusions et assurer le respect de nos conditions d'utilisation;</li>
                        <li>Personnaliser, évaluer et améliorer nos services, notre contenu et nos publicités;</li>
                        <li>Communiquer avec vous par courriel, par notification en mode push, par message texte (SMS) ou par téléphone, vous poser des questions sur nos services.</li>
                        <li>Vous fournir les autres services que vous avez demandés, conformément à nos procédures de collecte d'information; et</li>
                        <li>Pour considérer votre candidature si vous choisissez de télécharger votre cv à notre page carrières.</li>
                      </ul>
                      <p><strong>Partage d'information avec les sites de médias sociaux et inscription sur ces sites:</strong> Nous pouvons offrir des services de connexion qui vous permettent d'accéder au site Web ou aux sites connexes à l'aide de vos informations d'identification. Nous pouvons également offrir des services vous permettant de partager des informations avec des sites de médias sociaux tiers, notamment Facebook, Google Plus et Twitter.</p>
                      <ul>
                        <li>Afin de respecter des obligations civiles ou une injonction.</li>
                        <li>Si cela s'avère nécessaire dans les cas de prévention, de détection ou d'accusation liés à des infractions criminelles, notamment des fraudes, des dols ou des poursuites.</li>
                        <li>Si cela s'avère nécessaire afin d'assurer le respect de nos règlements ou de protéger les droits et libertés d'autrui.</li>
                        <li><u>D'autres tiers</u> que vous avez autorisés à partager vos renseignements personnels par Foress, p. ex., dans le cadre d'une coopération.</li>
                      </ul>
                      <ul type="disc">
                        <li>Des sociétés avec lesquelles nous avons l'intention de fusionner dans le cadre d'une réorganisation ou qui font notre acquisition.</li>
                        <li>Un <u>titulaire de propriété intellectuelle</u> si le titulaire d'un droit de propriété intellectuelle ou un intermédiaire estime, de bonne foi, qu'une publicité viole les droits du titulaire. Avant que les renseignements personnels soient fournis, le titulaire de propriété intellectuelle conclura une entente qui stipule notamment que l'information est fournie à la stricte condition qu'elle soit uniquement utilisée en vue d'une action judiciaire, d'un avis juridique ou de répondre aux questions de l'annonceur visé.</li>
                      </ul>
                      <p>Sans limiter ce qui précède, nous ne devons également pas – dans le but de respecter votre vie privée et de protéger le site Web contre les personnes ou les parties malveillantes – divulguer vos renseignements personnels à des tiers sans injonction ou demande formelle du gouvernement conformément aux lois applicables, sauf si nous estimons de bonne foi qu'une telle divulgation est nécessaire afin de prévenir un préjudice imminent ou des dommages financiers ou de signaler une activité illégale présumée.</p>
                      <p><strong>Informations que vous partagez sur www.foress-dz.com:</strong>&nbsp;</p>
                      <p>Notre site Web permet aux utilisateurs de partager des publicités et d'autres informations avec les autres utilisateurs, rendant ainsi ces informations partagées accessibles aux autres utilisateurs. Puisque notre site Web vous permet également de communiquer directement avec un vendeur ou un acheteur, nous vous recommandons de porter attention aux renseignements personnels que vous transmettez aux autres. Vous êtes le seul responsable des renseignements personnels que vous diffusez sur notre site Web. Par conséquent, nous ne pouvons garantir la confidentialité ni la sécurité de l'information que vous transmettez à d'autres utilisateurs.</p>
                      <p>Si vous consultez notre site Web à partir d'un ordinateur partagé ou d'un café Internet, nous vous suggérons fortement de fermer votre session après chaque consultation. Si vous ne souhaitez pas que l'ordinateur partagé mémorise votre utilisation ou vos renseignements, vous devez supprimer les témoins ou l'historique de vos consultations de notre site Web.</p>
                      <p>Votre responsable du traitement peut transférer des données à d’autres membres de notre famille d’entreprises tel qu’il est décrit dans le présent Règlement relatif au traitement des renseignements personnels, et il est possible que ceux-ci puissent traiter vos renseignements personnels, ou même les conserver, sur des serveurs situés dans l'Union Européenne, aux États-Unis et dans nos centres de données ailleurs dans le monde.</p>
                      <p><strong>4. Fins commerciales</strong></p>
                      <p>Vous acceptez que nous puissions utiliser l'information que nous avons recueillie afin de vous envoyer des offres, qu'elles soient personnalisées ou non, ou de communiquer avec-vous par téléphone au sujet des produits ou des services offerts par Foress.</p>
                      <p>Nous ne vendons pas et ne louons pas vos informations personnelles à des tiers à des fins commerciales sans votre autorisation expresse. Nous pouvons combiner vos renseignements avec les données que nous obtenons auprès d'autres entreprises afin d'améliorer et de personnaliser nos services et nos fonctionnalités.</p>
                      <p>Si vous ne voulez plus recevoir de communications commerciales de notre part, vous pouvez, s'il y a lieu, modifier vos préférences dans votre compte Foress, ou cliquer sur le lien de désabonnement dans la communication commerciale que vous avez reçue.</p>
                      <p><strong>6. Témoins (cookies)</strong></p>
                      <p>Lorsque vous utilisez nos services, nos fournisseurs de services et nous-mêmes pouvons placer des témoins (des fichiers de données sur votre téléphone ou votre appareil mobile), des repères Web (des images électroniques ajoutées au code d'une page Web) ou des outils similaires. Nous utilisons les témoins afin de vous identifier en tant qu'utilisateur, de vous offrir une meilleure expérience sur notre site Web, de mesurer l'efficacité de nos promotions et d'assurer le respect des règlements et la sécurité sur notre site Web. Pour obtenir de plus amples renseignements sur notre utilisation de tels outils.</p>
                      <p><strong>7. Renseignements personnels: accès, consultation et modification</strong></p>
                      <p>Nous ne pouvons pas modifier vos renseignements personnels ni vos informations de compte. Vous pouvez modifier vos renseignements en ouvrant une session dans votre compte Foress. Lorsque vous ajoutez une petite annonce, vous ne pourrez peut-être pas modifier votre annonce ou supprimer votre message. Nous traiterons votre demande dans un délai raisonnable et traiterons vos renseignements personnels conformément aux lois applicables.&nbsp;</p>
                      <p><strong>8. Protection et conservation de vos renseignements personnels</strong></p>
                      <p>Nous protégeons vos renseignements à l'aide de mesures de sécurité techniques et administratives (notamment les coupe-feu, le chiffrement des données et le contrôle physique et administratif de l'accès aux données et aux serveurs) qui limitent les risques de perte, d'abus, d'accès non autorisé, de divulgation et de modification. Néanmoins, si vous pensez que votre compte a fait l'objet d'un abus.</p>
                      <p>Nous ne conservons pas vos renseignements personnels au-delà du délai permis par la loi et nous supprimons les renseignements personnels lorsqu'ils ne sont plus nécessaires aux fins décrites ci-dessus.</p>
                      <p><strong>9. Autres renseignements</strong></p>
                      <p><strong>Abus et communications commerciales non sollicitées :</strong> Nous ne tolérons aucun abus de notre site Web. Vous n'avez pas la permission d'ajouter un utilisateur Foress supplémentaire à votre liste de publipostage (par courriel ou par la poste) à des fins commerciales, même si celui-ci a acheté l'un de vos objets, sans avoir obtenu son consentement explicite. Si vous constatez que quelqu'un abuse de notre site Web (pourriels ou courriels frauduleux), veuillez-nous le&nbsp;
                        signaler ou nous contacter.
                      </p>
                      <p>Il est interdit d'utiliser nos outils de communication entre membres pour envoyer des pourriels ou du contenu qui enfreint nos conditions d'utilisation de quelque façon que ce soit. Par mesure de sécurité, nous pouvons balayer automatiquement les messages pour repérer les pourriels, les virus, l'hameçonnage et les autres activités malveillantes ou le contenu illégal ou interdit. Nous ne conservons pas de façon permanente les messages envoyés au moyen de ces outils.</p>
                      <p><strong>Tiers:</strong> Sauf disposition contraire expresse dans la présente Politique de confidentialité, celle-ci s'applique uniquement à l'utilisation et au transfert de données que vous nous fournissez. Foress n'a aucun contrôle sur les règlements sur le respect de la vie privée des tiers qui peuvent s'appliquer à vous. Lorsque nous faisons affaire avec des tiers ou utilisons leurs outils afin de fournir certains services, nous indiquons explicitement quel règlement sur le respect de la vie privée s'applique à vous. Nous vous encourageons donc à poser des questions avant de divulguer vos renseignements personnels à qui que ce soit.</p>           
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="{{$id == 'regles-d-affichage' ? '' : 'collapsed'}}">
                      Règles d’affichage
                    </a>
                  </h4>
                </div>
                  <div id="collapseThree" class="panel-collapse collapse {{$id == 'regles-d-affichage' ? 'in' : ''}}">
                  <div class="panel-body">
                    <p><strong>&nbsp;</strong></p>
                    <p>Les activités suivantes sont interdites sur&nbsp;www.Foress-dz.com&nbsp;:</p>
                    <ul>
                      <li>Afficher des annonces irréelles, mauvaise description, l’état du produit ne reflète pas l’état actuel du produit affiché.&nbsp;</li>
                      <li>Afficher des&nbsp;
                        annonces identiques dans plusieurs catégories.
                      </li>
                      <li>Afficher des annonces en utilisant différentes adresses courriel.</li>
                      <li>Afficher des annonces dans le seul but de générer de l'achalandage sur un autre site Web.</li>
                      <li>Afficher une annonce qui enfreint&nbsp;
                        les conditions d’utilisation de Foress.
                      </li>
                      <li>Afficher des annonces contenant une liste de mots-clés qui ne sont pas directement liés aux articles à vendre.</li>
                      <li>Afficher des annonces avec du contenu pour adultes ou à caractère érotique. Afficher des annonces pour des rencontres.</li>
                      <li>Afficher des annonces contenant des propos diffamatoires ou haineux.</li>
                      <li>Afficher des annonces contenant des opinions, des avis et des sujets de discussion qui devraient plutôt être partagés sur les sites de médias sociaux.</li>
                      <li>Afficher des annonces contenant de l'information trompeuse ou dans une catégorie inappropriée.</li>
                      <li>Afficher des annonces pour la vente d'articles qu'il est illégal de posséder, d'acheter ou de vendre dans votre lieu de résidence.</li>
                      <li>Afficher des annonces à titre de vendeur privé, de propriétaire ou de particulier lorsque vous êtes une entreprise, un concessionnaire ou un professionnel.</li>
                    </ul>
                    <p><strong><u>Remarques:</u></strong></p>
                    <ul>
                      <li>Pour des raisons de sécurité, les utilisateurs&nbsp;
                       âgés de moins de 18 ans doivent faire appel à un adulte pour afficher des annonces sur notre site.
                      </li>
                      <li>Toute annonce qui n'est pas conforme aux règlements de Foress pourrait être retirée du site. Par ailleurs, les utilisateurs qui enfreignent nos règlements pourraient perdre l'accès au site Foress de façon définitive.</li>
                    </ul>
                    <p><strong><u>En résumé</u></strong>, vous ne pouvez pas afficher, acheter ou vendre des articles ou des services qu'il est illégal de posséder, d'acheter ou de vendre dans votre province de résidence, ou qui ne sont pas achetés ou vendus conformément aux lois et règlements applicables.&nbsp;</p>
                    <p><strong><u>Important&nbsp;:</u></strong> <strong>Il vous incombe de vous assurer du respect de toutes les lois applicables concernant l'article que vous affichez, achetez ou vendez.</strong></p>
                    <p>&nbsp;</p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="{{$id == 'avantages-de-l-inscription' ? '' : 'collapsed'}}">
                      Avantages de l’inscription
                    </a>
                  </h4>
                </div>
                  <div id="collapseFour" class="panel-collapse collapse {{$id =='avantages-de-l-inscription' ? 'in' : ''}}">
                  <div class="panel-body">
                    <p>Parmi les avantages de la vente ou de l’achat entre particuliers est certainement très avantageux sur le plan économique sur le produit acheté.</p>
                    <p>En effet,&nbsp;devenir membre inscrit du&nbsp;Foress&nbsp;vous permet de mettre en avant vos annonces et de les gérer très facilement via votre profil&nbsp;Foress. Une fois que votre compte est ouvert et validé, vous avez accès à&nbsp;«&nbsp;Mon compte »&nbsp;ou à «&nbsp;Mon Profil »&nbsp;qui vous permet de faire presque tout en quelques clics.</p>
                    <p>Les avantages liés à l’inscription vous permettent entre autres de :</p>
                    <ul type="disc">
                      <li>Créer vos annonces, introduire une description du votre produit et télécharger des images appuyant votre annonce,</li>
                      <li>Afficher et consulter des annonces,</li>
                      <li>Recevoir des notifications directement par courriel,</li>
                      <li>Modifier, promouvoir ou supprimer vos annonces,</li>
                      <li>Gérer votre profil et modifier vos informations personnelles,&nbsp;</li>
                      <li>Réserver un nom d'utilisateur pour ouvrir une session,</li>
                      <li>Gérer vos préférences de compte,</li>
                      <li>Et bien plus !</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="{{$id == 'publicite-sur-foress' ? '' : 'collapsed'}}">
                      Pourquoi nous sommes le bon choix pour vous ?
                    </a>
                  </h4>
                </div>
                  <div id="collapseFive" class="panel-collapse collapse {{$id =='publicite-sur-foress' ? 'in' : ''}}">
                  <div class="panel-body">
                    <ul type="disc">
                      <li>NOUS SOMMES EXACTEMENT LÀ OÙ IL VOUS FAUT ÊTRE ; </li>
                      <li>Nous avons tous les outils dont vous avez besoin pour créer ou gérer vos propres annonces ;</li>
                      <li>Votre succès est notre spécialité ;</li>
                      <li>Notre audience. Votre croissance ;</li>
                      <li>Nos conseillers spécialement formés sont ici pour vous aider à chaque étape. Vous pouvez travailler en collaboration avec eux pour créer votre campagne ou simplement leur demander de l’aide au besoin.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- accordion End -->    
          </div>      
        </div>
      </div>      
    </div>

    <!-- End Content -->

  @endsection