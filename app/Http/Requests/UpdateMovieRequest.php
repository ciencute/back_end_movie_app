<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            //
            'id' => 'integer',
            'title' => 'string',
            'original_title' =>'string',
            'img' =>'file',
            'url' => 'file',
            'embededCode'=>'string',
            'trailerKey'=>'string',
            'directorId' =>'integer',
            'bgImg' =>'file',
            'description'=>'string',
            'countryId' =>'integer',
            'duration' =>'integer',
            'viewCount' =>'integer',
            'categoryId' =>'integer',
            'slug' =>'string',
            'imdb' =>'integer',
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
