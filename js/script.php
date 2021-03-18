<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f9362d6e2a.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
    function openNavMenu() {
        document.getElementById("sideNavigation").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNavMenu() {
        document.getElementById("sideNavigation").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

    function openNavProfil() {
        document.getElementById("sideNavigation2").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
    }

    function closeNavProfil() {
        document.getElementById("sideNavigation2").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }

    jQuery.fn.filterByText = function(textbox) {
        return this.each(function() {
            var select = this;
            var options = [];
            $(select).find('option').each(function() {
                options.push({
                    value: $(this).val(),
                    text: $(this).text()
                });
            });
            $(select).data('options', options);

            $(textbox).bind('change keyup', function() {
                var options = $(select).empty().data('options');
                var search = $.trim($(this).val());
                var regex = new RegExp(search, "gi");

                $.each(options, function(i) {
                    var option = options[i];
                    if (option.text.match(regex) !== null) {
                        $(select).append(
                            $('<option>').text(option.text).val(option.value)
                        );
                    }
                });
            });
        });
    };

    // You could use it like this:

    $(function() {
        $('select').filterByText($('input'));
    });

    var depart, pos, W, chrono = null,
        elmtScroll = null,
        over = false,
        pas = 2;
    var tpsPause = 1000; /*en ms */
    var tps = 50; /*en ms */
    function pause() /*Pause avant un nouveau depart*/ {
        pos = depart;
        chrono = setInterval("scrollTxt()", tps);
    }

    function scrollTxt() /*Defilement */ {
        pos = pos + pas;
        elmtScroll.scrollLeft = pos;
        if (pos >= W) /*stop défilement et pause avant nouveau depart*/ {
            clearInterval(chrono);
            chrono = setTimeout("pause()", tpsPause);
        }
    }

    function MouseOver(obj) /*demarrage du defilement*/ {
        if (!over) /*1 evenement over a la fois*/ {
            elmtScroll = obj;
            depart = elmtScroll.scrollLeft;
            pos = depart;
            W = parseInt(elmtScroll.scrollWidth + 5 - elmtScroll.clientWidth);

            chrono = setInterval("scrollTxt()", tps);
            over = true;
        }
    }

    function MouseOut(obj) /*mouseout, on autorise un nouveau mouseover*/ {
        over = false;
        clearInterval(chrono); /*stop defilement*/
        chrono = null;
        elmtScroll.scrollLeft = depart; /*position de depart du texte*/
    }
</script>