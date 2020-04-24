<div class="main-container">
<div class="container">
<div class="row" id="ads">
  <div class="col-sm-3 page-sideabr">
    <aside>
      <div class="inner-box">
        <div class="user-panel-sidebar">
          <div class="collapse-box">
            <h5 class="collapset-title no-border">{{__('layout.profil_menu')}} <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
            <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
              <ul class="acc-list">
                <li class="{{ (request()->is('home')) ? 'active' : '' }}">
                  <a href="/home"><i class="fa fa-home"></i> {{Auth::user()->nom}}  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="collapse-box">
            <h5 class="collapset-title">{{__('layout.account_menu')}}<a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
            <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
              <ul class="acc-list">
                <li class="{{ (request()->is('my-ads')) ? 'active' : '' }}">
                  <a href="/my-ads"><i class="fa fa-credit-card"></i> {{__('layout.my_ads_menu')}}<span class="badge"></span></a>
                </li>
                <li class="{{ (request()->is('favorites')) ? 'active' : '' }}">
                  <a href="/favorites"><i class="fa fa-heart-o"></i> {{__('layout.my_favorits_menu')}} <span class="badge"></span></a>
                </li>
                <li class="{{ (request()->is('archives')) ? 'active' : '' }}">
                  <a href="/archives"><i class="fa fa-folder-o"></i> {{__('layout.archives_menu')}} <span class="badge"></span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="collapse-box">
            <div aria-expanded="true" id="close" class="panel-collapse collapse in">
              <ul class="acc-list">
                <li>
                  <a href="/logout"><i class="fa fa-close"></i> {{__('layout.logout_button')}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="inner-box">
        <img src="{{asset('img/pub/helpiste.jpg')}}" alt="">
      </div>
    </aside>
  </div>