<?php

namespace App\Http\Requests;

use App\Rules\EnabledDate;
use App\Rules\ValidDateRange;
use Illuminate\Foundation\Http\FormRequest;

class StoreHolyCardReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', HolyCardReservation::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'holy_card_id' => [
                'required',
                'exists:holy_cards,id'
            ],
            'start_date' => [
                'required',
                'date',
                'after_or_equal:yesterday',
                new EnabledDate
            ],
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
                new EnabledDate,
                new ValidDateRange
            ],
        ];
    }
}
