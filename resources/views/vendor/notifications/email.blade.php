<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <style>
        /* Base styles */
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f8f9fa;
            color: #212529;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        /* Email container */
        .email-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            overflow: hidden;
        }

        .email-logo {
            max-width: 200px;
            height: auto;
        }

        /* Content */
        .email-content {
            padding: 30px;
        }

        /* Greeting */
        .greeting {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #212529;
        }

        /* Paragraphs */
        .lead {
            font-size: 16px;
            margin-bottom: 16px;
            color: #212529;
        }

        /* Button */
        .btn-container {
            text-align: center;
            margin: 30px 0;
        }

        .btn-primary {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: white !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            border: 1px solid #007bff;
        }

        /* Footer */
        .email-footer {
            padding: 20px 30px;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
            font-size: 14px;
            color: #6c757d;
            text-align: center;
        }

        /* Subcopy */
        .subcopy {
            margin-top: 30px;
            padding-top: 16px;
            border-top: 1px solid #e9ecef;
            font-size: 14px;
            color: #6c757d;
        }

        .break-all {
            word-break: break-all;
        }

        /* Utility Classes */
        .text-center {
            text-align: center;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        /* Social Icons */
        .social-icons {
            margin-top: 20px;
        }

        .social-link {
            display: inline-block;
            margin: 0 10px;
            color: #007bff;
            text-decoration: none;
        }

        /* Mobile Responsiveness */
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                width: 100% !important;
                margin: 0 !important;
                border-radius: 0 !important;
            }

            .email-content,
            .email-footer {
                padding: 15px !important;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">

        <!-- Content -->
        <div class="email-content">
            <!-- Greeting -->
            <h1 class="greeting">
                @if (!empty($greeting))
                    {{ $greeting }}
                @else
                    @lang('verification.greeting')
                @endif
            </h1>

            <!-- Intro Lines -->
            @foreach ($introLines as $line)
                <p class="lead">{{ $line }}</p>
            @endforeach

            <!-- Action Button -->
            @isset($actionText)
                <div class="btn-container">
                    <a href="{{ $actionUrl }}" class="btn-primary" target="_blank">{{ $actionText }}</a>
                </div>
            @endisset

            <!-- Outro Lines -->
            @foreach ($outroLines as $line)
                <p class="lead">{{ $line }}</p>
            @endforeach

            <!-- Salutation -->
            <p class="lead mt-4">
                @if (!empty($salutation))
                    {{ $salutation }}
                @else
                    @lang('verification.salutation')<br>
                    तालिम व्यवस्थापन प्रणाली <br>
                    {{get_detail()->palika_name??''}}
                @endif
            </p>

            <!-- Subcopy -->
            @isset($actionText)
                <div class="subcopy">
                    @lang('verification.trouble_clicking', ['actionText' => $actionText]) <br>
                    <a href="{{ $actionUrl }}" class="break-all">{{ $displayableActionUrl }}</a>
                </div>
            @endisset
        </div>
    </div>
</body>

</html>
