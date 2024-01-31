<form method="POST" action="{{route('manage.create')}}">
    @csrf
    <input name="title"  type="search" placeholder="Card title">
    <button class="btn  btn-primary">Create</button>
</form>
