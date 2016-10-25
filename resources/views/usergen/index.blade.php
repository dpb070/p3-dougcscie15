@extends('layouts.master')
@section('navbar')
<nav>
    <ul>
        <li><a href="loremipsum">Lorem Ipsum Generator</a></li>
        <li><a href="usergen" id="nav_selected">Random User Generator</a></li>
        <li><a href="passwordgen">Password Generator</a></li>
    </ul>
</nav>
@stop
@section('formSection')
<section id="form_section">
    <header>
        <h3>Random User Generator</h3>
    </header>
</section>
@stop
@section('resultsSection')
<section id="results_section">
    <header>
        <h3>Users</h3>
    </header>
    <!-- {!! $loremIpsumText or '' !!} -->
</section>
@stop
