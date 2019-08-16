
          @extends('layout')

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
                                  <a href="/home"><i class="fa fa-home"></i> sarra </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="collapse-box">
                            <h5 class="collapset-title">Mon compte<a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
                            <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                              <ul class="acc-list">
                                <li>
                                  <a href="/myads"><i class="fa fa-credit-card"></i> Mes Annonces <span class="badge">44</span></a>
                                </li>
                                <li class="active">
                                  <a href="/favorites"><i class="fa fa-heart-o"></i> Mes Favoris <span class="badge">19</span></a>
                                </li>
                                <li>
                                  <a href="/archives"><i class="fa fa-folder-o"></i> Archives <span class="badge">49</span></a>
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
              <h2 class="title-2"><i class="fa fa-heart-o"></i> Mes favoris</h2>
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
                        <a title="clear filter" class="clear-filter" href="#clear">[clear]</a> 
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
                      <th>Adds Details</th>
                      <th>Price</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="add-img-selector">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                          </label>
                        </div>
                      </td>
                      <td class="add-img-td">
                        <a href="ads-details.php">
                          <img class="img-responsive" src="assets/img/item/img-1.jpg" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">
                        <h4><a href="ads-details.php">Brand New All about iPhones</a></h4>
                        <p> <strong> Posted On </strong>:
                        02-Oct-2017, 04:38 PM </p>
                        <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>
                      </td>
                      <td class="price-td">
                        <strong> $199</strong>
                      </td>
                      <td class="action-td">
                        <p><a class="btn btn-info btn-xs"> <i class="fa fa-share-square-o"></i> Share</a></p>
                        <p> <a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete </a></p>
                      </td>
                    </tr>
                    <tr>
                      <td class="add-img-selector">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                          </label>
                        </div>
                      </td>
                      <td class="add-img-td">
                        <a href="ads-details.php">
                          <img class="img-responsive" src="assets/img/item/img-2.jpg" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">                        
                        <h4><a href="ads-details.php">Sony Xperia dual sim 100% brand new iPad</a></h4>
                        <p> <strong> Posted On </strong>:
                        02-Oct-2017, 04:38 PM </p>
                        <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>                        
                      </td>
                      <td class="price-td">                        
                        <strong> $74</strong>                        
                      </td>
                      <td class="action-td">
                       <p><a class="btn btn-info btn-xs"> <i class="fa fa-share-square-o"></i> Share</a></p>
                        <p> <a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete </a></p>
                      </td>
                    </tr>
                    <tr>
                      <td class="add-img-selector">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                          </label>
                        </div>
                      </td>
                      <td class="add-img-td">
                        <a href="ads-details.php">
                          <img class="img-responsive" src="assets/img/item/img-3.jpg" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">
                        <h4><a href="ads-details.php">Digital Cameras brand new</a></h4>
                        <p> <strong> Posted On </strong>:
                        02-Oct-2017, 04:38 PM </p>
                        <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>
                      </td>
                      <td class="price-td">
                        <strong> $49</strong>
                      </td>
                      <td class="action-td">
                       <p><a class="btn btn-info btn-xs"> <i class="fa fa-share-square-o"></i> Share</a></p>
                        <p> <a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete </a></p>
                      </td>
                    </tr>
                    <tr>
                      <td class="add-img-selector">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                          </label>
                        </div>
                      </td>
                      <td class="add-img-td">
                        <a href="ads-details.php">
                          <img class="img-responsive" src="assets/img/item/img-4.jpg" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">
                        <h4><a href="ads-details.php">Samsung Galaxy dual sim 100% brand new</a></h4>
                        <p> <strong> Posted On </strong>:
                        02-Oct-2017, 04:38 PM </p>
                        <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>
                      </td>
                      <td class="price-td">
                        <strong> $149</strong>
                      </td>
                      <td class="action-td">
                       <p><a class="btn btn-info btn-xs"> <i class="fa fa-share-square-o"></i> Share</a></p>
                        <p> <a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete </a></p>
                      </td>
                    </tr>
                    <tr>
                      <td class="add-img-selector">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                          </label>
                        </div>
                      </td>
                      <td class="add-img-td">
                        <a href="ads-details.php">
                          <img class="img-responsive" src="assets/img/item/img-5.jpg" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">
                        <h4><a href="ads-details.php">Brand New Macbook Pro</a></h4>
                        <p><strong> Posted On </strong>: <span>02-Oct-2017, 04:38 PM </span></p>
                        <p><strong>Visitors</strong>: <span>221</span> <strong>Located In:</strong> <span>New York</span></p>
                      </td>
                      <td class="price-td">
                        <strong> $168</strong>
                      </td>
                      <td class="action-td">
                       <p><a class="btn btn-info btn-xs"> <i class="fa fa-share-square-o"></i> Share</a></p>
                        <p> <a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete </a></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>               
            </div>
          </div>
        </div>  
      </div>      
    </div>

    <!-- End Content -->

          @endsection