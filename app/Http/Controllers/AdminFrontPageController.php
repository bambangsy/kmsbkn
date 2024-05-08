<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Highlight;
use App\Models\Knowledge;
use App\Models\Path;
use App\Models\Course;

class AdminFrontPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $knowledge_highlight = Highlight::where('type', 'knowledge')->get();

        $knowledges = $knowledge_highlight->map(function ($highlight) {
            $knowledge = Knowledge::find($highlight->content_id);
            $highlight->name = $knowledge->name;
            return $highlight;
        });

        $path_highlight = Highlight::where('type', 'path')->get();
        $paths = $path_highlight->map(function ($highlight) {
            $path = Path::find($highlight->content_id);
            $highlight->name = $path->name;
            return $highlight;
        });

        $course_highlight = Highlight::where('type', 'course')->get();
        $courses = $course_highlight->map(function ($highlight) {
            $course = Course::find($highlight->content_id);
            $highlight->name = $course->name;
            return $highlight;
        });


        return view('admin.frontpage_management.frontpage_management', compact('knowledges', 'paths', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $value = $request->value;
        $list = ['knowledge', 'path', 'course'];

        if (in_array($value, $list)) {

            if ($value === 'knowledge') {
                $content = Knowledge::where('status', 1)->orderBy('updated_at', 'desc')->get();
            } else if ($value === 'path') {
                $content = Path::where('status', 1)->orderBy('updated_at', 'desc')->get();
            } else if ($value === 'course') {
                $content = Course::where('status', 1)->orderBy('updated_at', 'desc')->get();
            }

            return view('admin.frontpage_management.create_frontpage', compact('content', 'value'));
        } else {
            return redirect()->route('admin.frontpage_management');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $opsi = $request->opsi;
        $type = $request->value;
        $last_order = Highlight::where('type', $type)->orderBy('order', 'desc')->first();
        if (is_null($last_order)) {
            $newHighlight = new Highlight();
            $newHighlight->content_id = $opsi; // Assuming content_id value
            $newHighlight->type = $type; // Assuming type value
            $newHighlight->order = 1;
            $newHighlight->save();
        } else {
            $newHighlight = new Highlight();
            $newHighlight->content_id = $opsi; // Assuming content_id value
            $newHighlight->type = $type; // Assuming type value
            $newHighlight->order = $last_order->order + 1;
            $newHighlight->save();
        }

        return redirect()->route('admin.frontpage_management');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $type =  $request->deleted_value;
        $highlight = Highlight::find($id);
        $order = $highlight->order;
        $highlight->delete();

        Highlight::where('order', '>', $order)->where('type', $type)->decrement('order');

        return redirect()->route('admin.frontpage_management');
    }
}
