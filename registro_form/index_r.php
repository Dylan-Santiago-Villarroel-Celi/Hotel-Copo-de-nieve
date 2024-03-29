<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_r.css">
  <!-- Agrega la referencia al archivo flatpickr.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <title>Document</title>
</head>

<body>
  <section class="section">
    <h3>Busca una habitacion a tu gusto </h3>

    <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post"
      action="process_data.php">
      <div class="range range-sm-bottom spacing-20">
        <div class="cell-lg-12 cell-md-4">
          <p class="text-uppercase">Your Name</p>
          <div class="form-wrap">
            <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
            <label class="form-label" for="contact-first-name"></label>
          </div>
        </div>
        <div class="cell-lg-12 cell-md-4 cell-sm-6">
          <p class="text-uppercase">Arrival</p>
          <div class="form-wrap">
            <label class="form-label form-label-icon" for="date-in"><span
                class="icon icon-primary fa-calendar"></span><span></span></label>
            <input class="form-input" id="date-in" data-time-picker="date" type="text" name="date_in"
              data-constraints="@Required">
          </div>
        </div>
        <div class="cell-lg-12 cell-md-4 cell-sm-6">
          <p class="text-uppercase">Departure</p>
          <div class="form-wrap">
            <label class="form-label form-label-icon" for="date-out"><span
                class="icon icon-primary fa-calendar"></span><span></span></label>
            <input class="form-input" id="date-out" data-time-picker="date" type="text" name="date_out"
              data-constraints="@Required">
          </div>
        </div>
        <div class="cell-lg-6 cell-md-4 cell-xs-6">
          <p class="text-uppercase">Adults</p>
          <div class="form-wrap form-wrap-validation">
            <!--Select 2-->
            <select class="form-input select-filter" data-minimum-results-search="-1" data-placeholder="1"
              data-constraints="@Required" name="adults">
              <option>&nbsp;</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>
        <div class="cell-lg-6 cell-md-4 cell-xs-6">
          <p class="text-uppercase">Children</p>
          <div class="form-wrap form-wrap-validation">
            <!--Select 2-->
            <select class="form-input select-filter" data-minimum-results-search="-1" data-placeholder="0"
              data-constraints="@Required" name="children">
              <option>&nbsp;</option>
              <option value="1">0</option>
              <option value="2">1</option>
              <option value="3">2</option>
              <option value="4">3</option>
              <option value="5">4</option>
            </select>
          </div>
        </div>
        <div class="cell-lg-12 cell-md-4">
          <button class="button button-primary button-square button-block button-effect-ujarak" type="submit"><span>check
              availability</span></button>
        </div>
      </div>
    </form>
  </section>
  

  <!-- Agrega la referencia al archivo flatpickr.js -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Configura flatpickr para los campos de fecha
      var dateIn = flatpickr("#date-in", {
        enableTime: false,
        dateFormat: "Y-m-d",
        minDate: "today",
        onChange: function (selectedDates, dateStr, instance) {
          // Actualiza la fecha mínima para el campo de check-out
          dateOut.set("minDate", dateStr);
        }
      });

      var dateOut = flatpickr("#date-out", {
        enableTime: false,
        dateFormat: "Y-m-d",
        minDate: "today"
      });
    });
  </script>
   <?php
    include("process_data.php");
    ?>
</body>

</html>
