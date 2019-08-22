function updateEuros(value){
  
    $.ajax({
  
        url: "https://api.ratesapi.io/api/latest?base=EUR&symbols=GBP", 
        dataType: 'json',
        crossDomain:true,
        type : 'GET',
        success: function(json) {
            console.log(json);
            // access the conversion result in json.result
           // alert(json.rates.GBP * value);
           // return  (json.rates.GBP * value)     
            
            converted = Math.round(Json.rates.GBP * value )

            console.log(converted)

            $('#textValue').val(converted)

            //returns the round-up rate of conversion
            $('.desc').html("<p>*Converted Value at a rate of 1 : " +json.rates.GBP +"</p>")

            $('')

            
        }
    });

    //console.log(converted)

    return converted;
}







$(document).ready(function(){

    
    
    $('#textValue').on('change', function(){
        let text = $(this).val();

        let avail = text.search('EUR')

        //appends the tax value
        let VAT = Number(text * 0.2)

        $('.value').append('<small class="text-primary ">VAT: '+ VAT + ' &pound; (20%)</small>');


        //checks if EUR is typed
        if(avail > 0 ){
            let textSplit, newText
            textSplit = text.split(' ')

            newText = textSplit[0];

            let newVal = updateEuros(newText);


            $(this).val(newVal) 
        }
    
    });



   
});
