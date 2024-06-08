<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BlockRequest;
use App\Models\Block;

class BlockController extends Controller
{
    //
    public function show(){
        $block = DB::table('block')->select('id','image','title','content')->get();
        return view('admin.block.show',compact('block'));
    }

    public function add(){
        return view('admin.block.add');
    }

    public function handleAdd(Request $request){
        if($request->isMethod('POST')){
            if($request->hasFile('image')){
                $image = $request->file('image');
                $title = $request->input('title');
                $content = $request->input('content');

                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
            }
            Block::create(['image' => $image, 'title' => $title, 'content' => $content]);

        }

        return redirect()->route('show-block');
    }

    public function edit(Request $request,$id){
        $block = Block::where('id',$id)->first();
        return view('admin.block.edit',compact('block'));
    }

    public function handleEdit(Request $request,$id){
        if($request->isMethod('POST')){
            if($request->hasFile('image')){
                $image = $request->file('image');
                $title = $request->input('title');
                $content = $request->input('content');

                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
            }
            Block::where('id',$id)->update(['image' => $image, 'title' => $title, 'content' => $content]);
        }

        return redirect()->route('show-block');
    }

    public function delete($id){
        Block::where('id',$id)->delete();
        return redirect()->route('show-block');
    }
}
