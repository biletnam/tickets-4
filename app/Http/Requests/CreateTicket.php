<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CreateTicket extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true;
        }
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
            'title' => 'required|min:2|max:255',
            'body' => 'required|min:2|max:255',
            'img_url' => 'image|mimes:jpeg,bmp,png'
        ];
    }

    public function persist()
    {
        $fileName = $this->saveImage('img_url');

        $this->request->add(['img_url' => $fileName]);

        $ticket = Ticket::create($this->request->all());

        return $ticket;
    }

    public function saveImage($imageInputName)
    {
        if ($this->hasFile($imageInputName)) {

            $fileName = $this->file($imageInputName)->getClientOriginalName();

            $fileName = rand(0, 10000) . '' . e($fileName);

            $path = public_path('uploads/' . $fileName);

            $realPath = $this->file($imageInputName)->getRealPath();

            Image::make($realPath)->resize(200, 200)->save($path);

            return $fileName;
        }

        return false;
    }
}
