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

            <form action="{{ route($doctor->deleted_at ? 'app.active-doctor' : 'app.delete-doctor') }}" method="POST">
                @csrf
                @method($doctor->deleted_at ? 'put' : 'delete')

                <input type="hidden" name="id" value="{{ $doctor->id }}">

                <button 
                    class="desable-profile {{ $doctor->deleted_at ? 'green' : 'red' }}" 
                    aria-label="Botão para {{$doctor->deleted_at ? 'ativar' : 'desativar' }} perfil">
                        <i class="fa-solid fa-lock{{ $doctor->deleted_at ? '-open' : '' }}"></i> {{$doctor->deleted_at ? 'ativar' : 'desativar' }}
                </button>
            </form>
        </div>
    </div>
</aside>