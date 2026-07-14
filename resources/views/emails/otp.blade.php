<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">तालिम व्यवस्थापन प्रणाली</h1>
            <p style="color: #ffffff; margin: 10px 0 0 0; opacity: 0.9;">खाता सत्यापन</p>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <p style="color: #333333; font-size: 16px; line-height: 1.6;">
                नमस्ते <strong>{{ $userName }}</strong>,
            </p>
            <p style="color: #333333; font-size: 16px; line-height: 1.6;">
                तपाईंले तालिम व्यवस्थापन प्रणालीमा दर्ता गर्नुभएकोमा धन्यवाद। तपाईंको खाता सक्रिय गर्नको लागि कृपया तल दिइएको OTP कोड प्रयोग गर्नुहोस्।
            </p>

            <!-- OTP Code Box -->
            <div style="background-color: #f8f9fa; border: 2px dashed #667eea; border-radius: 8px; padding: 20px; text-align: center; margin: 25px 0;">
                <p style="color: #666666; margin: 0 0 10px 0; font-size: 14px;">तपाईंको OTP कोड:</p>
                <h2 style="color: #667eea; margin: 0; font-size: 36px; letter-spacing: 5px; font-weight: bold;">{{ $otp }}</h2>
            </div>

            <p style="color: #333333; font-size: 16px; line-height: 1.6;">
                यो OTP कोड <strong>१५ मिनेट</strong> मा समाप्त हुनेछ। कृपया यो कोड कसैसँग साझा नगर्नुहोस्।
            </p>

            <p style="color: #333333; font-size: 16px; line-height: 1.6;">
                यदि तपाईंले यो अनुरोध गर्नुभएको छैन भने, कृपया यो इमेल उपेक्षा गर्नुहोस्।
            </p>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                <p style="color: #666666; font-size: 14px; margin: 0;">
                    यदि कुनै सहायता चाहिन्छ भने, कृपया हामीलाई सम्पर्क गर्नुहोस्।
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div style="background-color: #f8f9fa; padding: 20px; text-align: center;">
            <p style="color: #666666; font-size: 12px; margin: 0;">
                © {{ date('Y') }} तालिम व्यवस्थापन प्रणाली। सर्वाधिकार सुरक्षित।
            </p>
        </div>
    </div>
</body>
</html>
