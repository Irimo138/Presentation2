<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>New Age - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
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
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="{{ asset('/js/validationArtistRegister.js') }}" defer></script>
             
             
    </head>

<body>

 <!-- Navigation-->


      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="registerNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{asset('/img/logo.png')}}" alt="..." /></a>
            <h3 id="userFormTitle" class="col-6 text-white">create a new artist</h3>
            <a id="agenda" href="{{ route('index') }}">Agenda.eus</a>
        </div>
    </nav>


<!-- if validation in the controller fails, show the errors -->
@if ($errors->any())
   <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
     @endforeach
     </ul>
   </div>
@endif

<div>
   
<div class="row d-flex">
<div id="userForm" class="col-8">

    <form class="row p-4" action="/register" method="post" enctype="multipart/form-data">
            
            @csrf
    <div class="col-6">
        <h4>Personal information</h4>
             <div class="form-group">
                    <div class="wrap-input3 validate-input" data-validate="Name is required">
						<input class="input3" type="text" name="name" placeholder="Your Name" required>
						<span class="focus-input3"></span>
                  </div>  
             </div>

        <div class="form-group">
            <div class="wrap-input3 validate-input" data-validate="Surname is required">
                <input  class="input3" type="text" name="surName"   placeholder="Your surname" required>
                <span class="focus-input3"></span>
            </div>
        </div> 
        
        <div class="form-group">
            <div class="wrap-input3 validate-input" data-validate="Phone is required">
                <input type="text" class="input3"  placeholder="Phone number" name="phone" required>
                <span class="focus-input3"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="wrap-input3 validate-input" data-validate="Date of birth is required">
            <label>Date of birth</label>
                <input type="date" class="input3"  placeholder="Date of birth" name="date" required>
                <span class="focus-input3"></span>
            </div>
        </div>
        <div class="form-group">
        <div class="wrap-input3 validate-input" data-validate="Email is required">
                <input type="email" class="input3"  placeholder="Email" name="email" required>
                <span class="focus-input3"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="wrap-input3 validate-input" data-validate="Password is required">
                <input type="password" class="input3" name="password"  placeholder="Password" required>
                <span class="focus-input3"></span>
            </div>
        </div>
        <div class="form-group">
        <div class="wrap-input3 validate-input" data-validate="Password is required">
                <input type="password" class="input3" name="password"  placeholder="Confirm Password" required>
                <span class="focus-input3"></span>
            </div>
        </div>
  
        </div>

        <div class="col-6">

        <h4>Artist information</h4>

        <div class="form-group">
            <div class="wrap-input3 validate-input" data-validate="Artist name is required">
                <input  class="input3" type="text" name="artisticName"   placeholder="Your artist/band group name" required>
                <span class="focus-input3"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="wrap-input3 validate-input">
                <input  class="input3" type="text" name="type"   placeholder="Artist type(rock band or modern dancing for example)" required>
                <span class="focus-input3"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="wrap-input3 validate-input">
                <input  class="input3" type="text" name="link"   placeholder="Artist website or Facebook or...(must be a link)" required>
                <span class="focus-input3"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="wrap-input3 validate-input" data-validate="Photo is required">
                <label>Choose a Photo</label>
                <input type="file" class="input3" name="photo" placeholder="Choose a photo" required>
                <span class="focus-input3"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="wrap-input3 validate-input">
                <input  class="input3" type="text" name="town" placeholder="Artist origin(Town, Country...)" required>
                <span class="focus-input3"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="wrap-input3 validate-input">
                <textarea class="input3" type="textfield" name="description"   placeholder="A short description" cols="30" rows="4"></textarea>
               
                <span class="focus-input3"></span>
            </div>
        </div>

    
        </div>
        <button class="btn btn-success-warning bg-warning col-2 m-3" type="submit">Submit</button>
    </form>

</div>

<div class="col-3 mt-5">
<div class="zoom-effect-container col-6">
                              <div class="image-card"  id="registerUser">
                              <div class="texto row">
                                <h2 class="col-12 text-center">Regular User</h2>
                                <p class="col-12 text-center">create an user profile and join the events</p>
                                <button  class="btn btn-success-warning bg-warning mt-5"> <a class="btn btn-link" href="{{ route('registerStore') }}">Register</a></button>
                                </div>
                                <img src="{{asset('img/userRegister.jpg')}}" alt="">
                              </div>
                        </div>
</div>



</div>
</body>
</html>





