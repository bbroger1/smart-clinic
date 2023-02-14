<div class="query-area">
    @foreach ($query as $key => $data)
        <div class="query">
            <div class="icon-query confirm">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <div class="data-container">
                <h3 class="patiente">{{ $data->name }}</h3>

                <div class="query-data">
                    <p class="query-title">{{ $data->getDoctor->name }}</p>
                    <p class="query-title">{{ $data->time }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>