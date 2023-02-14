<div class="query-area">
    @foreach ($query as $key => $data)
        <div class="query">
            <div class="icon-query {{ $data->getStatus->title }}">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <div class="data-container">
                <div class="flex">
                    <h3 class="patiente">{{ $data->name }}</h3>

                    @unless ($hidden)
                    <div class="link-action">
                        <a href="{{ route('app.confirm', $data->id) }}" class="btn-link confirm">
                            Confirmar
                        </a>
    
                        <a href="{{ route('app.cancel', $data->id) }}" class="btn-link canceled">
                            Cancelar
                        </a>
                    </div>
                    @endunless
                </div>
                

                <div class="query-data">
                    <p class="query-title">{{ $data->getDoctor->name }}</p>
                    <p class="query-title">{{ $data->time }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>