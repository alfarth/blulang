<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $repository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function index()
    {
        return CourseResource::collection($this->repository->getAllCourses());

        // $arrCurso = Courses::limit(10)
        //     ->get()
        //     ->toJson
        //     (
        //         JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );

        // return $arrCurso;
    }

    public function show($id)
    {
        return new CourseResource($this->repository->getCourse($id));
    }
}
