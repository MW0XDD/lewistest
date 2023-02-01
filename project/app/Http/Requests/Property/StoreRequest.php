<?php

namespace App\Http\Requests\Property;

use App\Rules\Postcode;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address' => ['required','array'],
            'address.*.line_1' => ['required', 'max:255'],
            'address.*.line_2' => ['max:255'],
            'address.*.postcode' => ['required', new Postcode]
        ];
    }

    public function prepareForValidation()
    {
        if(!$this->input('address')) {
            return;
        }

        // Normalise "address" to be an array input even if only one given.
        if(!is_multi_array($this->input('address'))){
            $this->merge([
                'address' => [$this->input('address')],
            ]);
        }

        // Replace any whitespace within the postcode
        $address = collect($this->input('address'))->map(function ($address, $key) {
            return collect($address)->map(function ($item, $key) {
                if($key == 'postcode') {
                    return trim(preg_replace('/\s+/', '', $item));
                }
                return $item;
            });
        })->toArray();

        $this->merge(['address' => $address]);

    }
}
