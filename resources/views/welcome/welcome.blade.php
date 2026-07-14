@extends('frontend.includes.main')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v10.1.0/ol.css">
    <script src="https://cdn.jsdelivr.net/npm/ol@v10.1.0/dist/ol.js"></script>
@endsection
@section('content')
    @include('welcome.partials.hero')
    <div class="container">
        @include('welcome.partials.trainings')
        @include('welcome.partials.charts-dashboard')
        @include('welcome.partials.success-stories')
        @include('welcome.partials.notices')
        @include('welcome.partials.gallery')
        @include('welcome.partials.testimonials')
        @include('welcome.partials.events-calendar')
        @include('welcome.partials.downloads')

        <div class="row g-2 my-2">
            @include('welcome.partials.ward-map')
            @include('welcome.partials.ward-table')
        </div>
        
    </div>
@endsection
@section('scripts')
    <script>
        window.wardGenderData = {};

        @foreach ($wards as $ward)
            window.wardGenderData["{{ $ward->id }}"] = {
                male_count: {{ $ward->male_count }},
                female_count: {{ $ward->female_count }},
                total_count: {{ $ward->total_count }}
            };
        @endforeach
    </script>
    <script src="{{ asset('dist/map/map.js') }}"></script>
    <script>
        initiateMap('{{ asset('dist/map/map.geojson') }}')
    </script>
@endsection
