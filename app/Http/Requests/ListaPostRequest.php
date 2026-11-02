<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class ListaPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_limite' => 'required|date',
            'prioridad' => 'required|in:Baja,Media,Alta',
            'completada' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.string' => 'El título debe ser una cadena de texto.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha_limite.date' => 'La fecha límite debe ser una fecha válida.',
            'fecha_limite.required' => 'La fecha límite es obligatoria.',
            'prioridad.in' => 'La prioridad debe ser Baja, Media o Alta.',
            'prioridad.required' => 'La prioridad es obligatoria.',
        ];
    }
}
