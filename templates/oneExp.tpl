{include file="header.tpl"}

<h1 class="mt-3"> This is your Experience !! <br></h1>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{$place}</h5>
    <h6 class="card-subtitle mb-2 text-muted">$ {$price}</h6>
    <p class="card-text"><br> Enjoy and adventure of {$days} incredible days!! <br> <br>{$description}</p>
    <p class="card-text"><br> This trip is onboard <b>{$name}</b> with a capacity of <b>{$capacity} pax</b>. <br> <br></p>
    <p class="card-text"> {$name} is a {$model}.</p>

    {* <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>  podria poner algunas fotos....*}
  </div>
</div>


{include file="footer.tpl"}
