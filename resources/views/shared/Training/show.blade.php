<div class="row">
    <div class="col-md-8 col-12">
        <div class="card mb-4 shadow-none border rounded-0">
            <div class="card-header pt-3 bg-white ">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0">तालिम विवरण</h5>
                    <div><button
                            class="btn fw-bold btn-sm fs-6 px-4
                    @if ($training->status == 'active') btn-success 
                    @elseif($training->status == 'completed') 
                        btn-secondary 
                    @elseif($training->status == 'upcoming') 
                        btn-upcoming 
                    @elseif($training->status == 'dismissed') 
                        btn-danger 
                    @else 
                        btn-primary @endif">
                            {{ __('messages.' . $training->status) }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <th>तालिमको नाम</th>
                            <td>{{ $training->name_np }}</td>
                        </tr>
                        @if (isset($training->district_id))
                            <tr>
                                <th>स्थान</th>
                                <td> तिलोत्तमा नगरपालिका क्षेत्र भित्र         </td>
                            </tr>
                        @endif
                        @if (isset($training->trainer_name_np))
                            <tr>
                                <th>तालिम दिनेको नाम</th>
                                <td>{{ $training->trainer_name_np ?? '' }}</td>
                            </tr>
                        @endif
                        @if (isset($training->start_samaya) && isset($training->end_samaya))
                            <tr>
                                <th>तालिमको समय</th>
                                <td>{{ \App\Helpers\NumberHelper::toNepaliTime($training->start_samaya ?? '') }} / {{ \App\Helpers\NumberHelper::toNepaliTime($training->end_samaya ?? '') }}</td>
                            </tr>
                        @endif
                        @if (isset($training->start_miti_bs) && isset($training->end_miti_bs))
                            <tr>
                                <th>तालिम मिति</th>
                                <td><span class="me-2">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->start_miti_bs) }}</span> देखि <span
                                        class="mx-2">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->end_miti_bs )}} </span>सम्म </td>
                            </tr>
                        @endif
                        @if (isset($training->application_start_miti_bs) && isset($training->application_deadline_miti_bs))
                            <tr>
                                <th>आवेदन बुझाउने मिति</th>
                                <td><span class="me-2">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->application_start_miti_bs) }}</span> देखि <span
                                        class="mx-2">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->application_deadline_miti_bs) }}</span> सम्म</td>
                            </tr>
                        @endif
                        @if (isset($training->start_miti_bs) && isset($training->end_miti_bs))
                            <tr>
                                <th>तालिम अवधि</th>
                                <td>
                                    @php
                                        $start = \Carbon\Carbon::parse($training->start_miti_bs);
                                        $end = \Carbon\Carbon::parse($training->end_miti_bs);
                                        $days = $start->diffInDays($end) + 1;
                                    @endphp
                                    {{\App\Helpers\NumberHelper::toNepaliNumber($days) }} दिन 
                                </td>
                            </tr>
                        @endif
                        @if (isset($training->training_cost))
                            <tr>
                                <th>तालीम शुल्क</th>
                                <td>{{ $training->training_cost ?? '' }}</td>
                            </tr>
                            @endif
                        @if (isset($training->training_cost))
                            <tr>
                                <th>तालीम कोटा शंख्या </th>
                                <td>{{ $training->available_seats ?? '' }}</td>
                            </tr>
                        @endif
                        @if (isset($training->training_cost))
                            <tr>
                                <th>जम्मा आवेदन संख्या</th>
                                <td>{{ $training->trainingApplications->count() }}</td>
                            </tr>
                        @endif

                        @if (isset($training->contact_no))
                            <tr>
                                <th>सम्पर्क नं.</th>
                                <td>{{ $training->contact_no ?? '' }}</td>
                            </tr>
                        @endif
                        @if (isset($training->target_groups))

                            <tr>
                                <th>टार्गेट समूह</th>
                                <td>
                                    @foreach ($training->target_groups as $value)
                                        <button class="btn btn-sm btn-primary">{{ $value }}
                                        </button>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if (isset($training->preferences))

                            <tr>
                                <th>प्राथमिकता</th>
                                <td>
                                    @foreach ($training->preferences as $value)
                                        <button class="btn btn-sm btn-primary">{{ $value }}
                                        </button>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if (isset($training->document))
                            <tr>
                                <th>फाइल</th>
                                <td>
                                    <a href="{{ asset('files/' . $training->document) }}" target="_blank"
                                        class="btn btn-main py-2 btn-sm"><i class="fa fa-download me-2"></i>
                                        डाउनलोड गर्नुहोस्
                                    </a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4 shadow-none border rounded-0">
            <div class="card-header bg-white pt-3">
                <h5 class="fw-bold">तालिमको जानकारी</h5>
            </div>
            <div class="card-body" style="white-space: pre-line;">
                {!! $training->description !!}
            </div>
        </div>



    </div>

    <div class="col-md-4">
        <div class="card shadow-none rounded-0 border">
            <div class="card-header bg-white pt-3">
                <h5 class="fw-bold">स्थान</h5>
            </div>
            <div class="card-body p-0">
                <div style="max-width: 400px">
                    {!! $training->training_location !!}
                </div>
            </div>
        </div>
    </div>
</div>
