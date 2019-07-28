
  @extends('layout')

  @section('content')


    <!-- Page Header Start -->
    <div class="page-header" style="background: url({{asset('img/banner1.jpg')}}">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">FAQ</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Start Content -->
    <div id="content">
      <div class="container">        
        <div class="row">
          <div class="col-md-12">
            <div class="head-faq text-center">
              <h2 class="section-title">QUESTIONS FRÉQUEMMENT POSÉES</h2>
            </div>
            <!-- accordion start -->
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      Pourquoi devez-vous vérifier mon adresse mail ? 
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>Nous vérifions les adresses mail pour s’assurer que quelqu’un puisse vous envoyer un message dans le but de répondre à votre publication et pour réduire le nombre de publications frauduleuses. Nous n’afficherons ou ne donnerons jamais votre adresse mail à qui que ce soit. </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      Combien coûte une annonce d’emploi, de bien ou d’un autre type ?
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Nos annonces immobilières, d’emploi, et nos petites annonces de base sont gratuites, donc aucun coût ne vous sera facturé pour cette publication.
                    </p>             
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      Comment puis-je voir mes petites annonces ?
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                     En vous connectant sur votre compte, vous pouvez voir toutes vos annonces publiées antérieurement en cliquant sur «Mon Compte» au milieu à gauche.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                      Comment publier une annonce ?
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Pour publier une annonce, rien de plus facile. Cliquez sur « déposer une annonce », puis renseignez le questionnaire en respectant bien les informations qui y sont mentionnées. La région à choisir est celle dans laquelle votre bien est à vendre. Ne faites pas d'erreur sur votre adresse email et votre numéro de téléphone, qui permettront aux internautes intéressés de vous joindre. 
                    </p>
                    <br>
                    <p>
                      D'autre part, choisissez avec soin le titre et le descriptif de votre annonce pour ainsi optimiser votre vente. Pour terminer, une annonce avec photos est 10 fois plus consultée qu'une annonce sans photo, alors n'hésitez pas à rendre votre annonce attrayante.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                      Qui peut publier sur Foress.com
                    </a>
                  </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Le site est ouverts à tous les internautes algeriens, ils peuvent publier tant qu'ils veulent d'annonces à condition que celles-ci répondent aux normes et respectent les règles d'utilisation du site
                    </p>
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