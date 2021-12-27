<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Raport sprzedaży według grup produktów w wybranym zakresie dat </div>
   
                <div class="card-body">
                    
                         <p class="search_input">
                            <label> Zaznacz w kalendarzu zakres dat dla utworzenia raportu i zatwierdź przyciskiem Apply</label>
                            <form action="{{ route("sales.report.getdata") }}" method="GET">
                                <input type="text" name="daterange" value="01/01/2000" />

                                <script>
                                $(function() {
                                  $('input[name="daterange"]').daterangepicker({
                                    opens: 'left'
                                  }, function(start, end, label) {
                                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                                  });
                                });
                                </script>

                                
                                <input type=submit value=Submit />
                            </form>
                           
                        </p>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection