<!DOCTYPE html>
<html>
  <head>
    <title>報告書の詳細</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  </head>
  <body>
    <div style="text-align: center;">
    <h1>報告書の詳細</h1>
    <h2>タイトル: {{ $article->title }}</h2>
    <small>Posted at:{{ $article->posted_at }}</small>
    <div>
      <h2>本文: {!! nl2br(e($article->body)) !!}</h2>
    </div>
    <form action="{{ route('detail', $article->id) }}" method="post">
      @csrf
      <div>
        <label for="textInput">コメって！</label><br>
        <textarea id="textInput" name="text" rows="3" placeholder="コメントはこちらから入力"></textarea>
      </div>
      <div>
        <button class="report-button" type="submit">コメント投稿</button>
      </div>
      <style>
        /* Add this CSS code within the <head> tag or in an external CSS file */
        .report-button {
          background-color: #f4b887; /* Set the background color */
          color: white; /* Set the text color */
          padding: 10px 20px; /* Adjust the padding */
          font-size: 16px; /* Adjust the font size */
          border: none; /* Remove the border */
          cursor: pointer; /* Add a cursor pointer */
          border-radius: 5px; /* Add rounded corners */
        }

        /* Optional: Add hover effect */
        .report-button:hover {
          background-color: #45a049;
        }
      </style>
    </form>
    <h2>コメント(新しい順)</h2>
    @if ($comments)
      @foreach ($comments as $comment)
        <div class="text">
          <small>[{{ $comment->posted_at }}]</small>
          <div>
            {!! nl2br(e($comment->text)) !!}
          </div>
        </div>
      @endforeach
    @else
      <p>コメント nothing</p>
    @endif
    <hr>
    <p>
      <a href="{{ route('index') }}" id="modoru">トップページ</a>
      <a href="{{ route('update', $article->id) }}" id="edit">投稿を編集</a>
      <a href="{{ route('delete', $article->id) }}" id="delete">投稿を削除</a>
    </p>
  </div>
  <canvas id="radar-chart" height="70px"></canvas>
  <script type="text/javascript">

var ctx = document.getElementById("radar-chart");

var myRadarChart = new Chart(ctx, {
    type: 'radar',
    data: {
        labels: ['国語', '算数', '理科', '社会', '英語'],
        datasets: [
        {   label: "Aさん",
            data: [47, 89, 97, 34, 89],
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 0.9)',
            pointBackgroundColor: 'rgba(255, 99, 132, 0.9)',
            pointBorderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 3,
            pointRadius: 3,
        },{
            label: "全国平均",
            data: [70, 47, 67, 76, 57],
            backgroundColor: 'rgba(0, 0, 255, 0.6)',
            borderColor: 'rgba(0, 0, 0, 255, 0.9)',
                pointBackgroundColor: 'rgba(0, 0, 255, 0.9)',
                pointBorderColor: 'rgba(0, 0, 255, 1)',
                borderWidth: 3,
                pointRadius: 3,
            }]},
    });
</script>
  </body>
</html>

