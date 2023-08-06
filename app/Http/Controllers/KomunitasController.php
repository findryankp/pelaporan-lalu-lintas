<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komunitas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KomunitasController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts = Komunitas::latest()->paginate(5);
        return view('Komunitas.index', compact('posts'));
    }

    public function create(): View
    {
        return view('Komunitas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //create post
        Komunitas::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('komunitas.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function show(string $id): View
    {
        //get post by ID
        $post = Komunitas::findOrFail($id);

        //render view with post
        return view('Komunitas.show', compact('post'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $post = Komunitas::findOrFail($id);

        //render view with post
        return view('Komunitas.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //get post by ID
        $post = Komunitas::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Komunitas::findOrFail($id);

        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
