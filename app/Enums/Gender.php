<?php

namespace App\Enums;


enum Gender: string
{
    case male = 'male';
    case female = "female";



    public function label(): string
    {
        return __(Localization::Patient->value . '.gender.' . $this->value);
    }
}
