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

    'accepted'             => 'Das :attribute muss akzeptiert werden.',
    'active_url'           => 'Das :attribute ist keine gültige URL.',
    'after'                => 'Das :attribute muss nach dem :date liegen.',
    'after_or_equal'       => 'Das :attribute muss ein Datum gleich oder nach dem :date sein.',
    'alpha'                => 'Das :attribute darf nur Buchstaben enthalten.',
    'alpha_dash'           => 'Das :attribute may darf nur Buchstaben,Zahlen und Bindestriche enthalten.',
    'alpha_num'            => 'Das :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array'                => 'Das :attribute muss ein array sein.',
    'before'               => 'Das :attribute muss vor dem :date liegen.',
    'before_or_equal'      => 'Das :attribute muss ein Datum gleich oder vor dem :date sein.',
    'between'              => [
        'numeric' => 'Das :attribute muss zwischen :min und :max liegen.',
        'file'    => 'Das :attribute muss zwischen :min und :max kilobytes haben.',
        'string'  => 'Das :attribute muss zwischen :min und :max Zeichen haben.',
        'array'   => 'Das :attribute muss zwischen :min und :max Items haben..',
    ],
    'boolean'              => 'Das :attribute muss entweder true oder false sein.',
    'confirmed'            => 'Die Bestätigung von :attribute funktioniert nicht.',
    'date'                 => 'Das :attribute ist kein gültiges Datum.',
    'date_format'          => 'Das :attribute passt nicht zum Format :format.',
    'different'            => ':attribute und :other müssen sich unterscheiden.',
    'digits'               => 'Das :attribute muss :digits Stellen haben.',
    'digits_between'       => 'Das :attribute muss zwischen :min und :max Stellen haben.',
    'dimensions'           => 'Das :attribute besitzt eine ungültige Bildgröße.',
    'distinct'             => 'Der :attribute Wert besitzt einen doppelten Wert.',
    'email'                => 'Das :attribute muss eine gültige Email-Adresse sein.',
    'exists'               => 'Das ausgewählte :attribute ist nicht gültig.',
    'file'                 => 'Das :attribute muss eine Datei sein.',
    'filled'               => 'Das :attribute Feld muss ausgefüllt werden.',
    'image'                => 'Das :attribute muss ein Bild sein',
    'in'               => 'Das ausgewählte :attribute ist nicht gültig.',
    'in_array'             => 'Das :attribute Feld existiert nicht in :other.',
    'integer'              => 'Das :attribute muss ein Integer sein.',
    'ip'                   => 'Das :attribute muss eine gültige IP Adresse sein.',
    'json'                 => 'Das :attribute muss ein gültiges JSON sein.',
    'max'                  => [
        'numeric' => 'Das :attribute darf nicht größer sein als :max.',
        'file'    => 'Das :attribute darf nicht größer sein als :max kilobytes.',
        'string'  => 'Das :attribute darf nicht länger sein als :max zeichen.',
        'array'   => 'Das :attribute darf nicht mehr als :max Elemente enthalten.',
    ],
    'mimes'                => 'Das :attribute muss eine Datei des Typs: :values sein.',
    'mimetypes'            => 'Das :attribute muss eine Datei des Typs: :values sein.',
    'min'                  => [
        'numeric' => 'Das :attribute darf nicht kleiner sein als :min.',
        'file'    => 'Das :attribute darf nicht kleiner sein als :min kilobytes.',
        'string'  => 'Das :attribute darf nicht kleiner sein als :min zeichen.',
        'array'   => 'Das :attribute darf nicht weniger als :min Elemente enthalten.',
    ],
    'not_in'               => 'Das ausgewählte :attribute ist ungültig.',
    'numeric'              => 'Das :attribute muss eine Zahl sein.',
    'present'              => 'Das :attribute Feld muss aktiv sein.',
    'regex'                => 'Das :attribute Format ist ungültig.',
    'required'             => 'Das :attribute Feld wird benötigt.',
    'required_if'          => 'Das :attribute Feld wird benötigt wenn :other den Wert :value besitzt.',
    'required_unless'      => 'Das :attribute Feld wird benötigt außer wenn :other den Wert :value besitzt.',
    'required_with'        => 'Das :attribute Feld wird benötigt, wenn :values aktiv ist.',
    'required_with_all'    => 'Das :attribute Feld wird benötigt, wenn :values aktiv ist.',
    'required_without'     => 'Das :attribute Feld wird benötigt, wenn :values nicht aktiv ist.',
    'required_without_all' => 'Das :attribute Feld wird benötigt, wenn keiner aus :values aktiv ist.',
    'same'                 => 'Das :attribute und :other müssen übereinstimmen.',
    'size'                 => [
        'numeric' => 'Das :attribute muss eine Größe von :size besitzen.',
        'file'    => 'Das :attribute muss eine Größe von :size kilobytes besitzen.',
        'string'  => 'Das :attribute muss :size Zeichen lang sein.',
        'array'   => 'Das :attribute muss :size Elemente besitzen.',
    ],
    'string'               => 'Das :attribute muss ein String sein.',
    'timezone'             => 'Das :attribute muss eine gültige Zeitzone sein.',
    'unique'               => 'Das :attribute wurde bereits benutzt.',
    'uploaded'             => 'Das :attribute konnte nciht hochgeladen werden.',
    'url'                  => 'Das :attribute Format ist ungültig.',

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
