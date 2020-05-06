<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Testimonial;
use App\Http\Resources\Testimonial as TestimonialResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
        $testimonials = Testimonial::where('user_id',Auth::user()->id)->paginate(5);
        return TestimonialResource::collection($testimonials);
    }

    public function store(Request $request)
    {

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $testimonial = Testimonial::findOrFail($request->id);
            $testimonial->update($request->toArray());
        }else{
            // add
            $testimonial =Testimonial::create($request->toArray());
        }

        if ($testimonial->id){
            return new TestimonialResource($testimonial);
        }
    }


    public function show($id)
    {
        $testimonial = Testimonial::where([
            'id' => $id
        ])->first();

        return new TestimonialResource($testimonial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  array  $id
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::where([
            'id' => $id
        ])->first();

        if(!$this->is_auth($testimonial)){
            throw new Exception('Not Authenticated!');
        }

        if($testimonial->delete()){
            return ['data' => ['id' => $testimonial->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['nullable', 'string', 'max:255','min:3'],
            'title' => ['sometimes', 'string','min:3', 'max:255'],
            'company' => ['nullable', 'string','min:3', 'max:255'],
            'description' => ['sometimes', 'string','min:30', 'max:2500'],
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
