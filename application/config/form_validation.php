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
    ),
    'search' => array(
        array(
            'field' => 'szukaj',
            'input' => 'szukaj',
            'rules' => 'trim|min_length[11]|required'
        )
    ),
    'val_pattientadd' => array(
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
            'field' => 'miasto',
            'label' => 'Miasto',
            'rules' => 'trim|required'
        ),
          array(
            'field' => 'ulica',
            'label' => 'Ulica',
            'rules' => 'trim|required'
        ),
          array(
            'field' => 'nrm',
            'label' => 'Nr mieszkania/domu',
            'rules' => 'trim|required|alpha_numeric'
        ),

        array(
            'field' => 'adres',
            'label' => 'Adres',
            'rules' => 'trim|required'
        ),

        array(
            'field' => 'telefon',
            'label' => 'Telefon',
            'rules' => 'trim|required|alpha_numeric'
        ),

        array(
            'field' => 'pesel',
            'label' => 'Pesel',
            'rules' => 'trim|required|alpha_numeric|is_unique[lekarzmsfe.pesel]|min_length[11]'
        )
    )
);
