<?php

namespace App\Repository;
use App\Models\Annotation;


class AnnotationRepository
{
    public function getAllAnnotation()
    {
        return Annotation::all();
    }
}