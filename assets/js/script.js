    $(document).ready( function (e) {
    $('select').formSelect();
    $('.modal').modal();
    var items = $('div.panel div a'),
        componentes = $('.tarjeta'),
        sig = $('.nextBtn'),
        atras = $('.prevBtn');

    $('#name').keyup( function () {

       if($(this).val()===''){
           $('#primero').prop('disabled',true)
       }else{$('#primero').prop('disabled',false)}
    })
    $('#sexo').change( function () {

        if($(this).val()===''){
            $('#segundo').prop('disabled',true)
        }else{
            $('#segundo').prop('disabled',false)}
    })
    $('#hobby').change( function () {

        if($(this).val()===0){
            $('#finalizar').prop('disabled',true)
        }else{
            $('#finalizar').prop('disabled',false)}
    })

    componentes.hide();

    items.click( function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            items.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            componentes.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    atras.click(function(){
        var curStep = $(this).closest(".tarjeta"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        prevStepWizard.removeAttr('disabled').trigger('click');
    });

    sig.click(function(){
        var curStep = $(this).closest(".tarjeta"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            //curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('ul[id^="select-options-"]').children('li').on('click', function() {

        var selector = 'li.selected';
        var cont=1;
        if($(this).index() === 0){
            if ($(this).hasClass('selected')) {
                $(this).siblings(selector).each(function() {

                    $(this).click();
                    $("#a"+cont).parent().hide()
                    $("#a"+cont).prop('required',false);


                    cont++
                });

            }

        }
        else {
            if(!$(this).parent().children('li:first').hasClass('selected')) {
                if($(this).children().children().children().is(':checked')){
                    $("#a"+$(this).index()).prop("disabled",false);
                    $("#a"+$(this).index()).parent().show();
                }else{
                    $("#a"+$(this).index()).prop("disabled",true);
                }
             }else{ $(this).children().children().children().prop("checked",false);}
        }


    });

    $('div.panel div a.btn-primary').trigger('click');



    $('#nuevo').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'index.php?c=encuesta&a=guarda',
            data: $(this).serialize(),
            success: function(response)
            {   $("#finalizar").prop("disabled",true);
                $(".seccion").hide()
                console.log(response);
                var jsonData = JSON.parse(response);

                console.log(jsonData)
                var ele = ["Ninguno","Deportes", "Musical", "Cocina", "Literario", "Manualidades", "Juegos", "Modelismo", "Baile", "Cine", "Otro"];
                var sexo=["","Masculino","Femenino"];
                var sex=sexo[jsonData[0].sexo];
                var hobby="";
                var horas="";
                jsonData.forEach(function(dato, index) {
                   hobby+="<div>"+ ele[dato.hobby]+" : "+ dato.horas  +" min.</div>\n" ;
                });

                if (jsonData)
                {
                    var datos=" <div class=\"col m12 \">\n" +
                        "                             <h4>Resultado:</h4>\n" +
                        "                            <div class=\"card\">\n" +
                        "                            <table>\n" +
                        "                                <thead>\n" +
                        "\n" +
                        "                                <th>Nombre</th>\n" +
                        "                                <th>Sexo</th>\n" +
                        "                                <th>Hobby</th>\n" +


                        "                                </thead>\n" +
                        "                                <tbody>\n" +
                        "                                <tr>\n" +
                        "                                    <td>"+jsonData[0].nombre +"</td>\n" +
                        "                                    <td>"+sex +"</td>\n <td>" +

                        "                                    " + hobby +
                        " </td> <td>                                  " + horas +
                        "</td>\n" +
                        "                                </tr>\n" +
                        "                                </tbody>\n" +
                        "                            </table>\n" +
                        "                        </div>\n" +
                        "                         </div>" +
                        " <a href='index.php?c=resultado&a=mostrar' class=\"btn btn-primary\">siguiente</a>";

                    $("#preview").append(datos);
                }
                else
                {
                    alert('Invalid Credentials!');
                }
            }
        });
    });
    $('#dbinstall').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'index.php?c=install&a=crear',
            data: $(this).serialize(),
            success: function(response)
            {   console.log(response);
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = 'index.php';
                }
                else
                {
                    console.log(jsonData+"error");
                }
            }
        });
    });
});

