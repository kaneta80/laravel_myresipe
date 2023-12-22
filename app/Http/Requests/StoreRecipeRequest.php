<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'numeric',
            'name' => 'required',
            'url' => 'url',
            'serving' => 'required|numeric',
            'latestCook' => 'date', // もし 'latestCook' 属性がリクエストに存在することを確認する必要があれば、'latestCook' => 'date' の代わりに 'latestCook' => 'date|required' と指定する
        ];
    }
}
