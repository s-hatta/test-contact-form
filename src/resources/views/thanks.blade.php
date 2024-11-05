<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お問い合わせありがとうございました</title>
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
  <div class="content-thanks">
    <div class="content-thanks__item">
      <div class="content-thanks__item-text">
        お問い合わせありがとうございました。
      </div>
      <form method="GET", action="/">
        @csrf
        <button class="content-thanks__item-submit" type="submit">HOME</button>
      </form>
    </div>
  </div>
  <label class="background-text">Thank you</label>
</body>

</html>
