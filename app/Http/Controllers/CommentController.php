<?php

namespace App\Http\Controllers;

use App\Comment;
use Auth;
use Illuminate\Http\Request;
use App\Notifications\NewComment;
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($publication_id, Request $request)
    {
        $data = $request->validate([
            'content' => 'required|max:255'
        ]);
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'PENDIENTE'; //lo dejamos por defecto hasta que alguien lo apruebe, si quiere saltar ese paso dejar por defecto 'APROBADO'
        $data['publication_id'] = $publication_id;
        $comment = Comment::create($data);
        Auth::user()->notify(new NewComment($comment));
        return redirect()->route('publications.show', $publication_id)->with('success', 'Gracias por tu comentario, un moderador lo aprobará pronto!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect('/comments')->with('completed', 'El comentario ha sido eliminado exitosamente.');
    }
}
