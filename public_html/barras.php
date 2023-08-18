<?php
    require_once "./conex_dB.php"
?>


<div id="graf_barras"> </div>

<script>
    var data = [
    {
        x: ['7:00-8:30', '8:30-10:00', '10:00-11:30'],
        y: [20, 14, 23],
        type: 'bar'
    }
    ];
    var layout={
        title:'Num de personas',
        showgrid: false

    }
    
    var config = {
        responsive: true
    }

    Plotly.newPlot('graf_barras', data,layout,config);
</script>
