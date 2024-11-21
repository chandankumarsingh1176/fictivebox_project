<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\BookRating;

class BookController extends Controller
{
    function add_book()
    {
        return view('add_book');
    }


    public function book_submit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:191',
            'author_name' => 'required',
            'category' => 'required',
            'book_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image file
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator) // Return validation errors
                ->withInput();          // Retain old input data
        }
        if ($request->hasFile('book_pic') && $request->file('book_pic')->isValid()) {
            $file = $request->file('book_pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('books', $fileName, 'public');

            Book::create([
                'book_name' => $request->input('book_name'),
                'book_author' => $request->input('author_name'),
                'category' => $request->input('category'),
                'book_pic' => $fileName, // Store the file path in the database
            ]);

            // Step 4: Redirect with a success message
            return redirect()->back()->with('success', 'Book uploaded successfully!');
        }
    }

    public function book_list(Request $request)
    {
        $query = Book::query();
        if ($request->filled('book_name')) {
            $query->where('book_name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('book_author')) {
            $query->where('book_author', 'like', '%' . $request->email . '%');
        }

        $books = $query->paginate(6);
        return view('book_list', compact('books'));
    }


    public function user_book_list(Request $request)
    {
        $query = Book::query();
        if ($request->filled('book_name')) {
            $query->where('book_name', 'like', '%' . $request->book_name . '%');
        }

        if ($request->filled('author_name')) {
            $query->where('book_author', 'like', '%' . $request->author_name . '%');
        }

        $books = $query->paginate(6);
        return view('user_book_list', compact('books'));
    }


    public function book_delete($id)
    {
        $user = Book::findOrFail($id);
        $user->delete();
        return redirect('book-list')->with('success', 'Book Deleted successfully!');
    }
    public function book_edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book_edit', compact('book'));
    }

    public function book_update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Validation
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:191',
            'book_author' => 'required|max:191',
            'category' => 'required',
            'book_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update book details
        $book->book_name = $request->input('book_name');
        $book->book_author = $request->input('book_author');
        $book->category = $request->input('category');

        // Handle file upload if a new file is provided
        if ($request->hasFile('book_pic')) {
            // Delete old image if it exists
            if ($book->book_pic && file_exists(storage_path('app/public/books/' . $book->book_pic))) {
                unlink(storage_path('app/public/books/' . $book->book_pic));
            }

            // Store new file
            $filePath = $request->file('book_pic')->store('books', 'public');
            $book->book_pic = basename($filePath);
        }

        $book->save();

        return redirect('book-list')->with('success', 'Book updated successfully!');
    }
    public function rateBook(Request $request, $id)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        // Find the book to ensure it exists
        $book = Book::findOrFail($id);

        // Check if the user has already rated the book
        $existingRating = BookRating::where('book_id', $id)
            ->where('user_id', session('user_id'))  // Retrieve the user ID from the session
            ->first();

        if ($existingRating) {
            // If a rating already exists, update the rating and comment
            $existingRating->rateing = $request->rating;
            $existingRating->comments = $request->comment;
            $existingRating->save();
        } else {
            // If no rating exists, create a new entry
            BookRating::create([
                'book_id' => $id,
                'user_id' => session('user_id'),
                'rateing' => $request->rating,
                'comments' => $request->comment,
            ]);
        }

        // Calculate and update the average rating for the book
        $averageRating = BookRating::where('book_id', $id)->avg('rateing');
        $book->rating = $averageRating;  // Assuming `rating` is a column in the `books` table
        $book->save();

        return redirect()->back()->with('success', 'Rating saved successfully!');
    }
}
