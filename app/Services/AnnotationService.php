<?php

namespace App\Services;
use App\Models\Annotation;

class AnnotationService
{
    public function create(string $annotation)
    {
        $newAnnotation = Annotation::create([
           'annotation' => $annotation
        ]);

        return $newAnnotation;
    }

    public function update(string $annotation, int $id)
    {
        $updateAnnotation = Annotation::findOrFail($id)->update([
           'annotation' => $annotation
        ]);

        return $updateAnnotation;
    }

    public function delete(int $annotationId)
    {
        return Annotation::destroy($annotationId);
    }
}