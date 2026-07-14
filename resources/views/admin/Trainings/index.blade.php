@extends('admin.includes.main')

@section('head')
    @include('admin.includes.datatables-css')
    <style>
        input[type="time"]::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        }

        input[type="time"] {
            background-color: transparent;
            border: 0;
        }

        .premium-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .premium-table thead {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .premium-table thead th {
            border: none;
            padding: 16px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .premium-table tbody tr {
            transition: all 0.3s ease;
        }

        .premium-table tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .premium-table tbody td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .search-box {
            position: relative;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .search-box input {
            border: none;
            padding: 12px 20px 12px 45px;
            border-radius: 25px;
            width: 100%;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
        }

        .filter-card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .filter-card .card-header {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 12px 12px 0 0;
            border-bottom: 1;
        }

        .btn-premium {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
    <div class="page-header mb-4" data-aos="fade-down">
        <h3 class="mb-3 fw-bold">
            <i class="fas fa-chalkboard-teacher text-primary me-2"></i>
            तालीमको सूची
        </h3>
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
                <a href="#">तालीम</a>
            </li>
        </ul>
    </div>

    <!-- Search and Filter -->
    <div class="card filter-card mb-4" data-aos="fade-up">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-filter text-primary me-2"></i>
                    खोज र फिल्टर
                </h5>
                <button class="btn btn-link p-0 text-primary" id="filterToggle">
                    <i class="fa fa-chevron-down"></i>
                </button>
            </div>
        </div>
        <div id="filterForm" class="collapse card-body">
            <form method="GET" id="filterData" action="{{ route('admin.training.index') }}">
                <div class="row g-3">
                    <div class="form-group col-md-3 col-12">
                        <label class="small text-muted mb-1">तालीमको नाम</label>
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" name="name_np" placeholder="तालीम खोज्नुहोस्..."
                                value="{{ request('name_np') }}" id="instantSearch">
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label class="small text-muted mb-1">क्याटेगोरी</label>
                        <select name="category" class="form-select">
                            <option value="">क्याटेगोरी छान्नुहोस्</option>
                            @foreach (\App\Models\Category::select('id','name_np')->get() as $data)
                                <option value="{{ $data->id }}"
                                    {{ request('category') == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_np }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label class="small text-muted mb-1">मिति देखि</label>
                        <input type="text" name="entry_date" class="form-control nepali-datepicker" placeholder="मिति देखि"
                            value="{{ request('entry_date') }}">
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label class="small text-muted mb-1">मिति सम्म</label>
                        <input type="text" id="nepali-date-picker" name="end_date" class="form-control nepali-datepicker"
                            placeholder="मिति सम्म" value="{{ request('end_date') }}">
                    </div>
                    <div class="form-group col-md-2 col-12 d-flex align-items-end">
                        <div class="d-flex gap-2 w-100">
                            <button type="submit" class="btn btn-premium btn-success flex-grow-1">
                                <i class="fas fa-search me-1"></i> खोज्नुहोस्
                            </button>
                            <a href="{{ route('admin.training.index') }}" class="btn btn-premium btn-secondary">
                                <i class="fas fa-undo"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="row" data-aos="fade-up">
        <div class="col-md-12">
            <div class="card filter-card">
                @can('manage_training')
                    <div class="card-header">
                        <a href="{{ route('admin.training.create') }}" class="btn btn-premium btn-primary">
                            <i class="fa fa-plus me-1"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                @endcan
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="fixed-header-datatable" class="table table-striped premium-table">
                            <thead>
                                <tr>
                                    <th>क्र.सं.</th>
                                    <th>तालीम नाम</th>
                                    <th>कोटा</th>
                                    <th>तालिम सुरु हुने मिति</th>
                                    <th>तालिम सुरु हुने समय</th>
                                    @hasanyrole('super-admin|admin|trainer')
                                        <th>स्थिती</th>
                                    @endhasanyrole
                                    <th>क्रियाकलाप</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td><strong>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</strong></td>
                                        <td>
                                            <div class="fw-bold">{{ $data->name_np ?? '' }}</div>
                                            <small class="text-muted">{{ $data->name_eng ?? '' }}</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $data->available_seats ?? 0 }}</span>
                                        </td>
                                        <td>{{ $data->start_miti_bs ?? '' }}</td>
                                        <td><input type="time" value="{{ $data->start_samaya ?? '' }}" class="form-control form-control-sm" style="width: 100px;"></td>
                                        @hasanyrole('super-admin|admin|trainer')
                                            <td>
                                                <span class="status-badge 
                                                    {{ $data->status == 'active' ? 'bg-success' : '' }} 
                                                    {{ $data->status == 'completed' ? 'bg-primary' : '' }} 
                                                    {{ $data->status == 'dismissed' ? 'bg-danger' : '' }} 
                                                    {{ $data->status == 'upcoming' ? 'bg-info' : '' }}">
                                                    {{ __('messages.'.$data->status) }}
                                                </span>
                                            </td>
                                        @endhasanyrole
                                        <td>
                                            <div class="d-flex gap-1">
                                                @can('manage_training')
                                                    <a href="{{ route('admin.training.show', $data->id) }}"
                                                        class="action-btn btn-info text-white" title="हेर्नुहोस्">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.training.edit', $data->id) }}"
                                                        class="action-btn btn-primary text-white" title="सम्पादन गर्नुहोस्">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="action-btn btn-danger text-white deleteBtn"
                                                        data-route="{{ route('admin.training.destroy', $data->id) }}" title="मेटाउनुहोस्">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endcan
                                                @role('trainee')
                                                    @can('apply_training')
                                                        @php
                                                            $applicationCount = \App\Models\TrainingApplication::where('training_id', $data->id)->count();
                                                        @endphp
                                                        @if (!auth()->user()->hasAppliedToTraining($data->id) && $applicationCount < $data->available_seats)
                                                            <a href="{{ route('admin.application.create', $data->id) }}" class="btn btn-premium btn-primary btn-sm">
                                                                <i class="fas fa-reply me-1"></i> आवेदन दिनुहोस्
                                                            </a>
                                                        @elseif (auth()->user()->hasAppliedToTraining($data->id))
                                                            <button type="button" class="btn btn-premium btn-warning btn-sm">आवेदन दिइसक्नुभएको छ</button>
                                                        @elseif ($applicationCount >= $data->available_seats)
                                                            <button type="button" class="btn btn-premium btn-danger btn-sm">सीट सकिएको छ</button>
                                                        @endif
                                                    @endcan
                                                @endrole
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('shared.Training.broadcast-modal')
@endsection

@section('scripts')
    @include('admin.includes.datatables-scripts')
    @include('admin.includes.sweet-alert-script')
    <script>
        $(document).ready(function() {
            $('#filterToggle').on('click', function() {
                $('#filterForm').slideToggle(300);
                $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
            });

            // Instant search
            $('#instantSearch').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
