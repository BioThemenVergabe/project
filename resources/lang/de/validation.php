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

    'accepted'             => ':attribute muss akzeptiert werden.',
    'active_url'           => ':attribute ist keine gültige URL.',
    'after'                => ':attribute muss nach dem :date liegen.',
    'after_or_equal'       => ':attribute muss ein Datum gleich oder nach dem :date sein.',
    'alpha'                => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash'           => ':attribute may darf nur Buchstaben,Zahlen und Bindestriche enthalten.',
    'alpha_num'            => ':attribute darf nur Buchstaben und Zahlen enthalten.',
    'array'                => ':attribute muss ein array sein.',
    'before'               => ':attribute muss vor dem :date liegen.',
    'before_or_equal'      => ':attribute muss ein Datum gleich oder vor dem :date sein.',
    'between'              => [
        'numeric' => ':attribute muss zwischen :min und :max liegen.',
        'file'    => ':attribute muss zwischen :min und :max kilobytes haben.',
        'string'  => ':attribute muss zwischen :min und :max Zeichen haben.',
        'array'   => ':attribute muss zwischen :min und :max Items haben..',
    ],
    'boolean'              => ':attribute muss entweder true oder false sein.',
    'confirmed'            => 'Die Bestätigung von :attribute funktioniert nicht.',
    'date'                 => ':attribute ist kein gültiges Datum.',
    'date_format'          => ':attribute passt nicht zum Format :format.',
    'different'            => ':attribute und :other müssen sich unterscheiden.',
    'digits'               => ':attribute muss :digits Stellen haben.',
    'digits_between'       => ':attribute muss zwischen :min und :max Stellen haben.',
    'dimensions'           => ':attribute besitzt eine ungültige Bildgröße.',
    'distinct'             => 'Der :attribute Wert besitzt einen doppelten Wert.',
    'email'                => ':attribute muss eine gültige Email-Adresse sein.',
    'exists'               => 'ausgewählte :attribute ist nicht gültig.',
    'file'                 => ':attribute muss eine Datei sein.',
    'filled'               => ':attribute Feld muss ausgefüllt werden.',
    'image'                => ':attribute muss ein Bild sein',
    'in'               => ':attribute ist nicht gültig.',
    'in_array'             => ':attribute Feld existiert nicht in :other.',
    'integer'              => ':attribute muss ein Integer sein.',
    'ip'                   => ':attribute muss eine gültige IP Adresse sein.',
    'json'                 => ':attribute muss ein gültiges JSON sein.',
    'max'                  => [
        'numeric' => ':attribute darf nicht größer sein als :max.',
        'file'    => ':attribute darf nicht größer sein als :max kilobytes.',
        'string'  => ':attribute darf nicht länger sein als :max zeichen.',
        'array'   => ':attribute darf nicht mehr als :max Elemente enthalten.',
    ],
    'mimes'                => ':attribute muss eine Datei des Typs: :values sein.',
    'mimetypes'            => ':attribute muss eine Datei des Typs: :values sein.',
    'min'                  => [
        'numeric' => ':attribute darf nicht kleiner sein als :min.',
        'file'    => ':attribute darf nicht kleiner sein als :min kilobytes.',
        'string'  => ':attribute darf nicht kleiner sein als :min zeichen.',
        'array'   => ':attribute darf nicht weniger als :min Elemente enthalten.',
    ],
    'not_in'               => 'ausgewählte :attribute ist ungültig.',
    'numeric'              => ':attribute muss eine Zahl sein.',
    'present'              => ':attribute Feld muss aktiv sein.',
    'regex'                => 'attribute Format ist ungültig.',
    'required'             => ':attribute Feld wird benötigt.',
    'required_if'          => ':attribute Feld wird benötigt wenn :other den Wert :value besitzt.',
    'required_unless'      => ':attribute Feld wird benötigt außer wenn :other den Wert :value besitzt.',
    'required_with'        => ':attribute Feld wird benötigt, wenn :values aktiv ist.',
    'required_with_all'    => ':attribute Feld wird benötigt, wenn :values aktiv ist.',
    'required_without'     => ':attribute Feld wird benötigt, wenn :values nicht aktiv ist.',
    'required_without_all' => ':attribute Feld wird benötigt, wenn keiner aus :values aktiv ist.',
    'same'                 => ':attribute und :other müssen übereinstimmen.',
    'size'                 => [
        'numeric' => ':attribute muss eine Größe von :size besitzen.',
        'file'    => ':attribute muss eine Größe von :size kilobytes besitzen.',
        'string'  => ':attribute muss :size Zeichen lang sein.',
        'array'   => ':attribute muss :size Elemente besitzen.',
    ],
    'string'               => ':attribute muss ein String sein.',
    'timezone'             => ':attribute muss eine gültige Zeitzone sein.',
    'unique'               => ':attribute wurde bereits benutzt.',
    'uploaded'             => ':attribute konnte nciht hochgeladen werden.',
    'url'                  => ':attribute Format ist ungültig.',

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
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
