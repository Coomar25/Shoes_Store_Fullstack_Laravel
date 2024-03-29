@extends('master.master')


@section('usercontact')
    {{-- This is message for the product which are successfully added --}}

    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>
                <h1>Message Has Been Sent</h1>
            </strong>
            <h1>Thank You Soo Much For Feedback </h1>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- This is message for the product which are successfully added --}}



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>contact</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>


        <section class="contact">

            <form action="{{ route('UserMessage') }}" method="POST">
                @csrf
                <h3>get in touch</h3>
                <input type="text" name="name" placeholder="enter your name" required maxlength="20" class="box">
                <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
                <input type="number" name="number" min="0" max="9999999999" placeholder="enter your number"
                    required onkeypress="if(this.value.length == 10) return false;" class="box">
                <textarea name="msg" class="box" placeholder="enter your message" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" name="send" class="btn">
            </form>

        </section>


    </body>

    </html>
@endsection
