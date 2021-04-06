@if(auth()->user()->isPostier() && $order->status === 'pending')

    <div class="btn-group" role="group">
        <form action="{{ route('orders.accept', $order->id) }}" method="POST">
              @csrf
              @method('POST')

              <button class="form-control" type="submit">Accept</button>
        </form>
    </div>
@elseif(auth()->user()->isUser() && $order->status === 'delivering')
    <div class="btn-group" role="group">
        <form action="{{ route('orders.delivered', $order->id) }}" method="POST">
            @csrf
            @method('POST')

            <button class="form-control" type="submit">Delivered</button>
        </form>
    </div>
@else
    @if($order->status === 'pending')
        <div class="btn-group" role="group">
            <a href="{{ route('orders.edit', $order->id) }}" title="@lang('messages.edit')" class="btn">
                <i class="fas fa-edit"></i>
            </a>
            <a
                href="#"
                name="confirm_item"
                class="btn"
                title="@lang('messages.delete_permanently')"
                onclick="event.preventDefault(); if(confirm('Are you sure')){ document.getElementById('delete_permanently_form_{{ $order->id }}').submit(); return true  } else { return false }">
                <i class="far fa-trash-alt"></i>
            </a>
            <form id="delete_permanently_form_{{ $order->id }}"
                  action="{{ route('orders.destroy', ['order' => $order]) }}"
                  method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    @else
        <p>Book is status is '{{$order->status}}'</p>
    @endif
@endif
