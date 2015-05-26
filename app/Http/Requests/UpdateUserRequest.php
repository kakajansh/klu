<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request {

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
			'ad' => 'required|min:2',
			'soyad' => 'required|min:2',
			// 'ogrno' => 'required|unique:users',
			// 'email' => 'sometimes|required|email|unique:users',
			'password' => 'required|confirmed|min:6'
		];
	}

}
