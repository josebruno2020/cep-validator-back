<?php

namespace App\Services;

use App\Models\Cep;

class CepServices {

    protected $cep;
    public function __construct(Cep $cep)
    {
        $this->cep = $cep;
    }
}
