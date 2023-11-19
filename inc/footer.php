<footer class="container footer">
    <p>Faqja e punuar nga studentet e shkolles <strong> Probit Academy </strong></p>.
</footer>
</body>
<script src="jquery-3.6.0.js"></script>
<script src="slick.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script>
    $().ready(function() {
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                fjalekalimi: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: {
                    required: "Please provide an email",
                    email: "Please enter a valid email address"
                }
            }

        });
        $("#anetari").validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                mbiemri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                telefoni: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                mbiemri: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
                telefoni: {
                    required: "Ju lutem shenoni telefonin"
                },
                email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni emaili adres valide"
                },
                fjalekalimi: {
                    required: "Ju lutem shenoni fjalekalimin",
                    minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                }

            },
        });
        $("#regjistrohu").validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                mbiemri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                datalindjes: {
                    required: true,
                },
                numripersonal: {
                    required: true,
                    number: true,
                },
                telefoni: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                mbiemri: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
                datalindjes: {
                    required: "Ju lutem shenoni Daten e lindjes"
                },
                numripersonal: {
                    required: "Ju lutem shenoni numri personal",
                    number: "Ju lutem shenoni numra"
                },
                telefoni: {
                    required: "Ju lutem shenoni telefonin"
                },
                email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni emaili adres valide"
                },
                fjalekalimi: {
                    required: "Ju lutem shenoni fjalekalimin",
                    minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                }

            },
        });
        $('#projektet').validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 2,
                },
                pershkrimi: {
                    required: true,
                    minlength: 5,
                },
                datafillimit: {
                    required: true,
                },
                datambarimit: {
                    required: true,
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin e projektit",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                },
                pershkrimi: {
                    required: "Ju lutem mbushni pershkrimin",
                    minlength: "Pershkrimi nuk duhet te jete me pak se 5 karaktere",
                },
                datafillimit: {
                    required: "Ju lutem mbushni daten e fillimit"
                },
                datambarimit: {
                    required: "Ju lutem mbushni daten e mbarimit",

                }

            }
        });
        $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Value must not equal arg.");
        $('#puna').validate({
            rules: {
                projektiid: { 
                valueNotEquals: "0",
                },
                datapune: {
                    required: true,
                },
                pershkrimi: {
                    required: true,
                }
            },
            messages: {
                projektiid: {
                    valueNotEquals: "Ju lutem zgjedhni nje projekt",
                },
                datapune: {
                    required: "Ju lutem mbushni daten e punes",
                },
                pershkrimi: {
                    required: "Ju lutem mbushni pershkrimin e punes"
                },
              
        }});
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) ||  /^[a-z]+$/i.test(value)
        }, "Letters only please");
    });
    $('.slider').slick({
        dots: true,
        // infinite: false,
        //  speed: 300,
        nextArrow: false,
        prevArrow: false,
        slidesToShow: 3,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('#dalja').click(function(){
        $.ajax({
            url: './inc/functions.php?argument=dalja',
            success: function(data) {
                window.location.href = data;
            }
        });
    });
    $('#mesazhi').fadeOut(8000,function(){
        $.ajax({
            url: './inc/functions.php?argument=mesazhi'
        });
    });
</script>

</html>