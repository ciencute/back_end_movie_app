<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            'title' => 'required',
            'original_title' =>'required',
            'img' =>'file',
            'url' => 'file',
            'embededCode'=>'required|string',
            'trailerKey'=>'required|string',
            'directorId' =>'required|integer',
            'bgImg' =>'file',
            'description'=>'required|string',
            'countryId' =>'required|integer',
            'duration' =>'required|integer',
            'viewCount' =>'required|integer',
            'categoryId' =>'required|integer',
            'slug' =>'required|string',
            'imdb' =>'required|integer',
            'isMovie18'=>'in:0,1',
            'isFinished'=>'in:0,1',
            'isMovieSeries'=>'in:0,1',
            'totalEpisode' =>'integer',
            'quality' =>'string',
            'publishedAt' =>'date',
            'createdAt' =>'date',
            'updatedAt' =>'date'
        ];
    }
}
