<?php

namespace Ozana\Units\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddWatchListRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'movie_title' => 'required|string',
            'movie_image' => 'string',
            'release_date' => 'date',
            'channel_id' => 'exists:channels',
            'movie_id' => 'exists:movie_types',
            'user_id' => 'exists:users'
        ];
    }
}
