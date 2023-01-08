<div class="query-area">
    @foreach ($query as $key => $data)
        <div class="query">
            <div class="icon-query {{ $data['status'] }}">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <div class="data-container">
                <h3 class="patiente">{{ $data['user'] }}</h3>

                <div class="query-data">
                    <p class="query-title">{{ $data['doctor'] }}</p>
                    <p class="query-title">{{ $data['hour'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>