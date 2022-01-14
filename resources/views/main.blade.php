
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>New Age - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('/css/styles.css')}}" rel="stylesheet" />
        <!-- CSS edited-->
        <link href="{{asset('/css/estilo.css')}}" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('/js/jquery-3.6.0.js')}}"></script>
        <script src="{{asset('/js/scripts.js')}}"></script>
        <script src="{{asset('/js/js.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

             <!--===============================================================================================-->


   <!-- Google fonts-->

   <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    </head>
<body id="page-top">


      <!-- Navigation-->

      @section('navbar')
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{asset('/img/logo.png')}}" alt="..." /></a>
            <a id="agenda" href="">Agenda.eus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">{{trans('messages.concert')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">{{trans('messages.theater')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">{{trans('messages.dance')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">{{trans('messages.all')}}</a></li>
                   
                </ul>

                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @if(auth()->user()== null)
                  <li class="nav-item"><button class="btn btn-success-warning bg-warning" data-bs-toggle="modal" data-bs-target="#loginModal" href="#services">{{trans('messages.login')}}</button></li>
                @elseif(auth()->user()!= null)
                <li class="nav-item"><button class="btn btn-success-warning bg-warning" href="{{ url('/logout') }}"><a id="logoutLink" href="{{ url('/logout') }}"> Logout </a></button></li>
                @endif
                @if (session('status'))
                    <p> {{ session('status') }}</p>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ url('lang', ['eu'])}}">EU</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('lang', ['en']) }}">EN</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @show
    @section('code')
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
                                <button  class="btn btn-success-warning bg-warning mt-5"> <a class="btn btn-link text-black" href="{{ route('register') }}">Register</a></button>
                                </div>
                                <img src="{{asset('img/userRegister.jpg')}}" alt="">
                              </div>
                        </div>
                        <div class="zoom-effect-container col-6">
                              <div class="image-card" id="registerArtist">
                                <div class="texto row">
                                <h2 class="col-12 text-center">Be an artist</h2>
                                <p class="col-12 text-center">Create your artist profile and publish your own events</p>
                                <button class="btn btn-success-warning bg-warning mt-5" type="submit"><a class="btn btn-link" href="{{ route('registerArtistView') }}">Become an Artist</a></button>
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
    

            <!-- Masthead-->
            <header class="masthead">
                <div class="container">
                    <div class="masthead-subheading">{{trans('messages.welcome')}}</div>
                    <div class="masthead-heading text-uppercase">{{trans('messages.welcomeText1')}}<br>{{trans('messages.welcomeText2')}}</div>
                    <a class="btn btn-primary btn-xl text-uppercase text-black" href="#services">{{trans('messages.seeAgenda')}}</a>
                </div>
            </header>

              <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="fs-1 text-black mb-4"><h1 id="bannerTit1">Are you an artist? </h1><br><h2 id="bannerTit2">You can create your own event!</h2></div>
                        <a href="{{route('createEvent')}}" class="btn bat-success-warning bg-warning">Create an Event</a>
                    </div>
                </div>
            </div>
        </aside>

        <!--Main Events-->
        <div class="text-center">
                    <h2 class="section-heading text-uppercase">Main events</h2>
              
        </div>
        <div class="row d-flex flex-xl-row flex-lg-row flex-md-row flex-sm-column justify-content-around">
            <div class="col-md-6 col-xl-3 mb-5 d-flex justify-content-center">
                <div class="card " style="width: 18rem;">
                    <img src="{{asset('/img/Ura.png')}}" class="card-img-top" id="cardImg">
                    <div class="card-body">
                      <h5 class="card-title text-center">Ura bere bidean</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a class="btn btn-dark">More info</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-5 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('/img/titiri.png')}}" class="card-img-top" id="cardImg">
                    <div class="card-body">
                      <h5 class="card-title text-center">Titirijai</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a class="btn btn-dark">More info</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-5 d-flex justify-content-center">
                <div class="card" style="width: 18rem; ">
                    <img src="{{asset('/img/HTX.png')}}" class="card-img-top" id="cardImg">
                    <div class="card-body">
                      <h5 class="card-title text-center">HTXRock</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a class="btn btn-dark">More info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-5 d-flex justify-content-center">
              <div class="card" style="width: 18rem; ">
                  <img src="{{asset('/img/liher.jfif')}}" class="card-img-top" id="cardImg">
                  <div class="card-body">
                    <h5 class="card-title text-center">FestiRock</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a class="btn btn-dark">More info</a>
                  </div>
              </div>
          </div>
        </div>

          <!-- bands-->
          <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">new bands in Agenda</h2>
                    <h3 class="section-subheading text-muted">the latests bands and groups that join Agenda</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Diana Petersen</h4>
                            <p class="text-muted">Lead Marketer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>

        <!--AGENDA FILTER-->

        <div class="container-fluid d-flex flex-column p-4">
          <nav class="navbar sticky-top navbar-light">
              <div id="filtro">
      
  
      
                <h6>Advanced Search</h6>
               
              <table>
                <tr>
              <td>
                <label for="type">Event type</label>
              </td>
              <td>
                <select name="" id="">
                  <option value="">Concert</option>
                  <option value="">Theater</option>
                  <option value="">Dance Session</option>
                  <option value="">All</option>
                </select>
              </td>
              <td>
                <label for="provincias">Province:</label>
              </td>
              <td>
                <select name="provincias" id="provincias">
                  <option class="provincias" value="1">Araba</option>
                  <option  class="provincias" value="48">Bizkaia</option>
                  <option  class="provincias" value="20">Gipuzkoa</option>
                  <option  class="provincias" value="31">Nafarroa</option>
                </select>  
              </td>
              <td>
                <label for="town">Municipy:</label>
            </td>
            <td>
              <select name="town" id="town">  
              </select>
            </td>
          </tr>
           <!--2.ROW-->
          <tr>
            <td>
              <form action="d-flex" id="dates">
              <label for="startDate">From date:</label>
            </td>
            <td> 
              <input type="date" id="startDate" name="startDate">
              </td>
              <td>
                <label for="finishDate">To date:</label></td>
              </td>
              <td>
                <input type="date" id="finishDate" name="finishDate"></form>
              </td>
              <td>
                <label for="search">or search here:</label></td>
               
              
              </td>
            <td>
              <input  name="search" type="search"placeholder="Search" aria-label="Search">        
            </td>
          </tr>
   
          </table>
          <button id="search" class="btn btn-outline-warning" type="submit">Apply Filter or Search</button>
        </div>
        </nav>
      </div>

        <!--Current Events-->
    



        <div id="daily" class="container px-4 px-lg-5 py-1 my-3 d-flex flex-column">
          <div class="text-center">
              <h2 class="section-heading text-uppercase">Current Events</h2>    
          </div>

            <div class="row d-flex">
                @forelse($eventList as $event)
                <article class="mt-4 col-12 col-sm-6" >
                  <div class="card mb-3" style="max-width: 540px; max-height:200px; background-color:black; border:solid white 1px">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{$event->image}}" class="img-fluid rounded-start" alt="..." style="height: 195px;">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">      
                    {{$event->name}}   
                          </h5>
                          <div>
                          <p class="card-text"  style="color:white">{{$event->type}}<span>-</span>
                          {{$event->language}}</p>
                          </div>
                          <div  id="currentEvents">
                            <p class="card-text">{{$event->townName}}<span>-</span>{{$event->hour}}</p>
                            <p class="card-text"><small class="text-muted">{{$event->date}}</small><form action="{{ route('event.show.user',$event->id)}}" method="get">
                            @csrf<button id="moreInfo" type="submit" class="btn btn-success-warning bg-warning">Info +</button></form></p>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
                 @empty
                @endforelse
              
               
            </div>
      </div>

      
         
          
           
     


  


  
              <!-- Footer-->
              <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
     @endsection

</body>
</html>
    
       

