<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.full.min.js"></script>
<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.15/plugins/export/libs/FileSaver.js/FileSaver.min.js"></script>
<script lang="javascript" src="/zad/public/js/plugins/jqplot.canvasTextRenderer.js"></script>
<script lang="javascript" type="text/javascript" src="/zad/public/js/plugins/jqplot.canvasAxisLabelRenderer.js"></script>
<link type="text/css"src="/zad/public/jquery.jqplot/jquery.jqplot.min.css" rel="stylesheet"></link>
<script lang="javascript" type="text/javascript" src="/zad/public/jquery.jqplot/jquery.jqplot.min.js"></script>
<script lang="javascript" type="text/javascript" src="/zad/public/jquery.jqplot/plugins/jqplot.dateAxisRenderer.js"></script>



<style>
      table, th, td {
          border: 1px solid black;
        
      }
      th, td {
          background-color: #96D4D4;
          width: 260px;
          text-align: center;
      }
      tr {
          border-bottom: 1px solid black;
          border-top: 1px solid black;
          
          
      }​
</style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Zestawienie sprzedaży według grup produktów, rok do roku </div>
   
                <div class="card-body">
                    <div ng-controller="myCtrl">
                    
                    <br />
                        <div id="exportable">
                            <table id="mytable">
                              <tbody> 
                                <tr>
                                  <td  rowspan="4">Grupa</td>
                                  <td  colspan="6">Lata</td>                                 
                                </tr>
                              

                                                

                             
                                <tr>                                  
                                  <td colspan="2">2019</td>
                                  <td colspan="2">2020</td>
                                  <td colspan="2">2021</td>
                                </tr>
                              
                                <tr>
                                <tr>                                                               
                                  <td>Netto</td>
                                  <td>Brutto</td>
                                  <td>Netto</td>
                                  <td>Brutto</td>
                                  <td>Netto</td>
                                  <td>Brutto</td>                                
                                </tr>
                                <tr id="data"> 
                                    @php $books = 0; $booksgross = 0; $cleaning = 0; 
                                    $cleaninggross = 0; $bread = 0; $breadgross = 0; $fruits = 0; $fruitsgross = 0; 
                                    $vegetables = 0; $vegetablesgross = 0; $dairy = 0; $dairygross = 0; 
                                    @endphp
                                    @foreach($nineteen as $data)
                                      @php
                                          if($data->product->group->id == 1) 
                                          {
                                            $books += $data->product->cena_netto;
                                            $booksgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                                            $books = round($books, 2);
                                            $booksgross = round($booksgross, 2);
                                          }
                                          else if($data->product->group->id == 2) 
                                          {
                                            $cleaning+=$data->product->cena_netto;
                                            $cleaninggross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                                            $cleaning = round($cleaning, 2);
                                            $cleaninggross = round($cleaninggross, 2);
                                          }
                                          else if($data->product->group->id == 3) 
                                          {
                                            $bread+=$data->product->cena_netto;
                                            $breadgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                                            $bread = round($bread, 2);
                                            $breadgross = round($breadgross, 2);
                                          }
                                          else if($data->product->group->id == 4) 
                                          {
                                            $fruits+=$data->product->cena_netto;
                                            $fruitsgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                                            $fruits = round($fruits, 2);
                                            $fruitsgross = round($fruitsgross, 2);
                                          }
                                          else if($data->product->group->id == 5) 
                                          {
                                            $vegetables+=$data->product->cena_netto;
                                            $vegetablesgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                                            $vegetables = round($vegetables, 2);
                                            $vegetablesgross = round($vegetablesgross, 2);
                                          }
                                          else if($data->product->group->id == 6) 
                                          {
                                            $dairy+=$data->product->cena_netto;
                                            $dairygross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                                            $dairy = round($dairy, 2);
                                            $dairygross = round($dairygross, 2);
                                          }
                                              
                                      @endphp 
                                    @endforeach   
                                  <td>Książki</td>                                 
                                  <td>{{ $books }}</td>
                                  <td>{{ $booksgross }}</td>
                                    @php $bookstwenty = 0; $bookstwentygross = 0; $cleaningtwenty = 0; 
                                    $cleaningtwentygross = 0; $breadtwenty = 0; $breadtwentygross = 0; $fruitstwenty = 0; $fruitstwentygross = 0; 
                                    $vegetablestwenty = 0; $vegetablestwentygross = 0; $dairytwenty = 0; $dairytwentygross = 0; 
                                    @endphp
                                    @foreach($twenty as $data2)
                                      @php
                                          if($data2->product->group->id == 1) 
                                          {
                                            $bookstwenty += $data2->product->cena_netto;                                            
                                            $bookstwentygross += $data2->product->cena_netto + ($data2->product->cena_netto * $data2->product->vat/100);
                                            $bookstwenty = round($bookstwenty, 2);
                                            $bookstwentygross = round($bookstwentygross, 2);
                                          }
                                          else if($data2->product->group->id == 2) 
                                          {
                                            $cleaningtwenty+=$data2->product->cena_netto;
                                            $cleaningtwentygross += $data2->product->cena_netto + ($data2->product->cena_netto * $data2->product->vat/100);
                                            $cleaningtwenty = round($cleaningtwenty, 2);
                                            $cleaningtwentygross = round($cleaningtwentygross, 2);
                                          }
                                          else if($data2->product->group->id == 3) 
                                          {
                                            $breadtwenty+=$data->product->cena_netto;
                                            $breadtwentygross += $data2->product->cena_netto + ($data2->product->cena_netto * $data2->product->vat/100);
                                            $breadtwenty = round($breadtwenty, 2);
                                            $breadtwentygross = round($breadtwentygross, 2);
                                          }
                                          else if($data2->product->group->id == 4) 
                                          {
                                            $fruitstwenty+=$data->product->cena_netto;
                                            $fruitstwentygross += $data2->product->cena_netto + ($data2->product->cena_netto * $data2->product->vat/100);
                                            $fruitstwenty = round($fruitstwenty, 2);
                                            $fruitstwentygross = round($fruitstwentygross, 2);
                                          }
                                          else if($data2->product->group->id == 5) 
                                          {
                                            $vegetablestwenty+=$data2->product->cena_netto;
                                            $vegetablestwentygross += $data2->product->cena_netto + ($data2->product->cena_netto * $data2->product->vat/100);
                                            $vegetablestwenty = round($vegetablestwenty, 2);
                                            $vegetablestwentygross = round($vegetablestwentygross, 2);
                                          }
                                          else if($data2->product->group->id == 6) 
                                          {
                                            $dairytwenty+=$data2->product->cena_netto;
                                            $dairytwentygross += $data2->product->cena_netto + ($data2->product->cena_netto * $data2->product->vat/100);
                                            $dairytwenty = round($dairytwenty, 2);
                                            $dairytwentygross = round($dairytwentygross, 2);
                                          }
                                              
                                      @endphp 
                                    @endforeach   
                                  <td>{{ $bookstwenty }}</td>
                                  <td>{{ $bookstwentygross }}</td>
                                    @php $bookstwentyone = 0; $bookstwentyonegross = 0; $cleaningtwentyone = 0; 
                                    $cleaningtwentyonegross = 0; $breadtwentyone = 0; $breadtwentyonegross = 0; $fruitstwentyone = 0; $fruitstwentyonegross = 0; 
                                    $vegetablestwentyone = 0; $vegetablestwentyonegross = 0; $dairytwentyone = 0; $dairytwentyonegross = 0; 
                                    @endphp
                                    @foreach($twentyone as $data3)
                                      @php
                                          if($data3->product->group->id == 1) 
                                          {
                                            $bookstwentyone += $data3->product->cena_netto;                                            
                                            $bookstwentyonegross += $data3->product->cena_netto + ($data3->product->cena_netto * $data3->product->vat/100);
                                            $bookstwentyone = round($bookstwentyone, 2);
                                            $bookstwentyonegross = round($bookstwentyonegross, 2);
                                          }
                                          else if($data3->product->group->id == 2) 
                                          {
                                            $cleaningtwentyone+=$data2->product->cena_netto;
                                            $cleaningtwentyonegross += $data3->product->cena_netto + ($data3->product->cena_netto * $data3->product->vat/100);
                                            $cleaningtwentyone = round($cleaningtwentyone, 2);
                                            $cleaningtwentyonegross = round($cleaningtwentyonegross, 2);
                                          }
                                          else if($data3->product->group->id == 3) 
                                          {
                                            $breadtwentyone+=$data->product->cena_netto;
                                            $breadtwentyonegross += $data3->product->cena_netto + ($data3->product->cena_netto * $data3->product->vat/100);
                                            $breadtwentyone = round($breadtwentyone, 2);
                                            $breadtwentyonegross = round($breadtwentyonegross, 2);
                                          }
                                          else if($data3->product->group->id == 4) 
                                          {
                                            $fruitstwentyone+=$data->product->cena_netto;
                                            $fruitstwentyonegross += $data3->product->cena_netto + ($data3->product->cena_netto * $data3->product->vat/100);
                                            $fruitstwentyone = round($fruitstwentyone, 2);
                                            $fruitstwentyonegross = round($fruitstwentyonegross, 2);
                                          }
                                          else if($data3->product->group->id == 5) 
                                          {
                                            $vegetablestwentyone+=$data3->product->cena_netto;
                                            $vegetablestwentyonegross += $data3->product->cena_netto + ($data3->product->cena_netto * $data3->product->vat/100);
                                            $vegetablestwentyone = round($vegetablestwentyone, 2);
                                            $vegetablestwentyonegross = round($vegetablestwentyonegross, 2);
                                          }
                                          else if($data3->product->group->id == 6) 
                                          {
                                            $dairytwentyone+=$data3->product->cena_netto;
                                            $dairytwentyonegross += $data3->product->cena_netto + ($data3->product->cena_netto * $data3->product->vat/100);
                                            $dairytwentyone = round($dairy, 2);
                                            $dairytwentyonegross = round($dairygross, 2);
                                          }
                                              
                                      @endphp 
                                    @endforeach  
                                  <td>{{ $bookstwentyone }}</td>
                                  <td>{{ $bookstwentyonegross }}</td>                                
                                </tr>
                                <tr id="data">  
                                  <td>Środki czystości</td>                                 
                                  <td>{{ $cleaning }}</td>
                                  <td> {{ $cleaninggross }}</td>
                                  <td>{{ $cleaningtwenty }}</td>
                                  <td>{{ $cleaningtwentygross }}</td>
                                  <td>{{ $cleaningtwentyone }}</td>
                                  <td>{{ $cleaningtwentygross }}</td>                               
                                </tr>
                                <tr id="data">  
                                  <td>Pieczywo</td>                                 
                                  <td>{{ $bread }}</td>
                                  <td>{{ $breadgross }}</td>
                                  <td>{{ $breadtwenty }}</td>
                                  <td>{{ $breadtwentygross }}</td>
                                  <td>{{ $breadtwentyone }}</td>
                                  <td>{{ $breadtwentyonegross }}</td>                            
                                </tr>
                                <tr id="data">  
                                  <td>Owoce</td>                                 
                                  <td>{{ $fruits }}</td>
                                  <td>{{ $fruitsgross }}</td>
                                  <td>{{ $fruitstwenty }}</td>
                                  <td>{{ $fruitstwentygross }}</td>
                                  <td>{{ $fruitstwentyone }}</td>
                                  <td>{{ $fruitstwentyonegross }}</td>                              
                                </tr>
                                <tr id="data">  
                                  <td>Warzywa</td>                                 
                                  <td>{{ $vegetables }}</td>
                                  <td>{{ $vegetablesgross }}</td>
                                  <td>{{ $vegetablestwenty }}</td>
                                  <td>{{ $vegetablestwentygross }}</td>
                                  <td>{{ $vegetablestwentyone }}</td>
                                  <td>{{ $vegetablestwentyonegross }}</td>                             
                                </tr>
                                <tr id="data">  
                                  <td>Nabiał</td>                                 
                                  <td>{{ $dairy }}</td>
                                  <td>{{ $dairygross }}</td>
                                  <td>{{ $dairytwenty }}</td>
                                  <td>{{ $dairytwentygross }}</td>
                                  <td>{{ $dairytwentyone }}</td>
                                  <td>{{ $dairytwentyonegross }}</td>                                
                                </tr>
                                <tr> 
                                  <td>Suma</td>                                 
                                  <td>{{$books+$cleaning+$bread+$fruits+ $vegetables+$dairy}} </td>
                                  <td>{{$booksgross+$cleaninggross+$breadgross+$fruitsgross+$vegetablesgross+$dairygross}} </td>
                                  <td>{{$bookstwenty+$cleaningtwenty+$breadtwenty+$fruitstwenty+$vegetablestwenty+$dairytwenty}}</td>
                                  <td>{{$bookstwentygross+$cleaningtwentygross+$breadtwentygross+$fruitstwentygross+$vegetablestwentygross+$dairytwentygross}}</td>
                                  <td>{{$bookstwentyone+$cleaningtwentyone+$breadtwentyone+$fruitstwentyone+$vegetablestwentyone+$dairytwentyone}}</td>
                                  <td>{{$bookstwentyonegross+$cleaningtwentyonegross+$breadtwentyonegross+$fruitstwentyonegross+$vegetablestwentyonegross+$dairytwentyonegross}}</td>                                
                                </tr>
                                
                              </tbody>
                            </table>          

                         
                              <script>
                                  $(document).ready(function(){
                                  var line1=[['2019', {{ $books }}], ['2020', {{ $bookstwenty }}], ['2021', {{ $bookstwentyone }}]];
                                  var line2=[['2019', {{ $cleaning }}], ['2020', {{ $cleaningtwenty }}], ['2021', {{ $cleaningtwentyone }}]];
                                  var line3=[['2019', {{ $bread }}], ['2020', {{ $breadtwenty }}], ['2021', {{ $breadtwentyone }}]];
                                  var line4=[['2019', {{ $fruits }}], ['2020', {{ $fruitstwenty }}], ['2021', {{ $fruitstwentyone }}]];
                                  var line5=[['2019', {{ $vegetables }}], ['2020', {{ $vegetablestwenty }}], ['2021', {{ $vegetablestwentyone }}]];
                                  var line6=[['2019', {{ $dairy }}], ['2020', {{ $dairytwenty }}], ['2021', {{ $dairytwentyone }}]];

                                  var plot2 = $.jqplot('chart1', [line1, line2, line3, line4, line5, line6], {
                                  title:'Wykres roczny netto',
                                   gridPadding:{right:35},
                                   axes:{
                                     xaxis:{
                                       renderer:$.jqplot.DateAxisRenderer,
                                       tickOptions:{formatString:'%y'},
                                       min:'2019',
                                       tickInterval:'1 year'
                                     }
                                   },
                                   series:[{lineWidth:4, markerOptions:{style:'square'}}]
                                 });
                                });
                            </script>
                             <div id="chart1" style="width: 100%; height: 700px;"></div>
                        </div>
                    </div>
    



                </div>
            </div>
        </div>
    </div>
</div>
@endsection