
    <main>
                <script>    
                        fetch('https://rickandmortyapi.com/api/character/<?=$clave?>'  , {
                            method: 'GET'
                        })
                        .then(response => response.json())

                        .then(function(json){        
                            console.log(json);
                            
                                var informacion = document.querySelector('.mb-3-i');
                                var titu = document.querySelector('.titu');
                               console.log(json);
                                // console.log(json);
                                var name =  json.name;
                                titu.innerHTML+=`
                                <h1 class="titu"> `+json.name +`</h1>`;   
                                var img = document.querySelector('.glide__slidess');
                                img.innerHTML+=`
                                <img  alt="detail"  src="`+ json.image+`"
                                class="img_1 responsive border-0 border-radius img-fluid mb-12" />`; 
                                informacion.innerHTML+=`
                                <p class="mb-3-i">
                                    <strong> estado: </strong>.
                                    `+json.status+`
                                    <br>
                                    <strong> especie: </strong>.
                                    `+json.species+`
                                    <br>
                                    <strong> tipo: </strong>.
                                    `+json.type+`
                                    </p>  
                                `;    
                                var like = document.querySelector('.like');
                                var dislike = document.querySelector('.dislike');
                                like.innerHTML+=`
                                <a class="likes" onclick="like('`+json.id+`','`+name+`')">
                                <i class="simple-icon-heart mr-1"></i></a> 
                                <span name="likes`+json.id+`" id="likes`+json.id+`"><?= $like?>
                                 Likes</span>
                                `;
                                dislike.innerHTML+=`
                                <a class="dislike"   onclick="dislike('`+json.id+`','`+name+`')">
                                <i class="fas fa-heart-broken"></i></a> 
                                <span name="dislikes`+json.id+`" id="dislikes`+json.id+`"> <?= $dislike?>
                                Dislikes</span>
                                `;
                                
                        })
                </script>
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1 class="titu">Detalle de personaje </h1>
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="https://enlacecanaco.org/app/morty/infogeneral">Persoanje</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Detalle</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xl-8 col-left">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="glide details">
                                <div class="glide__track" data-glide-el="track">
                                    <ul class="glide__slidess">
                                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xl-4 col-right">
                    <div class="card mb-4">
                        <div class="position-absolute card-top-buttons">
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                            <div class="like post-icon mr-3 d-inline-block">
                             
                            </div>
                            <div class="dislike post-icon mr-3 d-inline-block"  >
                                
                            </div>
                            </div>
                            <p class="mb-3-i">
                            </p>      
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xl-4 col-right">
                    <div class="card mb-4">
                        <div class="position-absolute card-top-buttons">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
