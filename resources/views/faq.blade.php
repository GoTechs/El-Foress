
  @extends('layout')

  @section('content')


    <!-- Page Header Start -->
    <div class="page-header" style="background: url({{asset('img/banner1.jpg')}}">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">{{__('faq.faq')}}</h2>
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
              <h2 class="section-title">{{__('faq.frequently_asked')}}</h2>
            </div>
            <!-- accordion start -->
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      {{__('faq.first_questiom')}} 
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>{{__('faq.first_response')}} </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      {{__('faq.second_questiom')}}
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      {{__('faq.second_response')}}
                    </p>             
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      {{__('faq.third_questiom')}}
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                     {{__('faq.third_response')}}
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                      {{__('faq.firth_questiom')}}
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      {{__('faq.firth_response')}} 
                    </p>
                    <br>
                    <p>
                      {{__('faq.firthh_response')}}
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                      {{__('faq.fifth_questiom')}}
                    </a>
                  </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      {{__('faq.fifth_response')}}
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