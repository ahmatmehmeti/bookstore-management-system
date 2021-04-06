<div class="btn-group" role="group" aria-label="@lang('labels.backend.access.books.book_actions')">
    <a href="{{ route('books.edit', ['book' => $book->id]) }}" title="@lang('messages.edit')" class="btn">
        <i class="fas fa-edit"></i>
    </a>
    <a
        href="#"
        name="confirm_item"
        class="btn"
        title="@lang('messages.delete_permanently')"
        onclick="event.preventDefault(); if(confirm('Are you sure')){ document.getElementById('delete_permanently_form_{{ $book->id }}').submit(); return true  } else { return false }">
        <i class="far fa-trash-alt"></i>
    </a>
    <form id="delete_permanently_form_{{ $book->id }}" action="{{ route('books.destroy', ['book' => $book]) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>

