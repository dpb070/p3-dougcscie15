@extends('layouts.master')
@section('navbar')
    <nav>
        <ul>
            <li><a href="loremipsum">Lorem Ipsum Generator</a></li>
            <li><a href="usergen">Random User Generator</a></li>
            <li><a href="passwordgen" id="nav_selected">Password Generator</a></li>
        </ul>
    </nav>
@stop
@section('formSection')
    <section id="form_section">
        <header>
            <h3>xkcd-style Password Generator</h3>
        </header>
        <p>Enter number of words
            ({{ $pwMinWords}} - {{ $pwMaxWords}})
        </p>
        <form method='POST' action='/passwordgen'>
            {{ csrf_field() }}
            <div>
                <input type='text' name='wordCount'>
            </div>
            <div class="submit_options">
                <label>Replace one word with number</label>
                <input type="checkbox" name="numberFlag" value="1">
            </div>
            <div class="submit_options">
                    <label>Add a special symbol</label>
                    <input type="checkbox" name="symbolFlag" value="1">
            </div>
            <div class="submit_options">
                  <label>Word separator</label>
                  <input type="radio" name="wordSeparator" value="space" checked>Space
                  <input type="radio" name="wordSeparator" value="hyphen">Hyphen
            </div>
            <div class="submit_options">
                <input type='submit'>
            </div>
        </form>
        <div @if($errors->get('wordCount'))
                        class="error_display"
                        @else
                        class="error_hide"
                        @endif>
            @if($errors->get('wordCount'))
                @foreach($errors->get('wordCount') as $error)
                <p>{{ $error }}</p>
                @endforeach
            @else
                <p>Errors Here</p>
            @endif
        </div>
    </section>
@stop
@section('resultsSection')
    <section id="results_section">
        <header>
            <h3>Password</h3>
        </header>
        {{ $password or ''}}
    </section>
@stop
