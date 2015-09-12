@if($nav->children)
    <tr>
        <td colspan="6" class="sub-nav">
            <table class="table">
                @forelse($nav->children as $snav)
                <tr>
                    <td><input type="checkbox" value="{{ $snav->id }}" /></td>
                    <td>{{ $snav->title }}({{ $snav->order }})</td>
                    <td>{{ $snav->url }}</td>
                    <td>{{ $snav->node->name }}</td>
                    <td>{{ $snav->status }}</td>
                    <td>
                        <a href="{{ action('Admin\NavigateController@getUpdate', ['act' => 'edit', 'id' => $nav->id]) }}">{{ lang('edit') }}</a>
                        <a href="{{ action('Admin\NavigateController@getUpdate', ['act' => 'delete', 'id' => $nav->id]) }}">{{ lang('delete') }}</a>
                    </td>
                </tr>
                @if($snav->children)
                    @include('layouts.navigate', ['nav' => $snav])
                @endif
                @empty
                <tr><td colspan="6">{{ lang('no data') }}</td></tr>
                @endforelse
            </table>
        </td>
    </tr>
@endif