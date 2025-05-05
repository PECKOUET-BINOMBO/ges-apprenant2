<?php
namespace App\Enums;

enum Rule: string {
    case MIN = 'min';
    case MAX = 'max';
    case EMAIL = 'email';
    case UNIQUE = 'unique';
    case DATE = 'date';
    case PHONE = 'phone';
    case REQUIRED = 'required';
    case PASSWORD = 'password';
    case MATRICULE = 'matricule';
    case MAIL = 'apeckouet@gmail.com';
}

