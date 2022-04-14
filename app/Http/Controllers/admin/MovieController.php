<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\DeleteMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Repository\MovieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use Storage;

class MovieController extends  Controller
{
    protected $movieRepo;
    public function __construct(MovieRepository $movieRepo)
    {
        parent::__construct();
        $this->movieRepo = $movieRepo;

    }
    /**
     * get latest
     * @authenticated
     */
    public function getLatest() {
        return $this->movieRepo->getLatestMovie();
    }
    /**
     * Deletemove
     * @authenticated
     */
    public function delete(DeleteMovieRequest $request) {
        return $this->movieRepo->delete($request->id);
    }
    /**
     * create movie
     * @authenticated
     */
    public function create(CreateMovieRequest $request) {
        return $this->movieRepo->create(array_merge($request->validated() ,$this->uploadMovieFile($request)));
    }
    /**
     * Update movie by Id
     * @authenticated
     */
    public function update(UpdateMovieRequest $request) {
        return $this->movieRepo->update($request->id , $request->except(['id']));
    }

    #[ArrayShape(['img' => "string", 'url' => "string", 'bgImg' => "string"])] private function uploadMovieFile($request){
//        $moviePath = "/".Storage::putFileAs("videos/".Str::slug($request->title) ,$request->file('url'), $request->file('url')->getClientOriginalName());
//        $imagePath = "/".Storage::putFileAs("images/".Str::slug($request->title), $request->file('img'), $request->file('img')->getClientOriginalName());
//        $bgPath = "/".Storage::putFileAs("images/id".Str::slug($request->title), $request->file('img'), $request->file('img')->getClientOriginalName());
        $moviePath ="/". Storage::disk("public_uploads")->putFileAs("videos/".Str::slug($request->title) ,$request->file('url'), $request->file('url')->getClientOriginalName());
        $imagePath = "/".Storage::disk("public_uploads")->putFileAs("images/".Str::slug($request->title), $request->file('img'), $request->file('img')->getClientOriginalName());
        $bgPath = "/".Storage::disk("public_uploads")->putFileAs("images/bg/".Str::slug($request->title), $request->file('img'), $request->file('img')->getClientOriginalName());

        return [
            'img' =>$imagePath,
            'url' => $moviePath,
            'bgImg'=>$bgPath
        ];
    }


}
