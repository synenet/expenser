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
                <table class="table  custab">
                    <thead>
                    <!-- <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a> -->
                        <tr>
                            <th>ID</th>
                            
                            <th>Value</th>
                            <th>VAT</th>
                            <th>Reason</th>
                            <th>Date</th>
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>

                        @foreach($expenses as $expense)
                        <tr>
                            <td>{{$expense->id}}</td>
                            
                            <td>{{$expense->value}}</td>
                            <td>{{$expense->vat}}</td>
                            <td>{{$expense->reason}}</td>
                            <td>{{Carbon\Carbon::parse($expense->date)->diffForHumans() }} <td>
                            <!-- <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td> -->
                        </tr>

                        @endforeach


                </table>
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

                <div class="modal-body __modal-body ">
                    
                        @csrf()
                        <div class="form-group">
                            <label for="">Date</label>
                            <input required class="form-control" name="date" type="date">
                        </div>

                        <div class="form-group">
                            <label for="">Value</label>
                            <div class="row">
                                <div class="col-10">
                                <input required id="textValue" class="form-control" name="value" type="text">
                                <span style="position:absolute" class=" text-success text-small desc"></span>
                                </div>

                                <div class="col-2" style="background:#1E3250;color:#fff;padding:5px"><p>&pound;</p></div>
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
