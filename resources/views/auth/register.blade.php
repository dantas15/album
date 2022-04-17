@extends('/layouts/main')

@section('content')
<div class="container-fluid h-100">
    <div class="row h-100 justify-content-md-center">
        <!-- Coluna de imagem -->
        <div class="col-7 d-flex align-items-center login-cover">
            <div class="jumbotron bg-transparent text-center text-white">
                <div class="container">
                    <i class="display-3 fas fa-camera"></i>
                    <h1 class="display-3 text-pacifico">Album de fotos</h1>
                    <br>
                    <p class="lead">Something short and leading about the collection below—its contents, the creator,
                        etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                    <br>
                </div>
            </div>
        </div>
        <!-- Coluna de login -->
        <div class="col-12 col-lg-8 col-xl-5 align-self-center p-5">
            <h1 class="display-3 text-pacifico  text-center">Bem Vindo!</h1>
            <br>
            <p class="text-center">Utilze o seu e-mail e senha para acessar o painel administrativo</p>
            <form class="text-left" method="POST" action="{{ route('register') }}">
            @csrf
                <!--Nome -->
                <div class="form-group">
                    <x-jet-label value="Nome" />
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="far fa-user"></i>
                        </div>
                        <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name"
                            placeholder="Digite o seu nome" />
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>
                </div>
                <!-- e-mail -->
                <div class="form-group mt-3 ">
                    <x-jet-label value="E-mail" />
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="far fa-envelope"></i>
                        </div>
                        <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="email"
                            placeholder="Digite o seu e-mail" />
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>
                </div>
                <!-- Senha -->
                <div class="form-group mt-3">
                    <x-jet-label value="Senha" />
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                       <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                        name="password" required placeholder="Digite sua senha aqui"/>
                    <x-jet-input-error for="password"></x-jet-input-error>
                    </div>
                </div>
                <!-- Confirmação de Senha -->
                <div class="form-group mt-3">
                    <x-jet-label value="Confirme sua senha" />
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-key"></i>
                        </div>
                        <x-jet-input class="form-control" type="password" name="password_confirmation" required
                        placeholder="Digite sua senha aqui" />
                    </div>
                </div>

                <p class="text-center mt-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block ms-3">Cadastrar</button>
                </p>
            </form>
            <hr>
            <br>
            <p class="text-center">Já possui uma conta? <a href={{route('login')}}>FAÇA LOGIN AQUI</a></p>
        </div>
    </div><!-- row-->
</div><!-- container -->
@endsection