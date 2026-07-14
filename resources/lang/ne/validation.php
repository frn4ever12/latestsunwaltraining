<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'यो फिल्ड स्वीकार गर्नुपर्छ।',
    'active_url' => 'यो URL अमान्य छ।',
    'after' => 'यो मिति :date पछि हुनुपर्छ।',
    'after_or_equal' => 'यो मिति :date वा त्यसपछि हुनुपर्छ।',
    'alpha' => 'यो फिल्डमा केवल अक्षरहरू मात्र हुनुपर्छ।',
    'alpha_dash' => 'यो फिल्डमा केवल अक्षर, संख्या, ड्यास र अन्डरस्कोर हुनुपर्छ।',
    'alpha_num' => 'यो फिल्डमा केवल अक्षर र संख्याहरू हुनुपर्छ।',
    'array' => 'यो फिल्ड एरे हुनुपर्छ।',
    'before' => 'यो मिति :date अघि हुनुपर्छ।',
    'before_or_equal' => 'यो मिति :date वा त्यसअघि हुनुपर्छ।',
    'between' => [
        'numeric' => 'यो मान :min र :max बीच हुनुपर्छ।',
        'file' => 'यो फाइल :min र :max किलोबाइट बीच हुनुपर्छ।',
        'string' => 'यो स्ट्रिङ :min र :max अक्षर बीच हुनुपर्छ।',
        'array' => 'यो आइटम :min र :max बीच हुनुपर्छ।',
    ],
    'boolean' => 'यो फिल्ड सत्य वा असत्य हुनुपर्छ।',
    'confirmed' => 'पुष्टि मिलेन।',
    'current_password' => 'पासवर्ड मिलेन।',
    'date' => 'यो मिति मिलेन।',
    'date_equals' => 'यो मिति :date बराबर हुनुपर्छ।',
    'date_format' => 'यो मिति :format ढाँचामा मिलेन।',
    'different' => ':attribute र :other फरक हुनुपर्छ।',
    'digits' => 'यो :digits अंक हुनुपर्छ।',
    'digits_between' => 'यो :min र :max अंक बीच हुनुपर्छ।',
    'dimensions' => 'यो तस्बिर अमान्य आयामहरू छ।',
    'distinct' => 'यो फिल्ड डुप्लिकेट मान छ।',
    'email' => 'यो इमेल अमान्य छ।',
    'ends_with' => 'यो निम्न मध्ये एकमा समाप्त हुनुपर्छ: :values।',
    'exists' => 'छनौट गरिएको मान अमान्य छ।',
    'file' => 'यो फाइल हुनुपर्छ।',
    'filled' => 'यो फिल्ड आवश्यक छ।',
    'gt' => [
        'numeric' => 'यो मान :name भन्दा बढी हुनुपर्छ।',
        'file' => 'यो फाइल :name किलोबाइट भन्दा बढी हुनुपर्छ।',
        'string' => 'यो स्ट्रिङ :name अ स्ट्रिङ भन्दा बढी हुनुपर्छ।',
        'array' => 'यो आइटम :name आइटम भन्दा बढी हुनुपर्छ।',
    ],
    'gte' => [
        'numeric' => 'यो मान :name भन्दा बढी वा बराबर हुनुपर्छ।',
        'file' => 'यो फाइल :name किलोबाइट भन्दा बढी वा बराबर हुनुपर्छ।',
        'string' => 'यो स्ट्रिङ :name अ स्ट्रिङ भन्दा बढी वा बराबर हुनुपर्छ।',
        'array' => 'यो आइटम :name आइटम भन्दा बढी वा बराबर हुनुपर्छ।',
    ],
    'image' => 'यो तस्बिर हुनुपर्छ।',
    'in' => 'छनौट गरिएको मान अमान्य छ।',
    'in_array' => ':other फिल्डमा अवस्थित हुनुपर्छ।',
    'integer' => 'यो पूर्णांक हुनुपर्छ।',
    'ip' => 'यो IP ठेगाना अमान्य छ।',
    'ipv4' => 'यो IPv4 ठेगाना अमान्य छ।',
    'ipv6' => 'यो IPv6 ठेगाना अमान्य छ।',
    'json' => 'यो JSON स्ट्रिङ हुनुपर्छ।',
    'lt' => [
        'numeric' => 'यो मान :name भन्दा कम हुनुपर्छ।',
        'file' => 'यो फाइल :name किलोबाइट भन्दा कम हुनुपर्छ।',
        'string' => 'यो स्ट्रिङ :name अ स्ट्रिङ भन्दा कम हुनुपर्छ।',
        'array' => 'यो आइटम :name आइटम भन्दा कम हुनुपर्छ।',
    ],
    'lte' => [
        'numeric' => 'यो मान :name भन्दा कम वा बराबर हुनुपर्छ।',
        'file' => 'यो फाइल :name किलोबाइट भन्दा कम वा बराबर हुनुपर्छ।',
        'string' => 'यो स्ट्रिङ :name अ स्ट्रिङ भन्दा कम वा बराबर हुनुपर्छ।',
        'array' => 'यो आइटम :name आइटम भन्दा कम वा बराबर हुनुपर्छ।',
    ],
    'max' => [
        'numeric' => 'यो मान :max भन्दा बढी हुनुहुँदैन।',
        'file' => 'यो फाइल :max किलोबाइट भन्दा बढी हुनुहुँदैन।',
        'string' => 'यो स्ट्रिङ :max अक्षर भन्दा बढी हुनुहुँदैन।',
        'array' => 'यो आइटम :max आइटम भन्दा बढी हुनुहुँदैन।',
    ],
    'mimes' => 'यो फाइल :values प्रकारको हुनुपर्छ।',
    'mimetypes' => 'यो फाइल :values प्रकारको हुनुपर्छ।',
    'min' => [
        'numeric' => 'यो मान :min भन्दा कम हुनुहुँदैन।',
        'file' => 'यो फाइल :min किलोबाइट भन्दा कम हुनुहुँदैन।',
        'string' => 'यो स्ट्रिङ :min अक्षर भन्दा कम हुनुहुँदैन।',
        'array' => 'यो आइटम :min आइटम भन्दा कम हुनुहुँदैन।',
    ],
    'not_in' => 'छनौट गरिएको मान अमान्य छ।',
    'not_regex' => 'यो ढाँचा अमान्य छ।',
    'numeric' => 'यो संख्या हुनुपर्छ।',
    'password' => 'पासवर्ड गलत छ।',
    'present' => 'यो फिल्ड उपस्थित हुनुपर्छ।',
    'prohibited' => 'यो फिल्ड अनुमति छैन।',
    'prohibited_if' => ':other :value हुँदा यो फिल्ड अनुमति छैन।',
    'prohibited_unless' => ':other :values मध्ये एक हुँदा मात्र यो फिल्ड अनुमति छ।',
    'prohibits' => 'यो फिल्ड :other लाई अनुमति दिँदैन।',
    'regex' => 'यो ढाँचा अमान्य छ।',
    'required' => 'यो फिल्ड आवश्यक छ।',
    'required_if' => ':other :value हुँदा यो फिल्ड आवश्यक छ।',
    'required_unless' => ':other :values मध्ये एक हुँदा मात्र यो फिल्ड आवश्यक छैन।',
    'required_with' => ':values हुँदा यो फिल्ड आवश्यक छ।',
    'required_with_all' => ':values हुँदा यो फिल्ड आवश्यक छ।',
    'required_without' => ':values नहुँदा यो फिल्ड आवश्यक छ।',
    'required_without_all' => ':values कुनै पनि नहुँदा यो फिल्ड आवश्यक छ।',
    'same' => ':attribute र :other मिल्नुपर्छ।',
    'size' => [
        'numeric' => 'यो मान :size हुनुपर्छ।',
        'file' => 'यो फाइल :size किलोबाइट हुनुपर्छ।',
        'string' => 'यो स्ट्रिङ :size अक्षर हुनुपर्छ।',
        'array' => 'यो आइटम :size आइटम हुनुपर्छ।',
    ],
    'starts_with' => 'यो निम्न मध्ये एकमा सुरु हुनुपर्छ: :values।',
    'string' => 'यो स्ट्रिङ हुनुपर्छ।',
    'timezone' => 'यो समय क्षेत्र मिलेन।',
    'unique' => 'यो इमेल पहिले नै लिइएको छ।',
    'uploaded' => 'फाइल अमान्य छ।',
    'url' => 'यो URL अमान्य छ।',
    'uuid' => 'यो UUID मिलेन।',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'email' => [
            'unique' => 'यो इमेल पहिले नै लिइएको छ।',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader-friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'नाम',
        'name_np' => 'नाम (नेपाली)',
        'email' => 'इमेल',
        'password' => 'पासवर्ड',
        'password_confirmation' => 'पासवर्ड पुष्टि',
        'contact_no' => 'सम्पर्क नम्बर',
        'gender' => 'लिङ्ग',
    ],
];
