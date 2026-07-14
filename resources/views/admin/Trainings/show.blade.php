@extends('admin.includes.main')
@section('head')
    <style>
        iframe {
            border: 0;
            width: 100%;
            height: 50vh;
        }

        input[type="time"] {
            border: none;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;

            background: transparent;
            font-size: 16px;
            color: #333;
            padding: 0px 5px;
        }

        input[type="time"]::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        }
    </style>
@endsection
@section('content')
    <div class="page-header">
        <div class="mb-3">
            <h3 class="fw-bold">तालीम विवरण</h3>
        </div>
        <ul class="mb-3 breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.training.index') }}">तालीम सूची</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">तालीम विवरण</a>
            </li>
        </ul>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-4">
                <div class="d-flex align-items-center gap-4">
                    <img src="{{ asset('dist/img/training.png') }}" alt="Training" width="60" />
                    <div>
                        <h4 class="mb-1 fw-bold text-primary">{{ $training->name_np }}</h4>
                        @if (isset($training->trainer_name_np))
                            
                        <small class="text-muted fw-bold"><i class="fa fa-user"></i>
                            {{ $training->trainer_name_np ?? '' }}</small>
                        @endif
                    </div>
                </div>
            </div>

            @include('shared.Training.show')
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="fw-bold">प्रशिक्षण कार्यहरू</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-sm-12 col-md-4">
                    <a href="{{ route('admin.attendance.index', $training->id) }}"
                        class="w-100 btn btn-primary fw-bold py-2"><i class="fa fa-user-check me-2"></i> हाजिरी लिनुहोस्</a>
                </div>
                <div class="col-sm-12 col-md-4">
                    <a href="{{ route('admin.certifications.index',$training->id) }}" class="w-100 btn btn-primary fw-bold py-2"><i class="fa fa-id-card me-2"></i>
                        प्रमाणपत्र वितरण गर्नुहोस्</a>
                </div>
                <div class="col-sm-12 col-md-4">
                    <a target="_blank" href="{{ route('admin.certifications.show',$training->id) }}" class="w-100 btn btn-primary fw-bold py-2"><i class="fa fa-id-card me-2"></i>
                        प्रमाणपत्र मुद्रण गर्नुहोस्</a>
                </div>
            </div>
        </div>
    </div>
@endsection
