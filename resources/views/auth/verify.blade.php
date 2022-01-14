
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un mensaje a su correo electrónico para completar la verificación') }}
                        </div>
                    @endif

                    {{ __('Por favor, revise su correo electronico. ') }}
                    {{ __('Reenviar el mensaje de verificación') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Reenviar el mensaje de verificación') }}</button>.
                    </form>
                </div>

                <div class="card-body">

                    <h4>Bienvenido . {{ auth()->user()->name }} </h4>
                </div>
                @if(auth()->user()->role == 1)
                    <p>Admin</p>
                @endif
                <a href="{{ url('/logout') }}"> logout </a>

                @if (session('status'))
                    <p> {{ session('status') }}</p>
                @endif

                
            </div>
        </div>
    </div>
</div>

