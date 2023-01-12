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
            <td>{{ $doctor['id'] }}</td>
            <td>{{ $doctor['name'] }}</td>
            <td>{{ $doctor['phoneNumber'] }}</td>
            <td>
                <button 
                    class="button green" 
                    aria-label="Botão para ver detalhes"
                    onclick="handleViewProfile({{ $doctor['id'] }})">
                        <i class="fa-solid fa-eye"></i>
                </button>
        
                <button 
                    class="button red" 
                    aria-label="Botão para desativar perfil">
                        <i class="fa-solid fa-lock"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
