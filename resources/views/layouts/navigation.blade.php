

<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a class="dropdown-item" > <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link></a>
                
                <a href="#" class="dropdown-item"><form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form></a>
            </div>
        </div>
    </div>
</nav>



<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <br><br><br>
        <a href="/dashboard" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
    
        <div class="navbar-nav w-100">
            <a href="/dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Gestion Ecole</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Listes</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="/liste-etudiant" class="dropdown-item">Etudiant</a>
                    <a href="/liste-formation" class="dropdown-item">Formation</a>
                    <a href="/liste-cours" class="dropdown-item">Cours</a>
                </div>
            </div>
          
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Formulaires</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="/formulaire-etudiant" class="dropdown-item">Etudiant</a>
                    <a href="/formulaire-formation" class="dropdown-item">Formation</a>
                    <a href="/formulaire-cours" class="dropdown-item">Cours</a>
                    
                </div>
            </div>
        </div>
    </nav>
</div>


<!-- Sidebar End -->

