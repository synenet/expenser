@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('templates.errors')
            <div class="card">
                <div class="card-header">Recent Expenses 

                <a data-toggle="modal" href='#add-more' class=" float-right btn btn-primary btn-sm" >  Add new <i class="fa fa-plus-circle"></i></a>
                </div>
            </div>    


        </div>
    </div>
</div>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="container color-blue-light">
            <div class="row col-md-12 col-md-offset-2 custyle">
                @if(count($expenses) > 0)
                <table class="table  custab">
                    <thead>

                        <tr>
                            <th>ID</th>
                            
                            <th>Value (&pound;)</th>
                            <th>VAT (&pound;)</th>
                            <th>Reason</th>
                            <th>Date</th>

                        </tr>
                    </thead>

                        @foreach($expenses as $expense)
                        <tr>
                            <td> {{array_search($expense, $expenses) + 1}} </td>
                            
                            <td>{{$expense['value']}}</td>
                            <td>{{$expense['vat']}}</td>
                            <td>{{$expense['reason']}}</td>
                            <td>{{Carbon\Carbon::parse($expense['date'])->diffForHumans() }} <td>

                        </tr>

                        @endforeach


                </table>

                @else
                <p class="p-4">There are no expenses yet. Seems you've got all the cash well stacked</p>

                @endif
            </div>
        </div>
        </div>
    </div>
</div>




   <!-- modal -->

    <div class="modal fade" id="add-more">
        <div class="modal-dialog __modal-dialog">
            <div class="modal-content">
            <form action="{{url('expenses/addExpense')}}" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Expense</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>

                <div class="modal-body  ">
                    
                        @csrf()
                        <div class="form-group">
                            <label for="">Date</label>
                            <input required class="form-control" name="date" type="date">
                        </div>

                        <div class="form-group value">
                            <label for="">Value<span style="position:absolute" class=" text-success text-small desc"></span></label>
                            <div class="row">
                                <div class="col-10">
                                <input required id="textValue" class="form-control" name="value" type="text">
                                
                                </div>

                                <div class="col-2" style="font-size:1em;background:#1E3250;color:#fff;"><p class="pounds">Pounds(&pound;)</p></div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="">Reason</label>
                            <textarea required class="form-control" name="reason" ></textarea>
                        </div>
                        <input type="hidden" required name="userId" value="{{ Auth::user()->id }} ">
                   
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Save Expenses" />
                </div>
              </form>  
            </div>
        </div>
    </div>
    <!-- modal end -->
@endsection
