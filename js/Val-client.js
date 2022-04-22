
  
  $(document).on("click", "#ajout", function (e) {
    e.preventDefault();
    let regexListe = {
      nom: /^[\p{L}\s]{2,}$/u,
      prenom: /^[\p{L}\s]{2,}$/u,
      tel: /^[\d]{10,}$/,
      adresse: /^[\w\-\s]{5,}$/,
      pass: /^[\p{L}\s]{0,}$/u,   // ici c'est pour tester mon formu
      // pass: /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/,   ici c'est le bon 
      ville: /^[\p{L}\s]{2,}$/u,
      cod_post: /^\d{5}$/,
      mail: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
    };

    $("small").text("");
    erreur = false;

    let formElements = $("form")[0]; // recupérer tous les elements du form dans un tab

    // formElements.length - 2   : pour ne pas prendre les boutons submit et reset //  il ne faut pas METTRE le bouton reset dans le form
    for (let i = 0; i < formElements.length - 2; i++) {
      // trt du password
      if ($(formElements[i]).attr("type") === "password") {
        $("#pass").removeClass("erreurInput");
        $("#pass2").removeClass("erreurInput");

        const pattern = regexListe.pass;

        if (pattern.test(formElements[i].value) === false) {
          erreur = true;
          $("#pass").addClass("erreurInput");
          $("#pass2").addClass("erreurInput");
          $("#" + $(formElements[i]).attr("aria-describedby")).html(
            `<p class="erreurMessage text-danger">${$(formElements[i]).attr(
              "data-message"
            )}</p>`
          );
        }
        if ($("#pass").val() !== $("#pass2").val()) {
          erreur = true;
          $("#pass").addClass("erreurInput");
          $("#pass2").addClass("erreurInput");
          $("#" + $(formElements[i]).attr("aria-describedby")).html(
            `<p class="erreurMessage text-danger">Les deux mot de passes doivent etre identiques et au bon format</p>`
          );
        }
      }

      // trt du reste des input
      else {
        $(formElements[i]).removeClass("erreurInput");
        //	$(formElements[i]).next().html("");

        const type = $(formElements[i]).attr("data-type");
        const pattern = regexListe[type];

        if (pattern.test(formElements[i].value) === false) {
          erreur = true;
          $(formElements[i]).addClass("erreurInput");
          $("#" + $(formElements[i]).attr("aria-describedby")).html(
            `<p class="erreurMessage text-danger">${$(formElements[i]).attr(
              "data-message"
            )}</p>`
          );
        }
      }
    }
    if (!erreur) {
      $("form").submit();
    }
  });

