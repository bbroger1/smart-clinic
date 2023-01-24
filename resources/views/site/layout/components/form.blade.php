<form action="{{ route('site.create') }}" method="POST">
    @csrf

    <input type="hidden" name="date" id="date" value="{{ old('date') }}" />

    <div class="row">
        <div class="col">
            <input 
                type="text" 
                name="name" 
                placeholder="Nome de usuario" 
                class="input" 
                value="{{ old('name') }}" />
            
            @error ('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="col">
            <input 
                type="time" 
                name="time" 
                class="input" 
                value="{{ old('time') }}" />
            
            @error ('time')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                class="input"
                value="{{ old('email') }}" />

            @error ('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            <select name="genre" class="input">
                <option value="">Sexo</option>

                @foreach ($genres as $genre)
                    <option 
                        value="{{ $genre->id }}" 
                        {{ old('genre') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->genre }}
                    </option>
                @endforeach
            </select>

            @error ('genre')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="col">
            <select name="doctor" class="input">
                <option value="">Selecione o medico</option>

                @foreach ($doctors as $doctor)
                <option 
                    value="{{ $doctor->id }}"
                    {{ old('doctor') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                </option>
                @endforeach
            </select>
            
            @error ('doctor')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            <textarea name="message" class="input textarea">{{ old('message') ?? 'Messagem adicional' }}</textarea>
            @error ('message')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="align-button">
        <button type="submit" class="form-button">
            Cadastrar
        </button>
    </div>
</form>