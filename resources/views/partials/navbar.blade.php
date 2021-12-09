<nav class="navbar navbar-expand-lg navbar-dark gradient">
  <div class="container">
    <a class="navbar-brand" href="/"><i class="fas fa-camera"></i><span class="ms-2 text-pacifico">Album</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <a class="nav-link" href="/"><i class="fas fa-home me-1"></i>Início</a>
      </li>
      @auth
      <li class="nav-item">
        <a class="nav-link" href="/photos"><i class="far fa-images me-1"></i>Minhas imagens</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/photos/new"><i class="fas fa-plus-circle me-1"></i>Nova imagem</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
          <li><a class="dropdown-item" href="/user/profile"><i class="fas fa-user me-1"></i>Perfil</a></li>
          <li>
            <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt me-1"></i>Sair</button>
            </form>
          </li>
        </ul>
      </li>
      @endauth
      @guest
      <li class="nav-item">
        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt me-1"></i>Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register"><i class="fas fa-user-plus me-1"></i>Criar uma conta</a>
      </li>
      @endguest
      </ul>
    </div>
  </div>
</nav>