<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'dni' => 'required|numeric',
            'password' => 'required'
        ];
    }

    public function getCredentials(){
        $dni = $this->get('dni');
        if($this->isEmail($dni)){
            return [
                'email' => $dni,
                'password' => $this->get('password')
            ];
        }

        return $this->only('dni', 'password');
    }

    private function isEmail($params){

        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['dni' => $params],
            ['dni' => 'email']
        )->fails();
    }
}
