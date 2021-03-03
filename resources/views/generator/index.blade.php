@extends('layouts.navbar')
@section('content')

<div class="container">
    <div class="row">
        <form action="/generate" method="post">
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name">
                </div>
                <div class="col">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name">
                </div>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number">
            </div>
            <label for="email">Email</label>
            <div class="form-inline">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <button type="submit">Generate !</button>
        </form>
    </div>
</div>
@endsection