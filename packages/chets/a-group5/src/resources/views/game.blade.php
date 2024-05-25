<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Rock Paper Scissors</h1>

        <div class="text-center">
            <h2>Your Score: <span id="score">{{ $score }}</span></h2>
        </div>

        <form method="POST" action="{{ route('play') }}" class="text-center">
            @csrf
            <div class="btn-group" role="group">
                <button type="submit" name="choice" value="rock" class="btn btn-primary">Rock</button>
                <button type="submit" name="choice" value="paper" class="btn btn-primary">Paper</button>
                <button type="submit" name="choice" value="scissors" class="btn btn-primary">Scissors</button>
            </div>
        </form>

        @isset($result)
        <div id="results" class="mt-5 text-center">
            <h2>Results</h2>
            <p>You chose: <strong>{{ $userChoice }}</strong></p>
            <p>Computer chose: <strong>{{ $computerChoice }}</strong></p>
            <p><strong>{{ $result }}</strong></p>
        </div>
        @endisset
    </div>
</body>
</html>
