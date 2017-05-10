@extends('main')

@section('title')
    Contact
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Us</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input class="form-control" type="text" id="email" name="email">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input class="form-control" type="text" id="subject" name="subject">
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea class="form-control" id="message" name="message">Type your message here....</textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>

@endsection
