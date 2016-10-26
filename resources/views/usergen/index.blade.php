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
        <p>Enter a number of users
            ({{ $userLowerLimit}} - {{ $userUpperLimit}})
        </p>
        <form method='POST' action='/usergen'>
            {{ csrf_field() }}
            <input type="text" name="userCount">
            <div class="submit_options">
                <label>Include birth date</label>
                <input type="checkbox" name="dobFlag" value="1" checked>
                <label>Include profile</label>
                <input type="checkbox" name="profileFlag" value="1" checked>
            </div>
            <input type="submit" value="Submit">
        </form>
        <div @if($errors->get('userCount'))
                        class="error_display"
                        @else
                        class="error_hide"
                        @endif>
            @if($errors->get('userCount'))
                @foreach($errors->get('userCount') as $error)
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
            <h3>Users</h3>
        </header>
        @if (isset($firstName))
            <table>
                <thead>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        @if (isset($dobFlag))
                            <td>Date of Birth</td>
                        @endif
                        @if (isset($profileFlag))
                            <td>Profile</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < $userCount; $i++)
                    <tr>
                        <td>{{ $firstName[$i] }}</td>
                        <td>{{ $lastName[$i] }}</td>
                        @if (isset($dobFlag))
                            <td>{{ $dateOfBirth[$i]}}
                        @endif
                        @if (isset($profileFlag))
                            <td>{{ $profile[$i] }}
                        @endif
                    </tr>
                    @endfor
                </tbody>
            </table>
        @endif
    </section>
@stop
