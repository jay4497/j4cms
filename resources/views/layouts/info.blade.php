@if(\Session::has('from'))
<p class="bg-info" id="form-tip">
    @if(\Session::get('from') == 'del')
        @if(\Session::get('status') == 'success')
        {{ lang('delete success') }}
        @else
        {{ lang('delete failed') }}
        @endif
    @elseif(\Session::get('from') == 'update')
        @if(\Session::get('status') == 'success')
        {{ lang('update success') }}
        @else
        {{ lang('update failed') }}
        @endif
    @elseif(\Session::get('from') == 'show')
        @if(\Session::get('status') == 'failed')
        {{ lang('can not show') }}
        @endif
    @endif
</p>
@endif