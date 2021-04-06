<div class="btn-group" role="group" aria-label="@lang('labels.backend.access.categories.category_actions')">
    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" title="@lang('messages.edit')" class="btn">
        <i class="fas fa-edit"></i>
    </a>
    <a
        href="#"
        name="confirm_item"
        class="btn"
        title="@lang('messages.delete_permanently')"
        onclick="event.preventDefault(); if(confirm('Are you sure')){ document.getElementById('delete_permanently_form_{{ $category->id }}').submit(); return true  } else { return false }">
        <i class="far fa-trash-alt"></i>
    </a>
    <form id="delete_permanently_form_{{ $category->id }}" action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>
