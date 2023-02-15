<nav class="menu">
    <button 
        class="button-close" 
        aria-label="Botão para fechar o menu">
            <i class="fa-regular fa-circle-xmark"></i>
    </button>

    <ul class="list">
        <li class="menu-item">
            <a 
                href="{{ route('app.home') }}" 
                class="menu-item-link {{ !strcmp(Route::current()->getName(), 'app.home') ? 'activate' : ''  }}">
                    <i class="fa-solid fa-house"></i>
                    <p class="hidden">Home</p>
            </a>
        </li>

        <li class="menu-item">
            <a 
                href="{{ route('app.agenda') }}" 
                class="menu-item-link {{ !strcmp(Route::current()->getName(), 'app.agenda') ? 'activate' : ''  }}">
                    <i class="fa-solid fa-clipboard"></i>
                    <p class="hidden">Agenda</p>
            </a>
        </li>

        <li class="menu-item">
            <a 
                href="{{ route('app.register-doctor') }}" 
                class="menu-item-link {{ !strcmp(Route::current()->getName(), 'app.register-doctor') ? 'activate' : ''  }}">
                    <i class="fa-solid fa-user-nurse"></i>
                    <p class="hidden">Cadastrar medico</p>
            </a>
        </li>

        <li class="menu-item">
            <a 
                href="{{ route('app.doctors') }}" 
                class="menu-item-link {{ !strcmp(Route::current()->getName(), 'app.doctors') ? 'activate' : ''  }}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <p class="hidden">Medicos</p>
            </a>
        </li>
    </ul>

    <div>
        <a href="{{ route('site.logout') }}" class="menu-item-link exit-button">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <p class="hidden">Sair</p>
        </a>
    </div>
</nav>