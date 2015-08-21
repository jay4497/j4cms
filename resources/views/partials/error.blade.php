@if(count($errors->all()) > 0)
<p class="bg-warning" id="form-tip">
    @foreach($errors->all() as $err)
    {{ $err }}<br/>
    @endforeach
</p>
@endif