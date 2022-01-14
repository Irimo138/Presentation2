    @extends('layouts.estylesAndJs')
    @section('code')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <body id="page-top" class="bg-dark">

    
      <!-- Navigation-->

    
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{asset('/img/logo.png')}}" alt="..." /></a>
            <a id="agenda" href="{{url('/')}}">Agenda.eus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              

                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @if(auth()->user()== null)
                  <li class="nav-item"><button class="btn btn-success-warning bg-warning" data-bs-toggle="modal" data-bs-target="#loginModal" href="#services">{{trans('messages.login')}}</button></li>
                @elseif(auth()->user()!= null)
                  
                  <li class="nav-item"><a href="{{ url('/logout') }}"> logout </a></li>
                @endif
                @if (session('status'))
                    <p> {{ session('status') }}</p>
                @endif

                </ul>
            </div>
        </div>
    </nav>


    <!-- Login Modal-->

        
    <div class="modal fade" id="loginModal" tabindex="0" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <img id="logoModal" src="{{asset('/img/logo.png')}}" alt="">
                  <h5 class="modal-title" id="loginModalLabel">Login in Agenda</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="loginModalBody" class="modal-body" class="row d-flex">
                    <div id="registerAction" class="col-6">
                        <h4 class="p-2 col-12 text-white">Still not a member?</h4>
                        <button  class="btn btn-success-warning bg-warning" data-bs-toggle="modal" data-bs-target="#RegisterModal">Register</button>
                    </div>

                    <div id="login" class="col-6">
                      <div class="card">
                            <div class="card-header">
                              {{ __('Login') }}
                            </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-12">
                                      
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

              

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                   

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif

                                    </div>
                                </div>
                           
                        </div>
                     </div>
      
            <div class="row justify-content-center">
                <div class="col-md-8">

                  </div>
              </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                
                </div>
                </form>
              </div>
            </div>
        </div>

         <!-- Register Modal-->

         <div class="modal fade" id="RegisterModal" tabindex="0" aria-labelledby="RegisterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="createModal">
                <div class="modal-header">
                  <img id="logoModal" src="{{asset('/img/logo.png')}}" alt="">
                  <h5 class="modal-title" id="RegisterModalLabel">Create a new User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body" class="row" id="createModal">
                     <div class="wrapper">
                        <div class="zoom-effect-container col-6">
                              <div class="image-card"  id="registerUser">
                              <div class="texto row">
                                <h2 class="col-12 text-center">Regular User</h2>
                                <p class="col-12 text-center">create an user profile and join the events</p>
                                <button  class="btn btn-success-warning bg-warning mt-5"> <a class="btn btn-link text-black" href="{{ route('registerStore') }}">Register</a></button>
                                </div>
                                <img src="{{asset('img/userRegister.jpg')}}" alt="">
                              </div>
                        </div>
                        <div class="zoom-effect-container col-6">
                              <div class="image-card" id="registerArtist">
                                <div class="texto row">
                                <h2 class="col-12 text-center">Be an artist</h2>
                                <p class="col-12 text-center">Create your artist profile and publish your own events</p>
                                <button class="btn btn-success-warning bg-warning mt-5"><a class="btn btn-link" href="{{ route('registerArtistView') }}">Become an Artist</a></button>
                                </div>
                            <img src="{{asset('img/artistRegister.jpg')}}" alt="">
                              </div>
                      </div>
                  
                      </div>
                      </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">Back to Login</button>
                        </div>
                
              </div>
            </div>
        </div>
    

    <div id="eventInfo" class="row"> 
        <div class="col-12">
            <h1>{{$event->name}}
        -
            <span class="text-warning">{{$event->type}}</span></h1>
        </div>
    
        <div class="row">
            <div class="col-6">
                <img src="{{ $event->image }}">
            </div>

            <div class="col-6 mt-3">

                <p>Language:
                @if($event->language == NULL)
                <span>Undefined</span> 
                @endif
                <span>{{ $event->language }}</span></p>

                <p>Town:    
                <span>{{$event->townName}}</span></p> 

                <p>Date:    
                <span>{{$event->date}}</span></p> 
            
                
                <p>Time:    
                <span>{{$event->hour}}</span></p> 

                <p>Price:    
                <span>{{$event->price}}</span></p> 

                <p>Place:    
                <span>{{$event->place}}</span></p>

                
                <div id="mapid" style="width: 300px; height: 300px; background-color:white;">
                <input type="hidden" value="{{$event->lat}}" id="lat"/>
                <input type="hidden" value="{{ $event->log }}" id="log"/>
                </div>
                <br>
                
               
               
                
                <button class="btn btn-warning">  
                <a href="{{$event->url}}">Oficial Website</a></button> 
            
            </div>
  
        </div>
    </div>
    <script>
       
        
        let lat = document.getElementById("lat").value; 
        let log = document.getElementById("log").value;
        

        
    var mymap = L.map('mapid').setView([lat,log], 12);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(mymap);
L.marker([lat,log]).addTo(mymap) 
    .bindPopup("<b>Here is going to celebrate the event</b>").openPopup();

var popup = L.popup();
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
}
mymap.on('click', onMapClick);
</script>
@endsection