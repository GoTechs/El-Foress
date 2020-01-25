
          @extends('profil.layout')

          @section('content')

          <!-- Start Content -->
            
          <div class="col-sm-9 page-content">
            <div class="inner-box">
              <h2 class="title-2"><i class="fa fa-heart-o"></i> {{__('myads.myfavorits_page_title')}}</h2>
              @if ($result <> [])
              <div class="table-responsive">
                <form action="/deleteAllFav" method="post">
                  @csrf
                  @method('DELETE')
                <div class="table-action">
                  <div class="checkbox">
                    <label for="checkAll">
                      <input id="checkAll" type="checkbox">
                      {{__('myads.select_all_button')}} | <button type="submit" class="btn btn-xs btn-danger"> {{__('myads.delete_all_button')}} <i class="fa fa-close"></i></button>
                    </label>
                  </div>
                  <div class="table-search pull-right col-xs-7">
                    <div class="form-group">
                      <label class="col-xs-5 control-label text-right">{{__('myads.search_input')}} <br>
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
                      <th>{{__('myads.image_column')}}</th>
                      <th>{{__('myads.details_column')}}</th>
                      <th>{{__('myads.price_column')}}</th>
                      <th>{{__('myads.option_column')}}</th>
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
                        <p> <strong> {{__('myads.date_add_info')}} </strong>:
                          {{$results->created_at}} </p>
                        <p> <strong>{{__('myads.number_visitor_info')}} </strong>: {{$results->numberViews}} <strong>{{__('myads.wilaya_info')}} :</strong> {{$results->wilaya}} </p>
                      </td>
                      <td class="price-td">
                        <strong> {{$results->prix}}</strong>
                      </td>
                      <td class="action-td">
                        <p> <a class="btn btn-danger btn-xs" onclick="deleteFav({{$results->id_annonce}})"> <i class=" fa fa-trash"></i> {{__('myads.delete_button')}} </a></p>
                      </td>
                    </tr>
                    </tbody>
                  @endforeach
                </table>
              </form>
              </div> 
            @else  
              <h6>{{__('myads.myfav_empty_result')}} <a href="/categorie">{{__('myads.find_ads_link')}}</a></h6>
            @endif             
            </div>
          </div>

    <!-- End Content -->

          <script type="text/javascript">
            
            function deleteFav(id){
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
                        url : "/deleteFav/"+id,
                        type : "POST",
                        data : {'_method' : 'DELETE','_token':csrf_token},
                        success : function(){
                          swal("L'annonce a été supprimée des favoris", {
                            icon: "success",
                          });
                          $('#'+id).remove();
                        }
                      })
                    }
                  });
            }
          </script>

@endsection