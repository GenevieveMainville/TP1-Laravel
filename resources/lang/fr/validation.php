<?php

return[

    'min' => [
       
        'string' => 'Le champ :attribute doit contenir un minimum de :min caractères.',
       
    ],
    'max' => [
        
        'string' => 'Le champ :attribute doit contenir un minimum de :min caractères.',
        
    ],
    'required' => 'Le champ :attribute est obligatoire.',
    'email' => 'Le champ :attribute doit être une adresse courriel valide.',
    'unique' => 'Le champ :attribute doit être unique.',
    'date' => 'Le champ :attribute doit être une date valide au format yyyy/mm/jj.',
    'date_format' => 'Le champ :attribute doit être au format :format.',
/*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => ['titre_en'=>'titre anglais', 'titre_fr'=>'titre français', 'contenu_en'=>'contenu anglais', 
                    'contenu_fr'=>'contenu français','date_naissance'=>'date de naissance', 
                    'email'=>'courriel', 'password'=>'mot de passe','doc'=>'document','titre'=>'titre',
                    'langue'=>'langue', 'phone'=>'téléphone', 'name'=>'nom'],
];
    


