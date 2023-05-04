<?php

namespace App\Repository;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;

interface SerieRepository
{
    public function add(SeriesFormRequest $request): Serie;
}