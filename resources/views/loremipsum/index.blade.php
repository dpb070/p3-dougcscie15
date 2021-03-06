@extends('layouts.master')
@section('navbar')
    <nav>
        <ul>
            <li><a href="loremipsum" id="nav_selected">Lorem Ipsum Generator</a></li>
            <li><a href="usergen">Random User Generator</a></li>
            <li><a href="passwordgen">Password Generator</a></li>
        </ul>
    </nav>
@stop
@section('formSection')
    <section id="form_section">
        <header>
            <h3>Lorem Ipsum Generator</h3>
        </header>
        <p>Enter a number of paragraphs
            ({{ $paragraphLowerLimit}} - {{ $paragraphUpperLimit}})
        </p>
        <form method='POST' action='/loremipsum'>
            {{ csrf_field() }}
            <input type="text" name="paragraphCount">
            <input type="submit" value="Submit">
        </form>
        <div @if($errors->get('paragraphCount'))
                        class="error_display"
                        @else
                        class="error_hide"
                        @endif>
            @if($errors->get('paragraphCount'))
                @foreach($errors->get('paragraphCount') as $error)
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
            <h3>Lorem Ipsum Text</h3>
        </header>
        {!! $loremIpsumText or '' !!}
    </section>
@stop
