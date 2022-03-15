function showVal(element)
{
    var value=element.value;
    console.log("value "+ value);
    var id=element.getAttribute("data-id");
    console.log("id "+ id);
    document.getElementById(id).value=value;
    showTotal();


}

function showTotal()
{
    var qnt=document.getElementsByClassName("qnt-pro");//input element
    var price=document.getElementsByClassName("price-pro");// div element
    var sumAll=document.getElementById("sum-all");
    var toalCost=document.getElementById("total-cost");
    var totalInput=document.getElementById("total");
    console.log("length "+qnt.length );
    console.log("length "+price.length );

    var total=0;
    for(var i=0 ;i<qnt.length; i++)
    {
        console.log("inside loop");
       var priceItem=Number(price[i].innerText);
       var qntItem=Number(qnt[i].value);
       total+=(priceItem*qntItem);
       console.log(total);
    }
    sumAll.innerText=total;
    toalCost.innerText=total;
    totalInput.value=total;

    console.log("outside loop");


}