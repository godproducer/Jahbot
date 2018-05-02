<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Привет всем!</title>
<link href="css/saytoall.css" rel="stylesheet" type="text/css" >
<body>
    <div class="container-fluid">
        <div class="row">
            <a href="https://t.me/joinchat/IvIOrEZmf-yD8GDy-rJxCQ" target="_blank">Internal group</a>
        </div>
        <div class="row">
            <button onclick="document.getElementById('id01').style.display = 'block'" style="width:auto;">Пиздонуть по взрослому
            </button>
            <button onclick="document.getElementById('id02').style.display = 'block'" style="width:auto;">Доебстись к любой хне по Id
            </button>
        </div>
        <div class="row">
            <?php include 'list.php'; ?>
        </div>
    </div>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="send.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal"> &times;
                </span>
            </div>
            <div class="container">
                <label>
                    <b>Что пиздонуть:
                    </b>
                </label>
                <textarea name="msgtext" rows="10" >
				
                </textarea>
                <br>
                <button type="submit">Проорать по всюду
                </button>
            </div>
        </form>
    </div>
    <div id="id02" class="modal">
        <form class="modal-content animate" action="info.php" method="get">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display = 'none'" class="close" title="Close Modal"> &times;
                </span>
            </div>
            <div class="container">
                <label>
                    <b>Id жертвы:
                    </b>
                </label>
                <input name="id" />
                <button type="submit">Инфо по Id
                </button>
            </div>
        </form>
    </div>
</body>