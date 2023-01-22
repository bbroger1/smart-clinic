<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>telefone</th>
            <th>actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($doctors as $doctor)
        <tr>
            <td>{{ $doctor->id }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->phoneNumber }}</td>
            <td>
                <div class="actions-buttons">
                    <button 
                        class="button green" 
                        aria-label="Botão para ver detalhes"
                        onclick="handleViewProfile({{ $doctor->id }})">
                            <i class="fa-solid fa-eye"></i>
                    </button>
            
                    @if ($doctor->deleted_at)
                    <form action="{{ route('app.active-doctor') }}" method="POST">
                        @method('put')
                    @else
                    <form action="{{ route('app.delete-doctor') }}" method="POST">
                        @method('DELETE')
                    @endif
                            @csrf
                            <input type="hidden" value="{{ $doctor->id }}" name="id" />
        
                    @if ($doctor->deleted_at)
                        <button 
                            type="submit"
                            class="button red" 
                            aria-label="Botão para desativar perfil">
                                <i class="fa-solid fa-lock"></i>
                        </button>
                    @else
                        <button 
                            type="submit"
                            class="button green" 
                            aria-label="Botão para ativar perfil">
                                <i class="fa-solid fa-lock-open"></i>
                        </button>
                    @endif
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
