<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class myRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if(Request::getPathInfo() == '/dologin'){
            $rules = [
                'account' => 'required',
                'password' => 'required',
            ];
        }else $rules = [];
        return $rules;
    }
    public  function  messages()
    {
        $messages = [
            'account.required' =>'账号不能为空',
            'password.required' =>'密码不能为空',
        ];
        return $messages;
    }
}
