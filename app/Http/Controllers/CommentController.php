<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Shop;
use App\ptag;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $users = User::all();
            $shops = Shop::all();
            $ptags = ptag::all();
            // echo 'aaaa';
            $comments = Comment::orderBy('id','asc')
                ->where('content','like', '%'.request()->keywords.'%')
                ->paginate(5);
        return view('admin.comment.index',compact('comments','users','shops','ptags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);

       
        if($comment->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()-with('error','删除失败');
        }
    }

    public function haoping()
    {
        $shop_id = $_POST['shop_id'];
        $hao = $_POST['hao'];
        $comment = Comment::where('shop_id',$shop_id)
                    ->where('com_id',$hao)
                    ->get()->load('user')->load('flavor')->load('pack');
        // foreach($comment as $v){
        //     echo $v->user->uname;
        //     echo $v->user->image;
        //     echo $v->created_at;
        //     echo $v->content;
        //     echo $v->flavor->fname;
        //     echo $v->pack->pname;
        // }
        echo $comment;

    }
}
