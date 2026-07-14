@extends('frontend.includes.main')

@section('content')
<style>
    .table-responsive-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .description-content table {
        width: 100%;
        max-width: 100%;
        border-collapse: collapse;
        margin-bottom: 1rem;
    }
    
    .description-content table th,
    .description-content table td {
        padding: 0.75rem;
        border: 1px solid #dee2e6;
    }
</style>

<section id="aboutDetail" class="aboutDetail section">
    <div class="container py-4">
        <h1 class="mb-4">{{ $about->title }}</h1>
        <div class="description-content">
            {!! $about->description !!}
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tables = document.querySelectorAll('.description-content table');
        
        tables.forEach(function(table) {
            const wrapper = document.createElement('div');
            wrapper.className = 'table-responsive-wrapper';
            table.parentNode.insertBefore(wrapper, table);
            wrapper.appendChild(table);
        });
    });
</script>
@endsection
