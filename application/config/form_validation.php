<?php

/**
 * Plik z zasadami walidacji
 */
$config = array(
    'register' => array(
        array(
            'field' => 'login',
            'label' => 'Login',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'imie',
            'label' => 'Imie',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'nazwisko',
            'label' => 'Nazwisko',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'miejscePracy',
            'label' => 'Miejsce pracy',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'telefon',
            'label' => 'Telefon',
            'rules' => 'trim|required|alpha_numeric'
        ),
        array(
            'field' => 'miasto',
            'label' => 'Miasto',
            'rules' => 'trim|required'
        ),
           array(
            'field' => 'pesel',
            'label' => 'Pesel',
            'rules' => 'trim|required|alpha_numeric|is_unique[lekarzmsfe.pesel]|min_length[11]'
        )
        
    ),
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'trim|required'
        )
    )
);
