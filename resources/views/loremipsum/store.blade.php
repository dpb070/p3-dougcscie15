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
    <section class="lh_section">
        <header>
            <h3>Loremipsum Generator (store)</h3>
        </header>
        <form method='POST' action='/loremipsum'>
            {{ csrf_field() }}
            <input type='text' name='paragraphCount'>
            <input type='submit' value='Submit'>
        </form>
    </section>
    <section class="rh_section">
        <header>
            <h3>Text</h3>
        </header>
        Form here with para= {{ $paragraphCount }}
    </section>
    <footer>
        Doug Bradley
        CSCIE-15
        Project 3
        Due 10/27/2016
    </footer>

</body>
</html>
