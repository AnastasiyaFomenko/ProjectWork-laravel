<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorBookRequest;
use App\Http\Requests\GenreBookRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\TagBookRequest;
use App\Http\Requests\TranslatorBookRequest;
use App\Models\Book;
use App\Models\ReadCategory;
use App\Services\BookService;
use App\Http\Requests\BookRequest;
use App\Repository\BookRepository;
use App\Services\ReviewService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateReadCategoryBookRequest;

class BookController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(BookRepository $bookRepository)
    {
        $books = $bookRepository->getAllBook();
        return view('pages.books.list', compact('books'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request, BookService $bookService)
    {
        $nameId = $request->name_id;
        $ageLimitId = $request->age_limit_id;
        $annotationId = $request->annotation_id;
        $yearId = $request->year_id;
        $houseId = $request->house_id;
        $languageId = $request->language_id; 
        $bindingId = $request->binding_id;
        $typeId = $request->type_id;
        $ISBN = $request->ISBN;
        $cover = $request->file('cover');
        $bookService->create($nameId, $ageLimitId, $annotationId, $yearId, $houseId, $languageId, $bindingId, $typeId, $ISBN, $cover);

        return redirect()->route('books.index');
    }   

     /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('pages.books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, BookService $bookService, Book $book)
    {
        $nameId = $request->name_id;
        $ageLimitId = $request->age_limit_id;
        $annotationId = $request->annotation_id;
        $yearId = $request->year_id;
        $houseId = $request->house_id;
        $languageId = $request->language_id; 
        $bindingId = $request->binding_id;
        $typeId = $request->type_id;
        $ISBN = $request->ISBN;
        $id = $book->id;
        $cover = $request->file('cover');
        $bookService->update($nameId, $ageLimitId, $annotationId, $yearId, $houseId, $languageId, $bindingId, $typeId, $ISBN, $cover, $id);
        
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookService $bookService, Book $book)
    {
        $bookService->delete($book->id);
        return redirect()->route('books.index');
    }

    public function read_category(UpdateReadCategoryBookRequest $request, BookService $bookService, Book $book) {

        $userId = Auth::user()->id;
        $bookId = $book->id;
        $it_abandoned = $request->it_abandoned;
        $it_read = $request->it_read;
        $it_want_read = $request->it_want_read;
        $it_now_read = $request->it_now_read;
    
        $bookService->update_read_category($userId, $bookId, $it_abandoned, $it_read, $it_want_read, $it_now_read);
        return redirect()->route('books.show', compact('book'));
    }

    public function read_books(BookRepository $bookRepository) {
        $userId = Auth::user()->id;
        $books = $bookRepository->getReadBook($userId);
        return view('pages.read_category_books.read_books', compact('books'));
    }

    public function abandoned_books(BookRepository $bookRepository) {
        $userId = Auth::user()->id;
        $books = $bookRepository->getAbandonedBook($userId);
        return view('pages.read_category_books.abandoned_books', compact('books'));
    }

    public function now_read_books(BookRepository $bookRepository) {
        $userId = Auth::user()->id;
        $books = $bookRepository->getNowReadBook($userId);
        return view('pages.read_category_books.now_read_books', compact('books'));
    }

    public function want_read_books(BookRepository $bookRepository) {
        $userId = Auth::user()->id;
        $books = $bookRepository->getWantReadBook($userId);
        return view('pages.read_category_books.want_read_books', compact('books'));
    }

    public function add_author(Book $book) {
        return view('pages.books.add_author', compact('book'));
    }

    public function store_author(AuthorBookRequest $request, BookService $bookService, Book $book) {
        $author_id = $request->author_id;
        $book_id = $book->id;
        $bookService->addAuthor($book_id, $author_id);
        return redirect()->route('books.index');
    }

    public function add_genre(Book $book) {
        return view('pages.books.add_genre', compact('book'));
    }

    public function store_genre(GenreBookRequest $request, BookService $bookService, Book $book) {
        $genre_id = $request->genre_id;
        $book_id = $book->id;
        $bookService->addGenre($book_id, $genre_id);
        return redirect()->route('books.index');
    }

    public function add_tag(Book $book) {
        return view('pages.books.add_tag', compact('book'));
    }

    public function store_tag(TagBookRequest $request, BookService $bookService, Book $book) {
        $tag_id = $request->tag_id;
        $book_id = $book->id;
        $bookService->addTag($book_id , $tag_id);
        return redirect()->route('books.index');
    }

    public function add_translator(Book $book) {
        return view('pages.books.add_translator', compact('book'));
    }

    public function store_translator(TranslatorBookRequest $request, BookService $bookService, Book $book) {
        $translator_id = $request->translator_id;
        $book_id = $book->id;
        $bookService->addTranslator($book_id, $translator_id);
        return redirect()->route('books.index');
    }

    public function add_review(Book $book) {
        return view('pages.books.add_review', compact('book'));
    }

    public function store_review(ReviewRequest $request, ReviewService $reviewService, Book $book) {
        $name = $request->name;
        $text = $request->text;
        $userId = Auth::user()->id;
        $book_id = $book->id;
        $reviewService->create($name, $text, $userId, $book_id);
        return redirect()->route('books.index');
    }
}
