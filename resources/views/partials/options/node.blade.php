@foreach($nodes as $node)
    <option value="{{ $node->id }}">{{ nodeIndent($node->depth) }} {{ $node->name }}</option>
    @if($node->children)
        @include('partials.options.node', ['nodes' => $node->children])
    @endif
@endforeach