<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plugin BTS-SHORTLINK</title>


    <style>
        #search-box {
            position: relative;
            width: 100%;
            margin: 0;
        }

        .search-form {
            height: 32px;
            border: 1px solid #feacae;
            background-color: #fff;
            overflow: hidden;
        }

        .search-text {
            font-size: 14px;
            color: #ddd;
            border-width: 0;
            background: transparent;
        }

        #search-box input[type="text"] {
            width: 90%;
            padding: 8px 0 12px 1em;
            color: #333;
            outline: none;
        }

        .search-button {
            position: absolute;
            top: 0;
            right: 0;
            height: 34px;
            width: 280px;
            font-size: 14px;
            color: #555;
            text-align: center;
            line-height: 4px;
            border-width: 0;
            background-color: #cbf3ee;
            cursor: pointer;
        }
    </style>

</head>
<body>


<div id='search-box'>
    <form class="search-form" method='POST' target='_top'>
        <label for='url'>
            <input id='url' name='url' placeholder='Paste your URL' type='text' class="search-text" />
        </label>
        <button id='sendInfo' class="search-button" type='submit'><span>Short URL!</span></button>
    </form>

    New URL: <span class="message" id="message"></span>
</div>


</body>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $('#sendInfo').on('click', function (){
        var endpoint = 'https://www.bts-shortlink.com/api/v01/shortlinks/create';
        var url = $('#url').val();
        var bearerToken = 'b437833d-d6b3-4f6a-a7c1-b483046de586';

        if(url === null || !url) {
            alert('URL is not null');
            return false;
        }

        var settings = {
            "url": endpoint,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer " + bearerToken,
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "url_long": url
            }),
        };
        $.ajax(settings).done(function (response) {
            console.log(response);
            $('#message').empty();
            $('#message').prepend(response.data.urls.urlShort);
        });
        return false;

    });
</script>

</html>





















