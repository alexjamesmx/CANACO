jQuery(document).ready(($) => {
  let baseFormAction = $("#form_registro_tractora_afiliador").attr("action");
  //  alert('prueba');
  //   $('.numero_compras').mask('(000) 000-0000');

  $("#form-edit-myaccount").validate({
    submitHandler: (form) => {
      let jQform = $(form);
      let btnSbmt = $("#btn-sbmt-update-account");

      let txtBtn = $.trim(btnSbmt.html());

      let telefonoAuth = $.trim($("#telefono_auth").val());
      let telefonoAuthC = $.trim($("#telefono_auth_c").val());

      let emailAuth = $.trim($("#email_auth").val());
      let emailAuthC = $.trim($("#email_auth_c").val());

      let goToValidation = true;

      if (telefonoAuth != telefonoAuthC) {
        toastr["warning"]("Los teléfonos no coinciden");
        $("#telefono_auth").focus();
        goToValidation = false;
      }

      if (emailAuth != emailAuthC) {
        toastr["warning"]("Los e-mail no coinciden");
        $("#email_auth").focus();
        goToValidation = false;
      }

      if (goToValidation) {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        );
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr("disabled", "disabled");

        jQform.children("input").attr("disabled", "disabled");
        jQform.children("input").attr("disabled", "disabled");

        $.ajax({
          url: jQform.attr("action"),
          type: jQform.attr("method"),
          dataType: jQform.attr("data-type"),
          data: jQform.serialize(),
          success: (response) => {
            toastr[response.response_type](response.message);
          },
          error: (a, b, c) => {
            toastr["error"]("Ocurrió un error, por favor vuelva a intentarlo");
          },
          complete: function () {
            btnSbmt.html(txtBtn);
            btnSbmt.removeAttr("disabled");
          },
        });
      }
    },
  });
  $("#form-update-comercio").validate({
    submitHandler: (form) => {
      let jQform = $(form);
      let btnSbmt = $("#btn-sbmt-create-comercio");
      // let btnCancel = $("#btn-cancel-update-account");
      let txtBtn = $.trim(btnSbmt.html());
      let RFC = $.trim($("#RFC").val());
      let CRFC = $.trim($("#CRFC").val());

      let goToValidation = true;

      if (RFC != CRFC) {
        toastr["warning"]("RFC no coinciden");
        $("#telefono_auth").focus();
        goToValidation = false;
      }

      if (goToValidation) {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        );
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr("disabled", "disabled");
        //   btnCancel.attr('disabled', 'disabled');
        jQform.children("input").attr("disabled", "disabled");
        jQform.children("input").attr("disabled", "disabled");

        $.ajax({
          url: jQform.attr("action"),
          type: jQform.attr("method"),
          dataType: jQform.attr("data-type"),
          data: jQform.serialize(),
          success: (response) => {
            toastr[response.response_type](response.message);
          },
          error: (a, b, c) => {
            toastr["error"]("Ocurrió un error, por favor vuelva a intentarlo");
          },
          complete: function () {
            btnSbmt.html(txtBtn);
            btnSbmt.removeAttr("disabled");
            //   btnCancel.removeAttr('disabled');
          },
        });
      }
    },
  });

  $("#form_registro_tractora_afiliador").validate({
    submitHandler: (form) => {
      let jQform = $(form);
      let btnSbmt = $("#btn_registar");
      // let btnCancel = $("#btn-cancel-update-account");
      let txtBtn = $.trim(btnSbmt.html());
      let goToValidation = true;
      var email = document.getElementById("email").value;
      var nombre = document.getElementById("user").value;

      if (goToValidation) {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        );
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr("disabled", "disabled");
        //   btnCancel.attr('disabled', 'disabled');
        jQform.children("input").attr("disabled", "disabled");
        jQform.children("input").attr("disabled", "disabled");
        $.ajax({
          url: jQform.attr("action"),
          type: jQform.attr("method"),
          dataType: jQform.attr("data-type"),
          data: jQform.serialize(),
          success: (response) => {
            toastr[response.response_type](response.message);
            let repuesta = new String(response.response_type);

            if (repuesta.toString() === "warning") {
            } else if (repuesta.toString() === "error") {
            } else {
              form_registro_tractora_afiliador.style.display = "none";
              accordion.style.display = "block";

              $("#nombre").val(String(nombre));
              $("#email_auth").val(String(email));
              $("#email_auth_c").val(String(email));
            }
          },
          error: (a, b, c) => {
            toastr["error"]("Ocurrió un error, por favor vuelva a intentarlo");
          },
          complete: function () {
            btnSbmt.html(txtBtn);
            btnSbmt.removeAttr("disabled");
            //   btnCancel.removeAttr('disabled');
          },
        });
      }
    },
  });
});
