@extends('dashboard.admin')

@section('content')

<div class="h-98 bwe mb-30">Hello Admin!</div>

<div class="data-dashboard">


    <div class='data-count-dashboard'>
        <div>{{$teachers}}</div>
        <section>Data Guru</section>
    </div>

    <div class='data-count-dashboard'>
        <div>{{$blogs}}</div>
        <section>Data Blog</section>
    </div>
 
</div>
{{-- <div id="chart"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: { type: 'line', height: 350 },
        series: [{ name: 'Sales', data: [10, 20, 30] }],
        xaxis: { categories: ['Jan', 'Feb', 'Mar'] }
    };
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script> --}}

@endsection
