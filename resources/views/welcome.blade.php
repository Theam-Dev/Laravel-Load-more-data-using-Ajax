<!DOCTYPE html>
<html>
<head>
    <title>Laravel Load more data using Ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
      
<div class="container my-5" style="max-width: 750px">
    <h1>Laravel Load more data using Ajax</h1>
    <div id="data-wrapper">
        @include('data')
    </div>
    <div class="text-center">
        <button class="btn btn-success" onclick="loadmore()">Load More Data...</button>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var ENDPOINT = "{{ route('posts.index') }}";
    var page = 1;
    function loadmore(){
        page++;
        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
            }).done(function (response) {
                if (response.html == '') {
                    return;
                }
                $("#data-wrapper").append(response.html);
            })
    }
</script>
</body>
</html>