<?php


namespace App\Http\Requests\User;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property ?Book $book
 */
class FilterListOfBooksByGenreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'genre'             => 'required|string|min:2|max:255',
        ];

        return $rules;
    }
}