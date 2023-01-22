<aside class="profile-view">
    <div class="modal-header">
        <h3>Detalhes</h3>

        <button 
            class="button-close"
            aria-label="Botão para fechar o modal de detalhes do perfil"
            id="close-modal">
                <i class="fa-regular fa-circle-xmark"></i>
        </button>
    </div>

    <div class="informations">
        <div class="icon">
            <i class="fa-solid fa-user-doctor"></i>
        </div>

        <div class="row">
            <div class="col">
                <p class="label">Nome:</p>
                <p class="value">{{ $doctor->name }}</p>
            </div>

            <div class="col">
                <p class="label">Status:</p>
                @if (!$doctor->deleted_at)
                <p class="value">
                    <i class="fa-regular fa-circle-check"></i> Ativo
                </p>
                @else
                <p class="value desabled">
                    <i class="fa-solid fa-lock"></i> Desativado
                </p>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p class="label">Telefone:</p>
                <p class="value">{{ $doctor->phoneNumber }}</p>
            </div>

            <div class="col"></div>
        </div>

        <div class="row">
            <div class="col">
                <p class="label">Sexo:</p>
                <p class="value">{{ $doctor->getGenre->genre }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p class="label">Cidade/Estado:</p>
                <p class="value">{{ $doctor->city }} - {{ $doctor->uf }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p class="label">Área de atuação:</p>
                <p class="value">{{ $doctor->getArea->area }}</p>
            </div>
        </div>

        <div class="row right">
            <div>
                <a href="{{ route('app.edit-doctor', $doctor->id) }}" class="link-edit">Editar</a>
            </div>

            @if ($doctor->deleted_at)
            <form action="{{ route('app.active-doctor') }}" method="POST">
                @method('put')
            @else
            <form action="{{ route('app.delete-doctor') }}" method="POST">
                @method('DELETE')
            @endif

                @csrf
                <input type="hidden" name="id" value="{{ $doctor->id }}">

            @if ($doctor->deleted_at)
                <button 
                    class="desable-profile green" 
                    aria-label="Botão para ativar perfil">
                        <i class="fa-solid fa-lock-open"></i> ativar
                </button>
            @else
                <button 
                    class="desable-profile red" 
                    aria-label="Botão para desativar perfil">
                        <i class="fa-solid fa-lock"></i> desativar
                </button>
            @endif
                
            </form>
        </div>
    </div>
</aside>