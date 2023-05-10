<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Exception;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Laravel\Scout\Searchable;

class BookController extends Controller
{
    use InteractsWithDatabase;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'asc')->paginate(12);
        return view('book.index', compact('books' ))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::latest()->paginate(7);
        return view('book.manager', compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'author' => 'required|max:255',
                'publisher' => 'required|max:255',
                'price' => 'required|numeric',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $book = new Book;
            $book->title = $request->get('title');
            $book->description = $request->get('description');
            $book->author = $request->get('author');
            $book->publisher = $request->get('publisher');
            $book->price = $request->get('price');

            // Upload images
            $book->images = $request->file('images')->move('storage/images');
            $book->save();

            return redirect(route('manager'))->with('success', 'Thêm sách thành công !');
        } catch (ValidationException $exception) {
            return redirect()->back()->with('fail','Thêm sách không thành công. Vui lòng kiểm tra lại thông tin !');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::all();
        $books = Book::orderBy('title', 'asc')->paginate(5);
        return view('book.manager', compact('books', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->get('title');
        $book->description = $request->get('description');
        $book->author = $request->get('author');
        $book->publisher = $request->get('publisher');
        $book->price = $request->get('price');

        // Upload images
        if ($request->hasFile('images')) {
            $book->images = $request->file('images')->move('storage/images');
        }

        $book->save();

        return redirect(route('manager'))->with('status', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $book = \App\Models\Book::findOrFail($id);
        $book->delete();

        return redirect()->back();
    }

    public function detail($id)
    {
        $book = Book::findOrFail($id);
        return view('book.detail', ['books' => $book]);
    }

    public function pagination(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::orderBy('created_at', 'asc')->paginate(12);
            return view('book.pagination_books', compact('books'))->render();
        }
    }

    public function paginationManager(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::orderBy('created_at', 'asc')->paginate(5);
            return view('book.pagination_manager', compact('books'))->render();
        }
    }

    public function searchBook(Request $request)
    {
        $books = Book::where('title', 'like', '%' . $request->search_string . '%')
            ->orWhere('author', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'asc')
            ->paginate(12);

        if ($books->count() >= 1) {
            return view('book.pagination_books', compact('books'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }

}
