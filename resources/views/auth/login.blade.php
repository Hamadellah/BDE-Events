<form method="post" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    <button type="submit" class="btn btn-primary">Login</button>
</form>