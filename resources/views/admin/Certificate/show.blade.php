<!DOCTYPE html>
<html lang="ne">

<head>
    <meta charset="UTF-8">
    <title>प्रमाण-पत्र</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Kalimati', 'Mangal', 'Preeti', sans-serif;
            margin: 40px;
            background: #ffffff;
        }

        .certificate-border {
            border: 6px double #d61a1a;
            padding: 40px;
            text-align: center;
            position: relative;
        }



        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            color: #d61a1a;
            margin: 20px 0;
            text-decoration: underline;
        }

        .certificate-body {
            font-size: 20px;
            line-height: 1.8;
            text-align: center;
            margin: 30px 60px;
        }

        .certificate-body span {
            font-weight: bold;
            text-decoration: underline;
        }

        .certificate-footer {
            margin-top: 60px;
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
    </style>
</head>

<body>

    <div class="certificate-border">

        <div class="row align-items-center">
            <div class="col-2">
                <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" class="img-fluid" style="max-height: 90px;">
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
                @else
                    <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" class="img-fluid"
                        style="max-height: 90px;">
                @endif
            </div>
        </div>
        <div class="certificate-title">प्रमाण-पत्र</div>


        {!! $certificate->description ?? '' !!}


    </div>

</body>

</html>
