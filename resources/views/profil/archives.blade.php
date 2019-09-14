
    @extends('profil.layout')

    @section('content')

    <!-- Start Content -->

    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 page-sideabr">
            <aside>
              <div class="inner-box">
                <div class="user-panel-sidebar">
                  <div class="collapse-box">
                    <h5 class="collapset-title no-border">Mon profil <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li>
                          <a href="/home"><i class="fa fa-home"></i> {{Auth::user()->username}}  </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="collapse-box">
                    <h5 class="collapset-title">Mon compte<a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li>
                          <a href="/myads"><i class="fa fa-credit-card"></i> Mes Annonces <span class="badge"></span></a>
                        </li>
                        <li>
                          <a href="/favorites"><i class="fa fa-heart-o"></i> Mes Favoris <span class="badge"></span></a>
                        </li>
                        <li class="active">
                          <a href="/archives"><i class="fa fa-folder-o"></i> Archives <span class="badge"></span></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="collapse-box">
                    <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li>
                          <a href="/logout"><i class="fa fa-close"></i> Déconnexion</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </aside>
          </div>
          <div class="col-sm-9 page-content">
            <div class="inner-box">              
              <h2 class="title-2"><i class="fa fa-folder-o"></i> Mes anciennes annonces </h2>
              <div class="table-responsive">
                <div class="table-action">
                  <div class="checkbox">
                    <label for="checkAll">
                      <input id="checkAll" onclick="checkAll(this)" type="checkbox">
                      Tout sélectionner | <a href="#" class="btn btn-xs btn-danger">Supprimer <i class="fa fa-close"></i></a>
                    </label>
                  </div>
                  <div class="table-search pull-right col-xs-7">
                    <div class="form-group">
                      <label class="col-xs-5 control-label text-right">Recherche <br>
                      </label>
                      <div class="col-xs-7 searchpan">
                        <input class="form-control" id="filter" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                
                <table class="table table-striped table-bordered add-manage-table">
                  <thead>
                    <tr>
                      <th data-type="numeric"></th>
                      <th>Photo</th>
                      <th>Détails</th>
                      <th>Prix</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  @foreach ($result as $results)
                    <tbody>
                    <tr id="{{$results->id_annonce}}">
                      <td class="add-img-selector">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                          </label>
                        </div>
                      </td>
                      <td class="add-img-td">
                        <a href="#">
                          <img class="img-responsive" src="{{asset('img/bientot-disponible.jpg')}}" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">
                        <h4><a href="#">{{$results->titre}}</a></h4>
                        <p> <strong> Posté le </strong>:
                          {{$results->created_at}} </p>
                        <p> <strong>Nombre de visiteurs </strong>:  <strong>Wilaya :</strong> {{$results->wilaya}} </p>
                      </td>
                      <td class="price-td">
                        <strong> {{$results->prix}}</strong>
                      </td>
                      <td class="action-td">
                        <p> <a class="btn btn-info btn-xs" onclick="repostAd({{$results->id_annonce}})"> <i class="fa fa-recycle"></i> Republier </a></p>
                        <p> <a class="btn btn-danger btn-xs" onclick="deleteAd({{$results->id_annonce}})"> <i class=" fa fa-trash"></i> Supprimer </a></p>
                      </td>
                    </tr>
                    </tbody>
                  @endforeach
                </table>
              </div>               
            </div>
          </div>
        </div>  
      </div>      
    </div>

    <!-- End Content -->

          @endsection

    <script>

      function deleteAd(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
          title: "Êtes-vous sûr?",
          text: "Une fois supprimé, vous ne pourrez plus récupérer cette annonce!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url : "/updateAD/"+id,
                type : "POST",
                data : {'_method' : 'DELETE','_token':csrf_token},
                success : function(data){
                  swal("Votre annonce a été supprimée!", {
                    icon: "success",
                  });
                  $('#'+id).remove();
                }
              })
            }
          });
      }

      function repostAd(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
          title: "Êtes-vous sûr?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  url : "/repostAd/"+id,
                  type : "POST",
                  data : {'_method' : 'PATCH','_token':csrf_token},
                  success : function(data){
                    swal("Votre annonce a été republiée!", {
                      icon: "success",
                    });
                    $('#'+id).remove();
                  }
                })
              }
            });
      }

    </script>