Hello

<form action="/generate" method="post">
    @csrf
    <input type="text" name="first">
    <input type="text" name="last">
    <button type="submit">Generate !</button>
</form>