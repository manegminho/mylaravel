<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'content' => ['required', 'min:10'],
            'hit' => ['required:0'],
            //
        ];
    }

    public function message()
    {
        return [
            'required' => ':attribute은(는) 필수 입력 항목입니다.',
            'min' => ': attribute은(는)최소 :min 글자 이상이 필요합니다',
            //
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '본문',
            'hit' => 0,
        ];
    }
}
