<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ APP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #333;
        }

        .container {
            background-color: #555;
            color: #ddd;
            border-radius: 10px;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            max-width: 700px;
        }

        .container>p {
            font-size: 32px;
        }

        .question {
            width: 75%;
        }

        .options {
            position: relative;
            padding-left: 40px;
        }

        #options label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            cursor: pointer;
        }

        .options input {
            opacity: 0;
        }

        .checkmark {
            position: absolute;
            top: -1px;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #555;
            border: 1px solid #ddd;
            border-radius: 50%;
        }

        .options input:checked~.checkmark:after {
            display: block;
        }

        .options .checkmark:after {
            content: "";
            width: 10px;
            height: 10px;
            display: block;
            background: white;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked~.checkmark {
            background: #21bf73;
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn-primary {
            background-color: #555;
            color: #ddd;
            border: 1px solid #ddd;
        }

        .btn-primary:hover {
            background-color: #21bf73;
            border: 1px solid #21bf73;
        }

        .btn-success {
            padding: 5px 25px;
            background-color: #21bf73;
        }

    </style>
</head>

<body>
    <form action="/save" method="get" id="form1">
        <div class="container mt-sm-5 my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                @foreach($question as $question)
                <div class="py-2 h5"><b><span>{{$question_id}}</span> {{$question->question}}</b></div>
                @endforeach
                @foreach($answer as $answer)
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">{{$answer->answer}}
                        <input type="radio" name="radio" name="answer" id="radio_id" value="{{$answer->answer}}">
                        <span class="checkmark"></span>
                    </label>
                    {{-- <label class="options">Nonprofit Owner or Employee
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Journalist or Activist
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Other
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label> --}}
                </div>
                @endforeach
            </div>
            <div class="d-flex align-items-center pt-3">
                <div id="prev">
                    <button class="btn btn-primary">Previous</button>
                </div>
                <div class="ml-auto mr-sm-5">
                    <button class="btn btn-success">Next</button>
                </div>
            </div>
        </div>
    </form>


</body>

</html>
