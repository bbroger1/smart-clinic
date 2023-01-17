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
            
                    <form 
                        action="{{ route($doctor->deleted_at ? 'app.delete-doctor' : 'app.active-doctor') }}" 
                        method="POST">
                            @csrf
                            @method($doctor->deleted_at ? 'PUT' : 'delete')
                            
                            <input type="hidden" value="{{ $doctor->id }}" name="id" />
        
                            <button 
                                type="submit"
                                class="button {{ $doctor->deleted_at ? 'red' : 'green' }}" 
                                aria-label="Botão para {{$doctor->deleted_at ? 'desativar' : 'ativar'}} perfil">
                                    <i class="fa-solid fa-lock{{ $doctor->deleted_at ? '' : '-open' }}"></i>
                            </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
