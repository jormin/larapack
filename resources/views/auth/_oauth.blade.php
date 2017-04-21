<span class="oauth text-center pull-right">
    <a href="{{ route('login.redirect','github') }}">
        <i class="fa fa-github"></i>
    </a>
    {{--<a href="{{ route('login.redirect','facebook') }}">--}}
        {{--<i class="fa fa-facebook"></i>--}}
    {{--</a>--}}
    {{--<a href="{{ route('login.redirect','twitter') }}">--}}
        {{--<i class="fa fa-twitter"></i>--}}
    {{--</a>--}}
    {{--<a href="{{ route('login.redirect','google') }}">--}}
        {{--<i class="fa fa-google"></i>--}}
    {{--</a>--}}
    {{--<a href="{{ route('login.redirect','wechat') }}">--}}
        {{--<i class="fa fa-wechat"></i>--}}
    {{--</a>--}}
    <a href="{{ route('login.redirect','weibo') }}">
        <i class="fa fa-weibo"></i>
    </a>
    <a href="{{ route('login.redirect','qq') }}">
        <i class="fa fa-qq"></i>
    </a>
</span>

@push('styles')
<style>
    .oauth{
        font-size: 16px;
    }
    .oauth a{
        margin-right: 5px;
    }
    .oauth a:hover{
        cursor: pointer;
    }
</style>
@endpush