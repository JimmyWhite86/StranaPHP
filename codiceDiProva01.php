<!-- Gallery -->
<div class="row m-3">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="Immagini/ApeGiardino01.JPG"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Boat on Calm Water"
      data-bs-toggle="modal"
      data-bs-target="#carouselModal"
      data-bs-slide-to="0"
    />
    <img
      src="Immagini/Donca_01.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Wintry Mountain Landscape"
      data-bs-toggle="modal"
      data-bs-target="#carouselModal"
      data-bs-slide-to="1"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="Immagini/ConcertoGiardino02.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Mountains in the Clouds"
      data-bs-toggle="modal"
      data-bs-target="#carouselModal"
      data-bs-slide-to="2"
    />
    <img
      src="Immagini/Dibattito01.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Boat on Calm Water"
      data-bs-toggle="modal"
      data-bs-target="#carouselModal"
      data-bs-slide-to="3"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="Immagini/Boiler01.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Waves at Sea"
      data-bs-toggle="modal"
      data-bs-target="#carouselModal"
      data-bs-slide-to="4"
    />
    <img
      src="Immagini/CenaGiardino01.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Yosemite National Park"
      data-bs-toggle="modal"
      data-bs-target="#carouselModal"
      data-bs-slide-to="5"
    />
  </div>
</div>
<!-- Gallery -->

<!-- Modal with Carousel -->
<div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="carouselModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="carouselModalLabel">Galleria Fotografica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Immagini/ApeGiardino01.JPG" class="d-block w-100" alt="Boat on Calm Water">
            </div>
            <div class="carousel-item">
              <img src="Immagini/Donca_01.jpg" class="d-block w-100" alt="Wintry Mountain Landscape">
            </div>
            <div class="carousel-item">
              <img src="Immagini/ConcertoGiardino02.jpg" class="d-block w-100" alt="Mountains in the Clouds">
            </div>
            <div class="carousel-item">
              <img src="Immagini/Dibattito01.jpg" class="d-block w-100" alt="Boat on Calm Water">
            </div>
            <div class="carousel-item">
              <img src="Immagini/Boiler01.jpg" class="d-block w-100" alt="Waves at Sea">
            </div>
            <div class="carousel-item">
              <img src="Immagini/CenaGiardino01.jpg" class="d-block w-100" alt="Yosemite National Park">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
