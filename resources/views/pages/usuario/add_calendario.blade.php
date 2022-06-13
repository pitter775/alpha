<!-- Calendar -->
<div class="divcalend">
    <div class="card shadow-none ">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>
<!-- /Calendar -->

<?php

// dd($presenca);
?>


<script>
    function addCalendar() {
        // Do this instead
        setTimeout(function() {
            var calendarEl = document.getElementById('calendar');
            var color = '#a6ff94';
            // Calendar plugins
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                buttonText: {
                    today: "Hoje",
                    month: "Mês",
                    week: "Semana",
                    day: "Dia"
                },
                events: [
                    // $value->pres_tipo
                    @foreach ($presenca as $value)
                        @if ($value->pres_tipo == 1)
                            {
                            "title": "",
                            "start": "{{ $value->pres_datanaw }}",
                            "end": "{{ $value->pres_datanaw }}",
                            "display": "background",
                            "color": "#a6ff94"
                            },
                        @endif
                        @if ($value->pres_tipo == 2)
                            {
                            "title": "",
                            "start": "{{ $value->pres_datanaw }}",
                            "end": "{{ $value->pres_datanaw }}",
                            "display": "background",
                            "color": "#ff9494"
                            },
                        @endif
                    @endforeach
                ],

                editable: false,
                eventResizableFromStart: true,

                direction: direction,
                initialDate: new Date()

            });

            // Render calendar
            calendar.render();
        }, 500);

    }
</script>
