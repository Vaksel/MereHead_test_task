<?php


namespace App\Http\Requests\User;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property ?Book $book
 */
class SortTheListOfBooksByGenreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'sort-rule'             => 'required|boolean',
        ];

        return $rules;
    }
}