@if($node->children)
<tr>
    <td colspan="{{ $cols }}" class="sub-nav">
        <table class="table">
            @forelse($node->children as $snode)
            <tr>
                <td><input type="checkbox" value="{{ $snode->id }}" /> </td>
                <td>{{ $snode->id }}</td>
                <td>{{ $snode->name }}({{ $snode->order }})</td>
                <td>{{ $snode->path }}</td>
                <td>
                    <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'edit', 'id' => $snode->id]) }}">{{ lang('edit') }}</a>
                    <a href="{{ action('Admin\NodeController@getUpdate', ['act' => 'del', 'id' => $snode->id]) }}">{{ lang('delete') }}</a>
                </td>
            </tr>
            @if($snode->children)
                @include('layouts.node', ['node' => $snode, 'cols' => 5])
            @endif
            @empty
            <tr><td colspan="{{ $cols }}">{{ lang('no data') }}</td></tr>
            @endforelse
        </table>
    </td>
</tr>
@endif