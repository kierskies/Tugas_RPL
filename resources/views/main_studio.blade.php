<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/main_css.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/main_topnav.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<h2>Admin Menu</h2>

<div class="topnav">
    <a href="main_film">Film</a>
    <a class="active" href="main_studio">Studio</a>
    <a href="#null">-Input Here-</a>
    <a href="#null">-Input Here-</a>
    <a href="/" style="float: right">Keluar</a>
</div>

<div class="tab">
    <button class="tablinks" onclick="openContent(event, 'Show')" id="defaultOpen">List Studio</button>
    <button class="tablinks" onclick="openContent(event, 'Add')">Add Studio</button>
    <button class="tablinks" onclick="alert('Pilih Data Terlebih Dahulu !')">Edit Data</button>
</div>

<div id="Show" class="tabcontent">
    <h3>List Data</h3>
    <hr>
    <p><table>
        <col width="100">
        <col width="250">
        <tr>
            <th>ID Studio</th>
            <th>No Studio</th>
        </tr>
        @foreach($studio as $s)
            <tr>
                <td align="center">{{ $s->id_studio }}</td>
                <td >{{ $s->no_studio }}</td>
                <td align="center">
                    <a href="main_studio/studio_edit/{{ $s->id_studio }}">Edit</a>
                    |
                    <a href="main_studio/studio_delete/{{ $s->id_studio }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table></p>
</div>

<div id="Add" class="tabcontent">
    <h3>Add Data</h3>
    <hr>
    <p>
    <form action="main_studio/studio_storedata" method="post" enctype="multipart/form-data">
        <table>
            {{ csrf_field() }}

            <tr>
                <td>ID Studio</td>
                <td><input type="text" name="idstudio" required="required"></td>
            </tr>
            <tr>
                <td>No Studio</td>
                <td><input type="text" name="nostudio" required="required"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
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
