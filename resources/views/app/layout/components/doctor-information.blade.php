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
                <p class="value">
                    <i class="fa-regular fa-circle-check"></i> Ativo {{-- $doctor->status --}}
                </p>
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
                <p class="value">{{ $doctor->genre }}</p>
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
                <p class="value">{{ $doctor->area }}</p>
            </div>
        </div>

        <div class="row right">
            <button class="desable-profile" aria-label="Botão para desativar perfil">
                <i class="fa-solid fa-lock"></i> Desativar
            </button>
        </div>
    </div>
</aside>