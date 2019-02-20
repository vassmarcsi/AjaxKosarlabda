$(document).ready(function () {
    jatekosOlvas();

    $(document).on("click", "option", function () {
        let id = $(this).attr("value");
        console.log(id);
        $.post("php/jatekosAdatai.php", {mez: id}, function (valasz) {
            $('#jatekosAdatai').html(valasz);
        });

        jegyzokonyvOlvas(id);
    });

    /*TANBÁ
     $(document).on("change","#jatekos",function(){
     let id = $(this).val();
     console.log(id);
     $.post("php/jatekosAdatai.php",{mez: id}, function(valasz){
     $('#jatekosAdatai').html(valasz);
     });
     }); 
     */
});

function jatekosOlvas() {
    $.get('php/jatekos.php', function (valasz, status) {
        //console.log(status);
        $('#jatekosok').html(valasz);
    });
}

function jegyzokonyvOlvas(id) {
    $.post("php/jegyzokonyv.php", {mez: id}, function (valasz) {
        $('#jegyzokonyv').html(valasz);
        $('#siker').html("Sikeresen beolvastuk az adatokat!");
    });
}