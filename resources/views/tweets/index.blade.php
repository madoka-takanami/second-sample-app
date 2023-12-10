<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ついったー</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
      <h1>つぶやき一覧</h1>
        <form action="{{ route('tweets.create') }}" method="post">
          @csrf
          <div class="mb-3">
            <textarea
              name="tweet"
              class="form-control @error('tweet') is-invalid @enderror"
              rows="3"
              placeholder="いまどうしてる？"
            ></textarea>

            @error('tweet')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit" class="btn btn-primary">ツイートする</button>
            </div>
        </form>

      <div class="tweets">
        @foreach($tweets as $tweet)
          <div class="tweet">
            <p>{{ $tweet->content }}</p>
            <p>{{ $tweet->created_at }}</p>
            <p>
              <a  href="{{ route('tweets.update.index', $tweet->id ) }}"
                  class="btn btn-outline-primary"
                  role="button">
                  編集する
              </a>
            </p>
          </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
