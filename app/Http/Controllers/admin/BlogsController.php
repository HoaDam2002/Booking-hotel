<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blogs;
use App\Http\Requests\BlogsRequest;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blogs::all()->toArray();

        $data = Blogs::paginate(10);
        return view('admin.pages.blogs.blog', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function insert(Request $request, BlogsRequest $BlogsRequest) {
        $data = $request->all();

        // dd($request->all());
        $file = $request->image;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));
        if(!empty($file)) {
            $data['image'] = $date.'_'.$file->getClientOriginalName();
        }

        if(Blogs::create($data)) {
            if(!empty($file)) {
                $file->move('upload/admin/blogs', $date.'_'.$file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Add Blog Success'));
        }else {
            return redirect()->back()->withErrors('Add Blog Fail');
        }
        
    }


    public function edit(Request $request) {
        $data = $request->all();
        // $data = $data['id'];
        $dataBlog = Blogs::where('id',$data['id'])->get()->toArray();
        return $dataBlog;
    }

    public function update(Request $request, string $id)
    {   
        
        $data = $request->all();
        $file = $request->image;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));
        if(!empty($file)) {
            $data['image'] = $date.'_'.$file->getClientOriginalName();
        }

        if(Blogs::update($data)) {
            return redirect()->back()->with('success', __('Update blog success'));
        }else {
            return redirect()->back()->withErrors('Update blog fail');
        }
        
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
