
<form action="{{ route('users.store') }}" method="post">
    @csrf
    Nome:   <input type="text" name="name">
    e-Mail: <input type="email" name="email">
    Senha:  <input type="password" name="password">

    <button type="submit"> Cadastrar </button>
</form>