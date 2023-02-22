@extends('master')
@section('title', 'Coordonnées')
@section('content')
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Coordonnées</h2>
        </div>
        Test
        

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Bureau:</h4>
                <p>4722 Ontario Est, Montréal, Canada</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Courriel:</h4>
                <p>julie.deschenes-renaud@hec.ca</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Téléphone:</h4>
                <p>+1 514-216-7000</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

          <!-- enlever action="forms/contact.php" role="form" class="php-email-form"-->
            <form method="post" class="php-email-form1">
            @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" value = "{{ $data->name  ?? ''}}" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Courriel" value = "{{ $data->email  ?? ''}}" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Le Sujet" value = "{{ $data->subject  ?? ''}}" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Votre Message" required>{{ $data->message  ?? ''}}</textarea>
              </div>
              <div class="my-3">
                <div class="loading">Chargement</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a bien été envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
@endsection