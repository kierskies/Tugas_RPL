<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/main_css.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/main_topnav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h2>Admin Menu</h2>

<div class="topnav">
    <a class="active" href="main_film">Film</a>
    <a href="main_studio">Studio</a>
{{--    <a href="#null">-Input Here-</a>--}}
{{--    <a href="#null">-Input Here-</a>--}}
    <a href="/" style="float: right">Keluar</a>
</div>

<div class="tab">
    <button class="tablinks" onclick="alert('Currently Editing Data.')">List Data</button>
    <button class="tablinks" onclick="alert('Currently Editing Data.')">Add Data</button>
    <button class="tablinks" onclick="openContent(event, 'Edit')" id="defaultOpen">Edit Data</button>a
</div>

<div id="Show" class="tabcontent">
    <h3>List Data</h3>
    <hr>
    <p>
        Currently Editing Data.
    </p>
</div>


<div id="Add" class="tabcontent">
    <h3>Add Data</h3>
    <hr>
    <p>
        Currently Editing Data.
    </p>
</div>


<div id="Edit" class="tabcontent">
    <h3>Edit Data</h3>
    <hr>
    <p>
        @foreach($film as $f)
            <form action="/main_film/film_update" method="post">
                <table>
                    {{ csrf_field() }}

                    <tr>
                        <td><input type="hidden" name="id" value="{{ $f->id_film }}"></td>
                    </tr>
                    <tr>
                        <td>Nama Film</td>
                        <td><input type="text" required="required" name="namafilm" value="{{ $f->judul }}"></td>
                    </tr>
                    <tr>
                        <td>Sinopsis</td>
                        <td><textarea required="required" name="sinopsis" >{{ $f->sinopsis }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Poster</td>
                        <td><input type="text" name="poster" required="required" value="{{ $f->poster_film }}"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Simpan Data"></td>
                    </tr>
                </table>
            </form>
        @endforeach
    </p>
</div>

<script>
    function openContent(evt, DataContent) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(DataContent).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>
</html>
