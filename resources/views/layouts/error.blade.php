@if(count($errors->all()) > 0)
<p class="bg-warning">
    @foreach($errors->toArray() as $err)
    {{ $err }}<br/>
    @endforeach
</p>
@endif