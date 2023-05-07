function calculate(){
    p = document.getElementById("principal").value
    r = document.getElementById("rate").value
    n = document.getElementById("term").value

    if (p.length == 0 || r.length == 0 || n.length == 0){
        window.alert("All the fields must be filled! Please try again.")
    }
    else if (Number(p)<0 || isNaN(Number(p))){window.alert("Principal amount must be non-negative! Please try again.")}
    else if (Number(r)<0 || Number(r)>1 || isNaN(Number(r))) {window.alert("Yearly rate must be float number between 0 and 1! Please try again.")}
    else if (Number(n)<0 || Number.isInteger(Number(n)) == false) {
        window.alert("Number of months must be non-negative integers! Please try again.")}
    else{
        p = Number(p)
        r = Number(r)
        n = Number(n)
        pmt = p * (r/12) / (1 - ((1+(r/12))** -n))
        sum = pmt * n
        total = sum-p

        document.getElementById("pmt").innerHTML = "$ " + pmt.toFixed(2)
        document.getElementById("sum").innerHTML ="$ " + sum.toFixed(2)
        document.getElementById("total").innerHTML = "$ " + total.toFixed(2)

    }

}