@php

$yearMonthDay = explode('-', $amountDate);
$time = mktime(0, 0, 0, $yearMonthDay[1], $yearMonthDay[2], $yearMonthDay[0]);

$monthName = date('F', $time);

$dayWeekNumber = date('N', mktime(0, 0, 0, $yearMonthDay[1], 1, $yearMonthDay[0]));
$daysCount = date('t', $time);

$firstDayDate = date('Y-m-d', mktime(0, 0, 0, $yearMonthDay[1], 1, $yearMonthDay[0]));
$lastDayDate = date('Y-m-d', mktime(0, 0, 0, $yearMonthDay[1], $daysCount + 1, $yearMonthDay[0]));
$day = 1 - $dayWeekNumber;

@endphp

<div class="large-calendar">
    <div class="calendar-header">
        <h3 id="calendar-title">{{ $yearMonthDay[0] }} {{ $monthName }}</h3>

        <div class="row">
            <a 
                href="{{ route($route, array_merge(
                    [ 
                        'year' => $yearMonthDay[1] - 1 == 0 ? $yearMonthDay[0] - 1 : $yearMonthDay[0], 
                        'month' => $yearMonthDay[1] - 1 == 0 ? 12 : $yearMonthDay[1] - 1, 
                        'day' => $yearMonthDay[2],
                    ],
                    $params
                )) }}"
                aria-label="Botão para mudar para proximo mes" 
                class="header-button" 
                id="left">
                    <i class="fa-solid fa-arrow-left"></i>
            </a>

            <a 
                href="{{ route($route, array_merge(
                    [ 
                        'year' => $yearMonthDay[1] + 1 == 13 ? $yearMonthDay[0] + 1 : $yearMonthDay[0], 
                        'month' => $yearMonthDay[1] + 1 == 13 ? 1 : $yearMonthDay[1] + 1, 
                        'day' => $yearMonthDay[2],
                    ],
                    $params
                )) }}"
                aria-label="Botão para mudar para proximo mes" 
                class="header-button" 
                id="right">
                    <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="calendar-body">
        <table class="table" cellspacing="5">
            <thead>
                <tr>
                    <th>DOM</th>
                    <th>SEG</th>
                    <th>TER</th>
                    <th>QUA</th>
                    <th>QUI</th>
                    <th>SEX</th>
                    <th>SAB</th>
                </tr>
            </thead>

            <tbody class="table-body">
                
                @for ($week = 0; $week < 6; $week++)
                    <tr>
                        @for ($j = 0; $j < 7; $j++)
                            <td>
                                @php( $date = date('Y-m-d', mktime(0, 0, 0, $yearMonthDay[1], $day, $yearMonthDay[0])) )

                                <button 
                                    class="calendar-day 
                                        {{ ($date < $firstDayDate or $date >= $lastDayDate) ? 'gray' : '' }}
                                        {{ $date == $amountDate ? 'activate-day' : '' }}">
                                        {{ date('d', mktime(0, 0, 0, $yearMonthDay[1], $day, $yearMonthDay[0])) }}
                                </button>
                                
                            @php($day++)
                            </td>
                        @endfor
                    </tr>
                @endfor

            </tbody>
        </table>
    </div>
</div>