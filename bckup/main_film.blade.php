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
    <button class="tablinks" onclick="openContent(event, 'Show')" id="defaultOpen">List Data</button>
    <button class="tablinks" onclick="openContent(event, 'Add')">Add Data</button>
    <button class="tablinks" onclick="alert('Pilih Data Terlebih Dahulu !')">Edit Data</button>
</div>

<div id="Show" class="tabcontent">
    <h2>List Data {{--| <a style="font-size: 15px">+ Tambah Data</a>--}}</h2>
    <hr>
    <p><table class="table table-bordered">
        <thead class="thead-dark">
{{--        <col width="100">--}}
{{--        <col width="250">--}}
{{--        <col width="200">--}}
{{--        <col width="250">--}}
{{--        <col width="200">--}}
        <tr>
            <th scope="col" width="80px">ID Film</th>
            <th scope="col" width="250px">Nama Film</th>
            <th scope="col">Sinopsis Film</th>
            <th scope="col">Poster</th>
            <th scope="col" width="150px">Opsi</th>
        </tr>
        </thead>
        @foreach($film as $f)
            <tr>
                <th scope="row" style="text-align: center">{{ $f->id_film }}</th>
                <td >{{ $f->judul }}</td>
                <td >{{ $f->sinopsis }}</td>
                <td align="center">{{ $f->poster_film }}</td>
                <td align="center">
                    <a href="main_film/film_edit/{{ $f->id_film }}">Edit</a>
                    |
                    <a href="main_film/film_delete/{{ $f->id_film }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table></p>
</div>

<div id="Add" class="tabcontent">
    <h3>Add Data</h3>
    <hr>
    <p>
    <form action="main_film/film_storedata" method="post" enctype="multipart/form-data">
        <table>
            {{ csrf_field() }}

            <tr>
                <td>ID Film</td>
                <td><input type="text" name="id" required="required"></td>
            </tr>
            <tr>
                <td>Nama Film</td>
                <td><input type="text" name="namafilm" required="required"></td>
            </tr>
            <tr>
                <td>Sinopsis</td>
                <td><textarea name="sinopsis" required="required"></textarea></td>
            </tr>
            <tr>
                <td>Poster</td>
                <td><input type="text" name="poster" required="required"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
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
