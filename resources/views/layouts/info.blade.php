@if(\Request::has('from'))
<p class="bg-info" id="form-tip">
    @if(\Request::input('from') == 'del')
        @if(\Request::input('status') == 'success')
        {{ lang('delete success') }}
        @else
        {{ lang('delete failed') }}
        @endif
    @elseif(\Request::input('from') == 'update')
        @if(\Request::input('status') == 'success')
        {{ lang('update success') }}
        @else
        {{ lang('update failed') }}
        @endif
    @elseif(\Request::input('from') == 'show')
        @if(\Request::input('status') == 'failed')
        {{ lang('can not show') }}
        @endif
    @endif
</p>
@endif