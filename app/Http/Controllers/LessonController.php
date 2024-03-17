<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Lesson;
use Inertia\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::get();

        $data = [
            'lessons' => $lessons,
            // 'message'=>$message,
        ];
        return Inertia::render('LessonManagement', [
            'response' => $data,
        ]);
    }
    public function addLesson(Request $request)
    {
        $message = '';
        // dd($request->all());

        try {
            $path = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path =  $image->store('images', 'images');
            }

            Lesson::create([
                'lesson_name' => $request->name,
                'lesson_description' => $request->description,
                'lesson_picture' => $path,

            ]);
            $message = '新增成功';
        } catch (\Throwable $th) {
            $message = '新增失敗';
        };

        return redirect('/lesson-management')->with(['message' => $message]);
    }
    public function bringEditData(Request $request){
        $data=[
            'id'=> $request->id,
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $request->image,    
        ];
        return Inertia::render('EditLesson',[
            'response'=>$data,
        ]);
    }
    public function replaceEditData(Request $request){
        // dd($request->lesson_id);
        $lesson = Lesson::find($request->lesson_id);

        // $message='';
        $lesson->update([
            'lesson_name'=>$request->name,
            'lesson_description'=>$request->description,
            'lesson_picture'=>$request->image,
        ]);
        return redirect('/lesson-management');
        
        // try {
            
        //     $message='更改成功';
        // } catch  (\Throwable $th){
        //     $message='更改失敗';
        // }
        // return redirect('/lesson-management')->with(['message' => $message]);
    }
}
