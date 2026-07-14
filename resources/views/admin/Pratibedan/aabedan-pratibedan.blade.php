@extends('admin.includes.main')
@section('content')
    <section class="mb-3">
        <div class="d-flex justify-content-end align-items-center">
            <button class="btn btn-primary" type="button" onclick="printReport()"><i
                    class="fa fa-print"></i>&nbsp;&nbsp;मुद्रण</button>
        </div>
    </section>

     <div class="card my-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">आवेदक खोज्नुहोस्</h5>
                <button class="btn btn-link p-0" id="filterToggle">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div id="filterForm" class="collapse card-body">
            <form method="GET" id="filterData" action="{{ route('admin.aabedan.pratibedan') }}">
                <div class="row g-2">
                    <div class="form-group col-md-3 col-12">
                        <input type="text" name="name_np" class="form-control" placeholder="तालीमको नाम"
                            value="{{ request('name_np') }}">
                    </div>
                    @unlessrole('trainee')
                        <div class="form-group col-md-3 col-12">
                            <input type="text" name="fullname_np" class="form-control" placeholder="आवेदकको नाम"
                                value="{{ request('fullname_np') }}">
                        </div>
                    @endunlessrole
                    <div class="form-group col-md-3 col-12">
                        <input type="text" name="start_miti_bs" placeholder="YYYY-MM-DD"
                            class="form-control nepali-datepicker" value="{{ request('start_miti_bs') }}">
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <input type="text" name="end_miti_bs" placeholder="YYYY-MM-DD"
                            class="form-control nepali-datepicker" value="{{ request('end_miti_bs') }}">
                    </div>

                    <div class="form-group col-md-3 col-12">
                        <select name="category" class="form-control">
                            <option value="">क्याटेगोरी छान्नुहोस्</option>
                            @foreach (\App\Models\Category::select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->id }}"
                                    {{ request('category') == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_np }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        खोज्नुहोस्
                    </button>

                    <a href="{{ route('admin.application.index') }}" class="btn btn-secondary">
                        <i class="fas fa-undo"></i>
                        रिसेट
                    </a>
                </div>

            </form>
        </div>
    </div>

        <div class="card shadow-sm my-4" id="printSection">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" class="img-fluid"
                            style="max-height: 90px;">
                    </div>
                    <div class="col-8 text-center text-danger">
                        <h2 class="fw-bold"><b>{{ get_detail()->palika_name ?? '' }}</b></h2>
                        <h3 class="fw-bold"><b>{{ get_detail()->palika_karyalaya ?? '' }}</b></h3>
                        <h5 class="fw-bold npNum"><b>{{ get_detail()->address ?? '' }},
                                {{ get_detail()->district->name ?? '' }}</b></h5>
                        <p class="fw-bold mb-0"><b>{{ get_detail()->province->name ?? '' }}, नेपाल</b></p>
                    </div>
                    <div class="col-2 text-end">
                        @if (isset(get_detail()->logo))
                            <img src="{{ route('file.show', urlencode('/' . get_detail()->logo)) }}" class="img-fluid"
                                style="max-height: 90px;">
                        @endif
                    </div>
                </div>

                <h2 class="fw-bold mt-4">आवेदक प्रतिवेदन</h2>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th>क्र.सं.</th>
                                <th>आवेदन नं.</th>
                                <th>पूरा नाम</th>
                                <th>ट्रैनिंग</th>
                                <th>लिंग</th>
                                <th>ईमेल / सम्पर्क नं.</th>
                                <th>स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($applications as $application)
                                <tr>
                                    <td>{{ App\Helpers\NumberHelper::toNepaliNumber($loop->iteration)??'' }}</td>
                                    <td>{{ App\Helpers\NumberHelper::toNepaliNumber($application->application_no)??'' }}</td>
                                    <td>{{ $application->fullname_np??'' }}</td>
                                    <td>{{ $application->training->name_np??'' }}</td>
                                    <td>{{ $application->gender??'' }}</td>
                                    <td>{{ $application->email??'' }} / {{ App\Helpers\NumberHelper::toNepaliNumber($application->contact_no)??'' }}</td>
                                    <td>
                                        @if($application->status == 'processing')
                                            <span class="badge bg-info">प्रक्रिया गर्दै</span>
                                        @elseif($application->status == 'approved')
                                            <span class="badge bg-success">स्वीकृत</span>
                                        @elseif($application->status == 'declined')
                                            <span class="badge bg-danger">अस्वीकृत</span>
                                        @endif
                                    </td>
                                                                      
                                </tr>
                            @endforeach
                          
                        </tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#filterToggle').on('click', function() {
                $('#filterForm').slideToggle(300);
                $(this).find('i').toggleClass('fa-plus fa-minus');
            });
        });
    </script>
    <script src="{{ asset('Backend/assets/js/print.js') }}"></script>
@endsection
