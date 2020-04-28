  @extends('profil.layout')

  @section('content')
  <!-- Content section Start -->
  <section class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="page-ads box">             
            <h2 class="title-2">Poster une annonce</h2><!-- Start Search box -->               
                <form class="search-form" enctype="multipart/form-data" method="post" action="javascript:void(0)" id="addAd">
                    @csrf
                    <div class="form-group has-feedback Caterror">
                    <label class="control-label" for="textarea">Catégories <span class="required">*</span></label> 
                    <select class="form-control" id="categorie" name="categorie">
                      <option value="">-- Sélectionner --</option>
                          @foreach ($categorie as $key => $value)    
                            <option @if(old('categorie') == $value->idCat) {{ 'selected' }} @endif value="{{$value->idCat}}">{{ $value->categories }}</option>
                          @endforeach
                    </select>
                    <div class="invalid-feedback Cat-error"></div>
                  </div>   

              <div class="form-group sub_cat has-feedback sousCaterror">
              <label class="control-label" for="textarea">Sous Catégories <span class="required">*</span></label> 
              <select class="form-control" id="sousCat" name="sousCat"  disabled>
                 <option value="">-- Sélectionner --</option>
              </select>
              <div class="invalid-feedback sousCat-error"></div>
            </div>
          </div>
          <input type="hidden" id="id_subcat" value="{{old('sousCat')}}">  
          <div class="mb30"></div>
          <div class="box">
          <div class="form-group mb30 has-feedback titlerror">
                <label class="control-label">Titre de l'annonce <span class="required">*</span></label>
                  <input class="form-control input-md" name="Adtitle" id="Adtitle" placeholder="Écrivez un titre approprié pour votre annonce" type="text" value="{{old('Adtitle')}}">
                  <div class="invalid-feedback titl-error"></div>
              </div>
              <div class="form-group state">
                <label class="control-label" for="textarea">État</label> 
                <select class="form-control" name="etat" id="etat">
                    <option value="">Sélectionner</option>
                    <option {{ old('etat') == 'Produit neuf jamais utilisé' ? 'selected' : ''}}>Produit neuf jamais utilisé</option>
                    <option {{ old('etat') == 'État neuf (Sous emballage)' ? 'selected' : ''}}>État neuf (Sous emballage)</option>
                    <option {{ old('etat') == 'État moyen' ? 'selected' : ''}}>État moyen</option>
                </select>
              </div>
              <div class="form-group mb30 has-feedback descerror">
                <label class="control-label">Description <span class="required">*</span></label> <textarea class="form-control" rows="5" name="descrp" id="descrp">{{old('descrp')}}</textarea>
                <div class="invalid-feedback desc-error"></div>
              </div>
          </div> 
        
 <!-- *************************************** VEHICULES ************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="vehicule">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <div class="checkbox">
                    <label><input type="radio" name="vente" id="vente" value="selling"> Je vends </label><br>
                    <label><input type="radio" name="vente" id="vente1" value="searching"> Je recherche </label>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueVeh" id="marqueVeh">
                <option value="">Sélectionner</option>
                <option {{ old('marqueVeh') == 'Audi' ? 'selected' : ''}}>Audi</option>
                <option {{ old('marqueVeh') == 'BMW' ? 'selected' : ''}}>BMW</option>
                <option {{ old('marqueVeh') == 'Cadillac' ? 'selected' : ''}}>Cadillac</option>
                <option {{ old('marqueVeh') == 'Chevrolet' ? 'selected' : ''}}>Chevrolet</option>
                <option {{ old('marqueVeh') == 'Citroen' ? 'selected' : ''}}>Citroen</option>
                <option {{ old('marqueVeh') == 'Dacia' ? 'selected' : ''}}>Dacia</option>
                <option {{ old('marqueVeh') == 'Honda' ? 'selected' : ''}}>Honda</option>
                <option {{ old('marqueVeh') == 'Hyundai' ? 'selected' : ''}}>Hyundai</option>
                <option {{ old('marqueVeh') == 'Isuzu' ? 'selected' : ''}}>Isuzu</option>
                <option {{ old('marqueVeh') == 'Kia' ? 'selected' : ''}}>Kia</option>
                <option {{ old('marqueVeh') == 'Seat' ? 'selected' : ''}}>Seat</option>
                <option {{ old('marqueVeh') == 'Skoda' ? 'selected' : ''}}>Skoda</option>
                <option {{ old('marqueVeh') == 'Volkswagen' ? 'selected' : ''}}>Volkswagen</option>
                <option {{ old('marqueVeh') == 'Baic' ? 'selected' : ''}}>Baic</option>
                <option {{ old('marqueVeh') == 'Nissan' ? 'selected' : ''}}>Nissan</option>
                <option {{ old('marqueVeh') == 'Peugeot' ? 'selected' : ''}}>Peugeot</option>
                <option {{ old('marqueVeh') == 'Renault' ? 'selected' : ''}}>Renault</option>
                <option {{ old('marqueVeh') == 'Toyota' ? 'selected' : ''}}>Toyota</option>
                <option {{ old('marqueVeh') == 'Autres' ? 'selected' : ''}}>Autres</option>
              </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modeleVeh" id="modeleVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Année</label> <input class="form-control" name="anneVeh" id="anneVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Kilomètrage</label> <input class="form-control" name="kilomVeh" id="kilomVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Type carburant</label>
            <select class="form-control" name="typeCarb" id="typeCarb">
                    <option value="">Sélectionner</option>
                    <option {{ old('typeCarb') == 'Essence' ? 'selected' : ''}}>Essence</option>
                    <option {{ old('typeCarb') == 'Gas oil' ? 'selected' : ''}}>Gas oil</option>
                    <option {{ old('typeCarb') == 'GPL' ? 'selected' : ''}}>GPL</option>
                    <option {{ old('typeCarb') == 'Eléctrique' ? 'selected' : ''}}>Eléctrique</option>
                </select>
            </div>
          </div>
  
            
<!-- ************************************* PHONE ********************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="phone">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marquePhone" id="marquePhone">
                    <option value="">Sélectionner</option>
                    <option {{ old('marquePhone') == 'Apple' ? 'selected' : ''}}>Apple</option>
                    <option {{old('marquePhone')== 'BlackBerry' ? 'selected' : ''}}>BlackBerry</option>
                    <option {{ old('marquePhone') == 'Condor' ? 'selected' : ''}}>Condor</option>
                    <option {{ old('marquePhone') == 'Ericsson' ? 'selected' : ''}}>Ericsson</option>
                    <option {{ old('marquePhone') == 'Huawei' ? 'selected' : ''}}>Huawei</option>
                    <option {{ old('marquePhone') == 'LG' ? 'selected' : ''}}>LG</option>
                    <option {{ old('marquePhone') == 'Motorola' ? 'selected' : ''}}>Motorola</option>
                    <option {{ old('marquePhone') == 'Nokia' ? 'selected' : ''}}>Nokia</option>
                    <option {{ old('marquePhone') == 'Samsung' ? 'selected' : ''}}>Samsung</option>
                    <option {{ old('marquePhone') == 'Sony' ? 'selected' : ''}}>Sony</option>
                    <option {{ old('marquePhone') == 'Autres' ? 'selected' : ''}}>Autres</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modelePhone" id="modelePhone" type="text">
          </div>
          </div>
            
<!-- ************************************** STOCKAGE ******************************************* -->
            
          <div class="mb30"></div>
          <div class="box details" id="stockage">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Type</label>
            <select class="form-control" name="typeStockage" id="typeStockage">
              <option value="">Sélectionner</option>
              <option {{old('typeStockage')== 'Flash disque' ? 'selected' : ''}}>Flash disque</option>
              <option {{old('typeStockage')== 'Disque dur externe' ? 'selected' : ''}}>Disque dur externe</option>
              <option {{old('typeStockage')== 'Disque dur interne' ? 'selected' : ''}}>Disque dur interne</option>
              <option {{old('typeStockage')== 'Carte mémoire' ? 'selected' : ''}}>Carte mémoire</option>
          </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <input class="form-control" name="marqueStockage" id="marqueStockage" type="text">
          </div>
          <div class="form-group">
              <label class="control-label" for="textarea">Capacité (Go)</label>
              <input class="form-control" name="capaciteStock" id="capaciteStock" type="text">
          </div>
          </div>

<!-- *************************************** EVENEMENT **************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="event">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Date et heure de l'événement</label>
                    <input class="form-control" name="datetimeEvent" id="datetimeEvent" type="datetime-local">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Du</label>
                    <input class="form-control" name="du" id="du" type="date">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Au</label>
                    <input class="form-control" name="au" id="au" type="date">
                </div>
            </div>
            
<!-- ******************************** ORDINATEURS ******************************************* -->
            
          <div class="mb30"></div>    
          <div class="box details" id="ordinateurs">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueOrd" id="marqueOrd">
                    <option value="">Sélectionner</option>
                    <option {{old('marqueOrd')== 'Acer' ? 'selected' : ''}}>Acer</option>
                    <option {{old('marqueOrd')== 'Apple' ? 'selected' : ''}}>Apple</option>
                    <option {{old('marqueOrd')== 'Asus' ? 'selected' : ''}}>Asus</option>
                    <option {{old('marqueOrd')== 'Dell' ? 'selected' : ''}}>Dell</option>
                    <option {{old('marqueOrd')== 'HP' ? 'selected' : ''}}>HP</option>
                    <option {{old('marqueOrd')== 'Lenovo' ? 'selected' : ''}}>Lenovo</option>
                    <option {{old('marqueOrd')== 'Samsung' ? 'selected' : ''}}>Samsung</option>
                    <option {{old('marqueOrd')== 'Sony' ? 'selected' : ''}}>Sony</option>
                    <option {{old('marqueOrd')== 'Toshiba' ? 'selected' : ''}}>Toshiba</option>
                    <option {{old('marqueOrd')== 'Autre' ? 'selected' : ''}}>Autre</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Taille de l'écran</label>
            <select class="form-control" name="tailleOrd" id="tailleOrd">
              <option value="">Sélectionner</option>
              <option {{old('tailleOrd')== '14 po ou moins' ? 'selected' : ''}}>14 po ou moins</option>
              <option {{old('tailleOrd')== '15 po' ? 'selected' : ''}}>15 po</option>
              <option {{old('tailleOrd')== '16 po' ? 'selected' : ''}}>16 po</option>
              <option {{old('tailleOrd')== '17 po ou plus' ? 'selected' : ''}}>17 po ou plus</option>
          </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Processeur</label>
            <input class="form-control" name="processeur" id="processeur" type="text" value="{{old('processeur')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Mémoire RAM</label>
            <input class="form-control" name="memoireRAM" id="memoireRAM" type="text" value="{{old('memoireRAM')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Taille du disque (Go)</label>
            <input class="form-control" name="tailleDisque" id="tailleDisque" type="text" value="{{old('tailleDisque')}}">
          </div>
          </div>

<!-- ******************************** Offres d'emploi ****************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="offresEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineOffre" id="domaineOffre">
                      <option value="">Sélectionner</option>
                        @foreach ($domaineEmploi as $domaine)
                            @if (old('domaineOffre') == $domaine->nomDomaine)
                                <option selected>{{ $domaine->nomDomaine}}</option>
                            @else
                                <option>{{ $domaine->nomDomaine }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Entreprise</label>
                    <input class="form-control" name="entreprise" id="entreprise" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Adresse</label>
                    <input class="form-control" name="adresse" id="adresse" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Poste</label>
                    <input class="form-control" name="posteOffre" id="posteOffre"  type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Salaire</label>
                    <input class="form-control" name="salaire" id="salaire" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Diplôme requis</label>
                    <input class="form-control" name="diplomeRequis" id="diplomeRequis" type="text" value="{{old('diplomeRequis')}}">
                </div>
            </div>

 <!-- ******************************* Demandes d'emploi ************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="demandesEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <div class="checkbox">
                            <label><input type="radio" value="Femme" name="sexe"> Femme </label><br>
                            <label><input type="radio" value="Homme" name="sexe"> Homme </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineDemande" id="domaineDemande">
                      <option value="">Sélectionner</option>
                        @foreach ($domaineEmploi as $domaine)
                            @if (old('domaineDemande') == $domaine->nomDomaine)
                                <option selected>{{ $domaine->nomDomaine}}</option>
                            @else
                                <option>{{ $domaine->nomDomaine }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Âge</label>
                    <input class="form-control" name="age" id="age" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Poste</label>
                    <input class="form-control" name="posteDemande" id="posteDemande" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Niveau d'éducation</label>
                    <input class="form-control" name="niveauEducation" id="niveauEducation" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Diplôme</label>
                    <input class="form-control" name="diplomeDemande" id="diplomeDemande" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Année d'expérience</label>
                    <input class="form-control" name="anneExp" id="anneExp" type="text">
                </div>
            </div>

<!-- *********************************** Immobilier ***************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="immobilier">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Type du Bien</label>
                    <select class="form-control" name="typeBien" id="typeBien">
                        <option value="">Sélectionner</option>
                        <option {{old('typeBien')== 'Appartement' ? 'selected' : ''}}>Appartement</option>
                        <option {{old('typeBien')== 'Studio' ? 'selected' : ''}}>Studio</option>
                        <option {{old('typeBien')== 'Villa' ? 'selected' : ''}}>Villa</option>
                        <option {{old('typeBien')== 'Local' ? 'selected' : ''}}>Local</option>
                        <option {{old('typeBien')== 'Terrain' ? 'selected' : ''}}>Terrain</option>
                        <option {{old('typeBien')== 'Carcasse' ? 'selected' : ''}}>Carcasse</option>
                        <option {{old('typeBien')== 'Usine' ? 'selected' : ''}}>Usine</option>
                        <option {{old('typeBien')== 'Immeuble' ? 'selected' : ''}}>Immeuble</option>
                        <option {{old('typeBien')== 'Autre' ? 'selected' : ''}}>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Superficie</label>
                    <input class="form-control" name="superficie" id="superficie" type="text" placeholder="En M²">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Nombre de pièces</label>
                    <input class="form-control" name="nbrePiece" id="nbrePiece" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Étage</label>
                    <input class="form-control" name="etage"  id="etage" type="text">
                </div>
            </div>

<!-- *************************************** INFO COMMUNE ************************************** -->
      
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Prix</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Prix</label>
              <input class="form-control" placeholder="Prix en DA" name="prix" id="prix" type="text">
          </div>
          </div>

          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Emplacement</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Adresse</label>
              <input class="form-control" name="adresse" placeholder="Adresse" value="{{old('adresse')}}">
          </div>
          <div class="form-group has-feedback wilayaerror">
            <label class="control-label" for="textarea">Wilaya <span class="required">*</span></label>
              <input class="form-control dropdown-product selectpicker" name="wilaya" id="wilaya2" placeholder="Wilaya" value="{{old('wilaya')}}">
              <div class="invalid-feedback wilaya-error"></div>
          </div>
          </div>
            
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Coordonnées</h2>
          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">E-mail</label>
              <input class="form-control" placeholder="Votre E-mail" name="email" id="email" type="text" value="{{old('email')}}">
          </div>
          <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">Numéro de téléphone</label>
              <input class="form-control" placeholder="Votre numéro de téléphone" name="phone" id="phone2" type="text">
            <div class="checkbox">
              <label>
                  <input type="hidden" name="phoneHide" id="phoneHide" value="0" />
                  <input type="checkbox" value="1" name="phoneHide" id="phoneHide1"> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
            </div>
            </div>
          </div>
         <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Média</h2>
          <div class="form-group has-feedback">            
          <label class="control-label" >Ajoutez des photos pour attirer l'attention sur votre annonce</label>
            <input class="pro-image"  type="file" multiple accept="image/png,image/jpeg, image/jpg"/> <br>          
          </div>
          <div class="preview-images-zone">
            <div class="preview-image preview-show-1" onClick="$('.pro-image').click()">
                <div class="image-zone"><img id="pro-img-1" data-src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw==" loading="lazy" class="lazyload" /></div>
            </div>
          </div>
          </div>
          <div class="mb30"></div>
          <div class="form-group">
            <div class="page-ads box">
              <div class="checkbox has-feedback">
                <label>  
                  <input type="checkbox" name="condition">En affichant cette annonce, vous acceptez nos <a href="/centre-aide/conditions-d-utilisation" target="_blank">Conditions d’utilisation</a>               
                  , notre <a href="/centre-aide/politique-de-confidentialite" target="_blank">Politique de confidentialité </a> 
                  et nos 
                  <a href="/centre-aide/regles-d-affichage" target="_blank">Règles d’affichage</a>.   
              </label>
              <div class="invalid-feedback condition-error"></div>
              </div><br>
              <button class="btn btn-common" type="submit" id="submit">Poster</button>
            </div>
          </div>
        </div>
      </form>
      <div class="col-sm-3 page-sideabr">
        <img data-src="{{asset('img/pub/helpiste.jpg')}}" alt="" loading="lazy" class="lazyload" /> 
      </div>
      <div class="col-sm-3 page-sideabr">
        <img data-src="{{asset('img/pub/SaidIlaKheir.jpg')}}" alt="" loading="lazy" class="lazyload" />  
      </div>
      </div>
    </div>
  </section><!-- Content section End -->

@endsection
