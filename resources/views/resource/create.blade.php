@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col m12 s12">
            <div class="card-panel">
                <h5 class="">New resource</h5>
                <form method="POST" action="{{ route('create.resource') }}">
                    @csrf
                    <div class="row">
                      <div class="col m6">
                        <div class="input-field">
                          <input type="hidden" hidden name="user_id" value="{{ Auth::user()->id }}">
                          <input placeholder="Resource title" id="title" type="text" name="title" class="validate">
                          <label for="title">Resource title</label>
                        </div>
                      </div>
                      <div class="col m6">
                          <div class="input-field">
                            <select name="category" id="resource_category">
                              <option value="" disabled selected>Resource Category</option>
                              <option value="1">Article</option>
                              <option value="2">Lesson plan</option>
                              <option value="3">Skill builder</option>
                            </select>
                            <label>Resource Category</label>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col m6">
                          <div class="input-field">
                            <select name="level">
                              <option value="" disabled selected>Level</option>
                              <option value="1">Beginner</option>
                              <option value="2">Lower-intermediate</option>
                              <option value="3">Intermediate</option>
                              <option value="4">Upper-intermediate</option>
                              <option value="5">Advanced</option>
                            </select>
                            <label>Level</label>
                          </div>
                        </div>
                        <div class="col m6">
                      <div class="input-field">
                        <select name="skill">
                          <option value="" disabled selected>Skill</option>
                          <option value="1">All</option>
                          <option value="2">Reading</option>
                          <option value="3">Writing</option>
                          <option value="4">Listening</option>
                          <option value="5">Speaking</option>
                          <option value="6">Grammar</option>
                        </select>
                        <label>Skill</label>
                      </div>     
                        </div>
                    </div>

                    <div class="center-align">
                      <button type="submit" class="btn black" href="">Create resource</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



@endsection
