<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blogs;
use App\Http\Requests\BlogsRequest;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        // dd($file);
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

    public function update(Request $request)
    {

        $data = $request->all();
        $file = $request->image;
        $blog = Blogs::findOrFail($data['id']);

        $imageOld = $blog->image;

        // return $data;
        $file = $request->image;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));
        if(!empty($file)) {
            $data['image'] = $date.'_'.$file->getClientOriginalName();
        }else {
            $data['image'] = $imageOld;
        }

        if($blog->update($data)) {

            if(!empty($file)){
                unlink('upload/admin/blogs/'.$imageOld);
                $file->move('upload/admin/blogs', $date.'_'.$file->getClientOriginalName());
            }

            return $data;
        }else {
            return redirect()->back()->withErrors('Update blog fail');
        }

    }


    public function delete(Request $request) {
        $data = $request->all();
        $blog = Blogs::findOrFail($data['id']);
        // $dataBlog = Blogs::where('id',$data['id'])->get()->toArray();
        if(Blogs::where('id', $data['id'])->delete()) {
            unlink('upload/admin/blogs/'.$blog->image);
            return redirect()->back()->with('success',__('Delete Blog success'));
        }else {
            return redirect()->back()->withErrors('Delete Blog Error');
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
