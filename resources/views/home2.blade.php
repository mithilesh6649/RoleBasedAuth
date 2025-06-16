@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! Employer') }}
                </div>
            </div>
        </div>
    </div>
</div>







<!DOCTYPE html>
<html lang='en'>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
     
    

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: 'UTC',
    initialView: 'dayGridMonth',
    events: 'https://fullcalendar.io/api/demo-feeds/events.json',
    editable: true,
    selectable: true
  }); var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: { center: 'dayGridMonth,timeGridWeek' }, 
          dateClick: function() {
                 alert('a day has been clicked!');
            },
            // headerToolbar: false
        });
        calendar.render();


                    document.getElementById('prev').addEventListener('click', function() {
                calendar.prev(); // call method
            });

            document.getElementById('next').addEventListener('click', function() {
                calendar.next(); // call method
            });
      });

    </script>


<script>
 
 $(document).ready(function(){
   $('#calculate').click(function(){
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      const fromDate = new Date(from_date);
      const toDate = new Date(to_date);
      const timeDifference = (toDate - fromDate) / (1000 * 60 * 60); 
      alert(timeDifference);
   });
 });

</script>
  </head>
  <body>

    <input id="from_date" value="2024-05-28T23:44" class="form-control" type="datetime-local" name="from_date" />
    <input id="to_date" value="2024-05-28T23:46" class="form-control" type="datetime-local" name="to_date" />
   
    <button id="calculate">Calculate</button>

    <p>
        <button id='prev'>prev</button>
        <button id='next'>next</button>
      </p>  
    <div id='calendar'></div>
  </body>
</html>
@endsection
