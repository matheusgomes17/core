@if (auth()->user() && session()->has("admin_user_id") && session()->has("temp_user_id"))
    <div class="alert alert-warning logged-in-as mb-0">
        Você está logado como {{ auth()->user()->name }}. <a href="{{ route("frontend.auth.logout-as") }}">Re-Login como {{ session()->get("admin_user_name") }}</a>.
    </div><!--alert alert-warning logged-in-as-->
@endif