
    @extends('profil.layout')

    @section('content')

    <!-- Start Content -->
    
          <div class="col-sm-9 page-content">
            <div class="inner-box">              
              <h2 class="title-2"><i class="fa fa-folder-o"></i> Mes anciennes annonces </h2>
              <div class="table-responsive">
                <form action="/deleteAll" method="post">
                  @csrf
                  @method('DELETE')
                <div class="table-action">
                  <div class="checkbox">
                    <label for="checkAll">
                      <input id="checkAll" type="checkbox">
                      Tout sélectionner | <button type="submit" class="btn btn-xs btn-danger"> Supprimer <i class="fa fa-close"></i></button>
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
                    <tr id="{{$results->id_annonce}}" class="filter">
                      <td class="add-img-selector">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="ids[]" class="selectbox" value="{{$results->id_annonce}}">
                          </label>
                        </div>
                      </td>
                      <td class="add-img-td">
                        <a href="/my-ads/details/{{$results->id_annonce}}">
                          <img class="img-responsive" src="{{asset('img/bientot-disponible.jpg')}}" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">
                        <h4 class="title"><a href="/my-ads/details/{{$results->id_annonce}}">{{$results->titre}}</a></h4>
                        <p> <strong> Posté le </strong>:
                          {{$results->created_at}} </p>
                        <p> <strong>Nombre de visiteurs </strong>: {{$results->numberViews}}  <strong>Wilaya :</strong> {{$results->wilaya}} </p>
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
              </form>
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
          buttons: ["Annuler", "Oui"],
          dangerMode: true,
        })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url : "/update-AD/"+id,
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
          buttons: ["Annuler", "Oui"],
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