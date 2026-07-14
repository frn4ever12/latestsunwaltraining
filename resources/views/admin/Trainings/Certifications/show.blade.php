<!DOCTYPE html>
<html lang="ne">

<head>
    <meta charset="UTF-8">
    <title>प्रमाण-पत्र</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Kalimati', 'Mangal', 'Preeti', sans-serif;
            margin: 40px;
            background: #ffffff;
        }

        .certificate-border {
            border: 6px double #d61a1a;
            padding: 36px;
            margin: 1rem 0;
            text-align: center;
            position: relative;
        }



        .certificate-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #d61a1a;
            text-decoration: underline;
        }

        .certificate-body {
            font-size: 18px;
            line-height: 1.8;
            text-align: justify;
            margin: 30px 20px;
        }

        .certificate-body span {
            font-weight: bold;
            text-decoration: underline;
        }

        .certificate-footer {
            margin-top: 44px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            text-align: center;
        }

        .signature-block {
            font-size: 16px;
        }

        .stamp {
            position: absolute;
            bottom: 200px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0.3;
            height: 120px;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 2.5rem 2rem;
            }

            html,
            body {
                margin: 0 !important;
                padding: 0 !important;
            }

            .certificate-border {
                margin: 0;
            }

            .page-break {
                page-break-after: always;
            }

            .noPrint {
                display: none;
            }
        }
    </style>
</head>

<body>
    <section class="mb-3 noPrint">
        <div class="d-flex justify-content-end align-items-center">
            <button class="btn btn-primary" type="button" onclick="window.print()"><i
                    class="fa fa-print"></i>&nbsp;&nbsp;मुद्रण</button>
        </div>
    </section>
    @php
        $date1 = \Carbon\Carbon::parse($training->start_miti_ad);
        $date2 = \Carbon\Carbon::parse($training->end_miti_ad);

        $daysDifference = $date1->diffInDays($date2) ?? '';
        $globalReplacements = [
            '{suru_miti_bs}' => \App\Helpers\NumberHelper::toNepaliNumber($training->start_miti_bs),
            '{start_date_ad}' => $training->start_miti_ad,
            '{sakine_miti}' => \App\Helpers\NumberHelper::toNepaliNumber($training->end_miti_bs),
            '{end_date_ad}' => $training->end_miti_ad,
            '{trainer_sanstha_np}' => $training->institution_name_np,
            '{trainer_sanstha_eng}' => $training->institution_name_eng,
            '{training_name_np}' => $training->name_np,
            '{training_name_eng}' => $training->name_eng,
            '{department}' => $training->department->name_np??'',
            '{days_np}' => \App\Helpers\NumberHelper::toNepaliNumber($daysDifference),
            '{days_eng}' => $daysDifference,
        ];
    @endphp
    @foreach ($datas as $data)
        @php
            $dynamicReplacements = [
                '{trainee_name_np}' => $data->trainingApplication->fullname_np ?? '',
                '{trainee_name_eng}' => $data->trainingApplication->fullname_eng ?? '',
                '{trainee_address_np}' => $data->trainingApplication->theganaDetail->sthyayiDistrict->name ?? '',
                '{trainee_address_eng}' => $data->trainingApplication->theganaDetail->sthyayiDistrict->name_eng ?? '',
           ];
            $replacements = array_merge($globalReplacements, $dynamicReplacements);

            $data->certificate->description = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $data->certificate->description,
            );
        @endphp
        <div class="certificate-border {{ !$loop->last ? ' page-break' : '' }}">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" class="img-fluid"
                        style="max-height: 90px;">
                </div>
                <div class="col-8 text-center text-danger">
                    <h2 class="fw-bold"><b>{{ get_detail()->palika_name ?? '' }}</b></h2>
                    <h3 class="fw-bold"><b>{{ get_detail()->palika_karyalaya ?? '' }}</b></h3>
                    <p class="fw-bold npNum"><b>{{ get_detail()->address ?? '' }},
                            {{ get_detail()->district->name ?? '' }}</b></p>
                    <p class="fw-bold mb-0"><b>{{ get_detail()->province->name ?? '' }}, नेपाल</b></p>
                </div>
                <div class="col-2 text-end">
                    @if (isset(get_detail()->logo))
                        <img src="{{ route('file.show', urlencode('/' . get_detail()->logo)) }}" class="img-fluid"
                            style="max-height: 90px;">
                    @else
                        <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" class="img-fluid"
                            style="max-height: 90px;">
                    @endif
                </div>
            </div>
            <div class="certificate-title">प्रमाण-पत्र</div>


            {!! $data->certificate->description ?? '' !!}


        </div>
    @endforeach

</body>

</html>
