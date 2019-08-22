function updateEuros(value){
    // set endpoint and your access key
    endpoint = 'convert';
    access_key = '4a825574fca93b682d26be5dfa05b846';

    var converted;

    // define from currency, to currency, and amount
    from = 'EUR';
    to = 'GBP';
    amount = value;

    // execute the conversion using the "convert" endpoint:
    $.ajax({
        // url: 'https://apilayer.net/api/' + endpoint + '?access_key=' + access_key +'&from=' + from + '&to=' + to + '&amount=' + amount,   
        url: "https://api.ratesapi.io/api/latest?base=EUR&symbols=GBP", 
        dataType: 'json',
        crossDomain:true,
        type : 'GET',
        success: function(json) {
            console.log(json);
            // access the conversion result in json.result
           // alert(json.rates.GBP * value);
           // return  (json.rates.GBP * value)     
            
            converted = json.rates.GBP * value 

            console.log(converted)

            $('#textValue').val(converted)
            $('.desc').html("<p>Converted Value at a rate of 1 : " + json.rates.GBP +"</p>")

            
        }
    });

    //console.log(converted)

    return converted;
}





//console.log(text);

$(document).ready(function(){

    

    $('#textValue').on('change', function(){
       // alert('changed')
        let text = $(this).val();

        let avail = text.search('EUR')

        if(avail > 0 ){
            let textSplit, newText
            textSplit = text.split(' ')

            newText = textSplit[0];

            let newVal = updateEuros(newText);

            console.log(newVal)

            $(this).val(newVal) 
        }
    

    });

   
});
