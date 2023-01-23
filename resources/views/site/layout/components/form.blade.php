<form action="index.html" method="POST">
    <div class="row">
        <div class="col">
            <input type="text" placeholder="Nome de usuario" class="input" />
            <p class="error">Mensagem de erro</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="email" placeholder="Email" class="input" />
            <p class="error">Mensagem de erro</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <select name="sexo" class="input">
                <option selected value="">Sexo</option>
            </select>
            <p class="error">O campo é obrigatório</p>
        </div>

        <div class="col">
            <select name="sexo" class="input">
                <option selected value="">Selecione o medico</option>

                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
            <p class="error">O campo é obrigatório</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <textarea name="message" class="input textarea">Messagem adicional</textarea>
            <p class="error">O campo é obrigatório</p>
        </div>
    </div>

    <div class="align-button">
        <button type="submit" class="form-button">
            Cadastrar
        </button>
    </div>
</form>