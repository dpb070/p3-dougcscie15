<!doctype html>
<html lang="en">
<head>
    <!-- Doug Bradley -->
    <!-- CSCIE-15  -->
    <!-- P3 -->
    <meta charset="UTF-8">
    <title>CSCIE-15 Project 3</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="css/p3.css" rel="stylesheet">

</head>
<body>
    <header>
        <h1>Project 3 - Programmer's Best Friend</h1>
    </header>
    <nav>
        <ul>
            <li><a href="loremipsum" id="nav_selected">Lorem Ipsum Generator</a></li>
            <li><a href="usergen">Random User Generator</a></li>
            <li><a href="passwordgen">Password Generator</a></li>
        </ul>
    </nav>
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
    <section id="results_section">
        <header>
            <h3>Lorem Ipsum Text</h3>
        </header>
        {!! $loremIpsumText or '' !!}
    </section>
    <footer>
        Doug Bradley
        CSCIE-15
        Project 3
        Due 10/27/2016
    </footer>

</body>
</html>
