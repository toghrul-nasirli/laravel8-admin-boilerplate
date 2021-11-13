<?php

return [
    'accepted' => ':attribute qəbul olunmalıdır.',
    'active_url' => ':attribute etibarlı bir URL deyil.',
    'after' => ':attribute, :date tarixindən sonra bir tarixdə olmalıdır.',
    'after_or_equal' => ':attribute, :date tarixindən sonra və ya bərabər bir tarixdə olmalıdır.',
    'alpha' => ':attribute yalnız hərflərdən ibarət olmalıdır.',
    'alpha_dash' => ':attribute yalnız hərflər, rəqəmlər, tire və alt işarələrdən ibarət olmalıdır.',
    'alpha_num' => ':attribute yalnız hərflər və rəqəmlərdən ibarət olmalıdır.',
    'array' => ':attribute bir massiv olmalıdır.',
    'before' => ':attribute, :date tarixindən əvvəl bir tarixdə olmalıdır.',
    'before_or_equal' => ':attribute, :date tarixindən əvvəl və ya bərabər bir tarixdə olmalıdır.',
    'between' => [
        'numeric' => ':attribute :min və :max aralığında olmalıdır.',
        'file' => ':attribute :min və :max kilobayt aralığında olmalıdır.',
        'string' => 'attribute :min və :max simvol aralığında olmalıdır.',
        'array' => ':attribute :min və :max element aralığında olmalıdır.',
    ],
    'boolean' => ':attribute bölməsi doğru və ya yalnış olmalıdır.',
    'confirmed' => ':attribute təsdiqi uyğun gəlmir.',
    'date' => ':attribute etibarlı bir tarix deyil.',
    'date_equals' => ':attribute :date tarixinə bərabər bir tarix olmalıdır.',
    'date_format' => ':attribute :format formatı ilə uyğun gəlmir.',
    'different' => ':attribute və :other fərqli olmalıdır.',
    'digits' => ':attribute :digits rəqəm olmalıdır.',
    'digits_between' => ':attribute :min və :max rəqəm aralığında olmalıdır.',
    'dimensions' => ':attribute etibarsız şəkil ölçülərinə sahibdir.',
    'distinct' => ':attribute bölməsi təkrarlanan bir dəyərə sahibdir.',
    'email' => ':attribute etibarlı bir e-poçt ünvanı olmalıdır.',
    'ends_with' => ':attribute :values ilə bitməlidir.',
    'exists' => 'Seçilmiş :attribute mövcud deyil.',
    'file' => ':attribute fayl formatında olmalıdır.',
    'filled' => ':attribute bölməsi bir dəyərə sahib olmalıdır.',
    'gt' => [
        'numeric' => ':attribute :value rəqəmindən böyük olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük olmalıdır.',
        'string' => ':attribute :value simvoldan böyük olmalıdır.',
        'array' => ':attribute :value elementdən böyük olmalıdır.',
    ],
    'gte' => [
        'numeric' => ':attribute :value rəqəmindən böyük və ya bərabər olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük və ya bərabər olmalıdır.',
        'string' => ':attribute :value simvoldan böyük və ya bərabər olmalıdır.',
        'array' => ':attribute :value elementdən böyük və ya bərabər olmalıdır.',
    ],
    'image' => ':attribute şəkil formatında olmalıdır.',
    'in' => 'Seçilmiş :attribute etibarsızdır.',
    'in_array' => ':attribute bölməsi :other bölməsində mövcud deyil.',
    'integer' => ':attribute tam ədəd olmalıdır.',
    'ip' => ':attribute etibarlı bir IP ünvanı olmalıdır.',
    'ipv4' => ':attribute etibarlı bir IPv4 ünvanı olmalıdır.',
    'ipv6' => ':attribute etibarlı bir IPv6 ünvanı olmalıdır.',
    'json' => ':attribute etibarlı bir JSON mətni olmalıdır.',
    'lt' => [
        'numeric' => ':attribute :value rəqəmindən kiçik olmalıdır.',
        'file' => ':attribute :value kilobaytdan kiçik olmalıdır.',
        'string' => ':attribute :value simvoldan kiçik olmalıdır.',
        'array' => ':attribute :value elementdən kiçik olmalıdır.',
    ],
    'lte' => [
        'numeric' => ':attribute :value rəqəmindən kiçik və ya bərabər olmalıdır.',
        'file' => ':attribute :value kilobaytdan kiçik və ya bərabər olmalıdır.',
        'string' => ':attribute :value simvoldan kiçik və ya bərabər olmalıdır.',
        'array' => ':attribute :value elementdən kiçik və ya bərabər olmalıdır.',
    ],
    'max' => [
        'numeric' => ':attribute :max rəqəmindən böyük olmamalıdır.',
        'file' => ':attribute :max kilobaytdan böyük olmamalıdır.',
        'string' => ':attribute :max simvoldan böyük olmamalıdır.',
        'array' => ':attribute :max elementden artıq elementə sahib olmamalıdır.',
    ],
    'mimes' => ':attribute bu fayl tiplərində ola bilər: :values.',
    'mimetypes' => ':attribute bu fayl tiplərində ola bilər: :values.',
    'min' => [
        'numeric' => ':attribute ən az :min olmalıdır.',
        'file' => ':attribute ən az :min kilobayt olmalıdır.',
        'string' => ':attribute ən az :min simvol olmalıdır.',
        'array' => ':attribute ən az :min elementə sahib olmalıdır.',
    ],
    'multiple_of' => ':attribute :value rəqəminin qatı olmalıdır.',
    'not_in' => 'Seçilmiş :attribute etibarsızdır.',
    'not_regex' => ':attribute formatı etibarsızdır.',
    'numeric' => ':attribute bir rəqəm olmalıdır.',
    'password' => 'Şifrə yalnışdır.',
    'present' => ':attribute bölməsi mövcud olmalıdır.',
    'regex' => ':attribute formatı etibarsızdır.',
    'required' => ':attribute bölməsi boş buraxıla bilməz.',
    'required_if' => ':other bölməsinin dəyəri :value olduğu halda :attribute bölməsi boş buraxıla bilməz.',
    'required_unless' => ':other bölməsinin dəyəri :values daxilində olmadığı halda :attribute bölməsi boş buraxıla bilməz.',
    'required_with' => ':values mövcud olduğu halda :attribute bölməsi boş buraxıla bilməz.',
    'required_with_all' => ':values mövcud olduqları halda :attribute bölməsi boş buraxıla bilməz.',
    'required_without' => ':values mövcud olmadığı halda :attribute bölməsi boş buraxıla bilməz.',
    'required_without_all' => 'Heç bir :values mövcud olmadığı halda :attribute bölməsi boş buraxıla bilməz.',
    'prohibited' => ':attribute bölməsi qadağandır.',
    'prohibited_if' => ':other bölməsinin dəyəri :value olduğu halda :attribute bölməsi qadağandır.',
    'prohibited_unless' => ':other bölməsinin dəyəri :values daxilində olmadığı halda :attribute bölməsi qadağandır.',
    'same' => ':attribute və :other eyni olmalıdır.',
    'size' => [
        'numeric' => ':attribute :size olmalıdır.',
        'file' => ':attribute :size kilobayt olmalıdır.',
        'string' => ':attribute :size simvol olmalıdır.',
        'array' => ':attribute :size elemente sahib olmalıdır.',
    ],
    'starts_with' => ':attribute, bu dəyərlərlə başlamalıdır: :values.',
    'string' => ':attribute simvollardan ibarət olmalıdır.',
    'timezone' => ':attribute etibarlı bir zona olmalıdır.',
    'unique' => ':attribute bölməsi təkrarlana bilməz.',
    'uploaded' => ':attribute yüklənməsi uğursuz oldu.',
    'url' => ':attribute formatı etibarsızdır.',
    'uuid' => ':attribute etibarlı bir UUID olmalıdır.',
    
    'attributes' => [
        'username' => 'İstifadəçi',
        'password' => 'Şifrə',
    ],
];
