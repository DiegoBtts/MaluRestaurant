@if(count($appointment))
    @foreach($appointment as $item)
        <p class="p-2 border-bottom">{{$item->code}}</p>
    @endforeach
@endif