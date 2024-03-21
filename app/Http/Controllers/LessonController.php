<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Lesson;
use App\Notifications\UserMessage;
use Inertia\Controller;
use Illuminate\Http\Request;
use App\Services\FilesService;
use Illuminate\Support\Facades\File;
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

        return redirect('/lesson')->with(['message' => $message]);
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
        $lesson = Lesson::find($request->lesson_id);
        // dd($lesson);

        // 如果找到課程，則更新相應的欄位

        $lesson->update([
            'lesson_name' => $request->name,
            'lesson_description' => $request->description,
            'lesson_picture' => $request->image,
        ]);

        if (file_exists(public_path() . $lesson->photo)) {
            File::delete((public_path() . $lesson->photo));
        } else {
            $path = $lesson->photo;
        }


        // 返回到課程管理列表或其他相應頁面
        return redirect('/lesson');
    }
    public function deleteLesson($id, FilesService $filesService)
    {
        $lesson = Lesson::find($id);

        $filesService->deleteFile($lesson->image);
        
    }

    // teacher controller
    // public function store(Request $request){
    //     Teacher::Create([
    //         $id=>$request->courseId,
    //         'name'=>$request->name,
    //     ]);
    // }


    // teacher create 關聯
    // public function create()
    // {
    //     $teachers = Teacher::with('course')->get();
        
    //     $newTeachers = $teachers->map(function ($teacher){
    //         return[
    //             'id'=>$teacher->id,
    //             'name'=>$teacher->name,
    //             'course_id'=>$teacher->course_id,
    //             'course_name'=>$teacher?->course?->course_name??'',
    //         ];
    //     });
    //     return Inertia::render('SchduleFolder/ScheduleCreate',['response' => $newTeachers]);
    // }
        
    public function sendMail(){
        // dd(123);
        $user = User::find(1);
        $data=(object)[
            'title' => 'Hello',
            'content' => '我寄信給你囉',
        ];
        $user->notify(new UserMessage($data));

    }
}






