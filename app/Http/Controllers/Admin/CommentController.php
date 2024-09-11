<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class CommentController extends Controller
{
    public function  index() {
        $comments = Comments::with('product','user')->get();
        /* return $comments; */
        
        return view('admin.comment.index',compact('comments')); 
    }
    public function create()
    { 
        $users=User::all();
        $products=Product::all();
        
        return view('admin.comment.create',compact('users','products'));  
    }
    public function store(Request $request)
    {
        /* return $request; */
        try {
            
           
            $comments= Validator::make($request->all(), [
                'body' => ['required', 'string', 'max:255'],
            ]);
            if ($comments->fails()) {
                
                return redirect()->route('admin.comment.create')
                            ->withErrors($comments)
                            ->withInput();
            }
            $comment=new Comments;
            $comment->body=$request->body;
            $comment->product_id=$request->product;
            $comment->user_id=$request->user;
            $comment->create_date=Carbon::now();
            $comment->save();
             
            // Add validity documents
           
            return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
            //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
        

            
        } catch (\Throwable $th) {
            return redirect()->route('admin.comment.create')->with(['error' => $th->getMessage()]);
        }
    }
    public function edit(string $id)
    {
        try {
            $comments = Comments::with('product','user')->Where('id',$id)->first();
            /* return $comments; */
            $users=User::all();
            $products=Product::all();
            
            return view('admin.comment.edit',compact('comments','users','products')); 
        } catch (\Throwable $th) {
            return redirect()->route('admin.comment.index')->with(['error' => $th->getMessage()]);
        }
       
    }
    public function update(Request $request)  {
        /* return $request; */
        try {
            $comment=Comments::where('id',$request->id)->first();
            $comments= Validator::make($request->all(), [
                'body' => ['required', 'string', 'max:255'],
            ]);
            if ($comments->fails()) {
                
                return redirect()->route('admin.comment.create')
                            ->withErrors($comments)
                            ->withInput();
            }
            
            $comment->body=$request->body;
            $comment->product_id=$request->product;
            $comment->user_id=$request->user;
            $comment->create_date=Carbon::now();
            $comment->save();
             
            // Add validity documents
           
            return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.comment.edit')->with(['error' => $th->getMessage()]);
        }
    }
    public function destroy($id)
    {
        /* return $id; */
        try {
            $comment= Comments::Where('id',$id)->first();
            /* return $user; */
            $comment->delete();

            return redirect()->route('admin.comment.index')->with('error', 'Customer Service has been delete successfully!');
            //return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.comment.index')->with(['error' => $th->getMessage()]);
        }
    }

}
