function validateForm() {
    var spreadsheet = document.forms["sheets"]["spreadsheet"].value;


    if (spreadsheet == '') {
        document.getElementById("error").innerHTML = "Name Or Code can't be empty";
        document.getElementById("error").className = "error";
        return false;
    }

    if (!isMatch(spreadsheet)) {
        document.getElementById("error").innerHTML = "Only alphanumeric and space allowed";
        document.getElementById("error").className = "error";
        return false;
    }
    function isMatch(str) {
        return /^[a-zA-Z0-9 ]+$/.test(str)
    }




    return true;


}//validateForm

