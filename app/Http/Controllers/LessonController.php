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
    public function bringEditData(Request $request)
    {
        $data = [
            'lesson_id' => $request->lesson_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ];
        return Inertia::render('EditLesson', [
            'response' => $data,
        ]);
    }


    public function replaceEditData(Request $request)
    {   
        // dd($request->all());
        // dd($request->lesson_id);
        // 使用 find 方法根據 lesson_id 找到對應的課程記錄
        $lesson = Lesson::get($request->lesson_id);
        dd($lesson);

        // 如果找到課程，則更新相應的欄位
        
            $lesson->update([
                'lesson_name' => $request->name,
                'lesson_description' => $request->description,
                'lesson_picture' => $request->image,
            ]);
        

        // 返回到課程管理列表或其他相應頁面
        return redirect('/lesson-management');
    }
}
