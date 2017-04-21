<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
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
            'to' => 'required|email',
            'subject' => 'required|max:150',
            'content' => 'required',
        ];
    }

    /**
     * 验证规则提示信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'to.required' => '请填写收件人邮箱地址',
            'to.email' => '收件人邮箱地址格式错误',
            'subject.required' => '请填写邮件主题',
            'content.required' => '请填写邮件正文',
        ];
    }
}
