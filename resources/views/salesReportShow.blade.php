<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.full.min.js"></script>
<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.15/plugins/export/libs/FileSaver.js/FileSaver.min.js"></script>


<style>
        #fullbar
        {
            height:500px;
            width:50px; 
            background-color:#D1D7DF;
            position:relative;
        }   
        .bar {
            background-color:#CF3500;
            width:100%;
            position:absolute;
            vertical-align: bottom;
            display: table-cell;
            bottom:0;
        }
        .bargross {
            background-color: blue;
            width:100%;
            position:absolute;
            vertical-align: bottom;
            display: table-cell;
            bottom:0;
        }
</style>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Raport sprzedaży według grup produktów w wybranym zakresie dat </div>
   
                <div class="card-body">
                    <div ng-controller="myCtrl">
                    
                    <br />
                        <div id="exportable">
                            <table id="mytable" class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">Grupa</th>
                                  <th scope="col">Dzień</th>
                                  <th scope="col">Kwota netto</th>
                                  <th scope="col">Kwota Brutto</th>
                                </tr>
                              </thead>

                              <tbody>

                              @php $sumnet = 0; $sumgross = 0; $books = 0; $booksgross = 0; $cleaning = 0; 
                              $cleaninggross = 0; $bread = 0; $breadgross = 0; $fruits = 0; $fruitsgross = 0; 
                              $vegetables = 0; $vegetablesgross = 0; $dairy = 0; $dairygross = 0; @endphp

                              @foreach($order as $data)
                                @php $sumnet += $data->product->cena_netto; @endphp
                                @php $sumgross += ($data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100)); @endphp
                                <tr> 
                                  <th scope="row">{{ $data->product->group->nazwa }}</th>
                                  <td>{{ $data->data }}</td>
                                  <td>{{ $data->product->cena_netto }} zł</td>
                                  <td>{{ $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100)  }} zł</td>
                                </tr>
                              @php if($data->product->group->id == 1) 
                              {
                                $books += $data->product->cena_netto;
                                $booksgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                              }
                              else if($data->product->group->id == 2) 
                              {
                                $cleaning+=$data->product->cena_netto;
                                $cleaninggross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                              }
                              else if($data->product->group->id == 3) 
                              {
                                $bread+=$data->product->cena_netto;
                                $breadgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                              }
                              else if($data->product->group->id == 4) 
                              {
                                $fruits+=$data->product->cena_netto;
                                $fruitsgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                              }
                              else if($data->product->group->id == 5) 
                              {
                                $vegetables+=$data->product->cena_netto;
                                $vegetablesgross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                              }
                              else if($data->product->group->id == 6) 
                              {
                                $dairy+=$data->product->cena_netto;
                                $dairygross += $data->product->cena_netto + ($data->product->cena_netto * $data->product->vat/100);
                              }
                              @endphp

                              @endforeach
                                <tr>
                                  <td colspan="2"><center><h3><b>SUMA:</b></h3><center></td>
                                  @php
                                  $sumnet=round($sumnet, 2); 
                                  $sumgross=round($sumgross, 2);
                                  @endphp
                                  
                                  <td><h3><b>{{ $sumnet }} zł</b></h3></td>
                                  <td><h3><b>{{ $sumgross }} zł</b></h3></td>
                                </tr>
                                
                              </tbody>
                            </table>
                            <button id="button-a">Create Excel</button>

                        </div>
                    </div>
                    <table class="table table-hover">
                      <tr>
                          @php
                              $values=array(0 => $books, 1 => $cleaning, 2 => $bread, 3 => $fruits, 4 => $vegetables, 5 => $dairy);
                              $valuesmax = max($values);
                              $valuesgross=array(0 => $booksgross, 1 => $cleaninggross, 2 => $breadgross, 3 => $fruitsgross, 4 => $vegetablesgross, 5 => $dairygross);
                              $valuesgrossmax = max($valuesgross);
                              for ($i = 0; $i < count($values); $i++) {                                   
                                  $height = $values[$i]*100/$valuesmax*5;  
                                  $heightgross = $valuesgross[$i]*100/$valuesgrossmax*5;   
                                  if($i == 0)
                                  { $name = "Książki";}   
                                  else if($i == 1)
                                  { $name = "Środki czystości";}  
                                  else if($i == 2)
                                  { $name = "Pieczywo";}   
                                  else if($i == 3)
                                  { $name = "Owoce";} 
                                  else if($i == 4)
                                  { $name = "Warzywa";}
                                  else if($i == 5) 
                                  { $name = "Nabiał";}   
                                  $show=round($values[$i], 2); 
                                  $showgross=round($valuesgross[$i], 2);                             
                                  echo "<td style='font-size: small'>".$show."zł<div id='fullbar'><div class='bar' style='height:".$height."'></div></div>".$name." netto </td>";
                                  echo "<td style='font-size: small'>".$showgross."zł<div id='fullbar'><div class='bargross' style='height:".$heightgross."'></div></div>".$name." brutto </td>";
                              }
                          @endphp
                        </tr>
                    </table>

                    <script>
                            var csvContent = "data:text/csv;charset=utf-8,%EF%BB%BF" + encodeURI(csvContent);
                            var wb = XLSX.utils.table_to_book(document.getElementById('mytable'), {sheet:"Sheet JS"});
                            var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
                            function s2ab(s) {
                                            var buf = new ArrayBuffer(s.length);
                                            var view = new Uint8Array(buf);
                                            for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                                            return buf;
                            }
                            $("#button-a").click(function(){
                            saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'test.xlsx');
                            });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection