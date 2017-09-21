@extends('main')
	@section('title', ' | Contact Us')
	@section('content')

		<div class="row">
          <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            <form action="{{ route('contact.post')}}" method="POST">
            	{{csrf_field() }}
              <div class="form-group">
                <label for="email" name="email">Email:</label>
                <input  class="form-control" type="text" name="email" value="" id="email" required>
              </div>

              <div class="form-group">
                <label for="subject" name="subject">Subject:</label>
                <input  class="form-control" type="text" name="subject" value="" id="subject" >
              </div>

              <div class="form-group">
                <label for="message" name="message">Message:</label>
                <textarea name="message" rows="8" cols="80" name="message" class="form-control" required="true" placeholder="Type your message here..."></textarea>
              </div>
              <input type="submit" class="btn btn-success" value="Send Message">
            </form>
          </div>
        </div>

@endsection
