@foreach($navs as $nav)
    <option value="{{ $nav->id }}">{{ nodeIndent($nav->depth) }}{{ $nav->name }}</option>
    @if($nav->children)
        @include('partials.options.navigate', ['navs' => $snav->children])
    @endif
@endforeach